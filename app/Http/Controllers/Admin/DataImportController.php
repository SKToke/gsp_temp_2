<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Enums\StudentStatus;
use App\Http\Controllers\Controller;
use App\Imports\DataImport;
use App\Models\Admin\Settings\AcademicSession;
use App\Models\Admin\Settings\Bank;
use App\Models\Admin\Settings\Batch;
use App\Models\Admin\Settings\Department;
use App\Models\Admin\Settings\Disability;
use App\Models\Admin\Settings\District;
use App\Models\Admin\Settings\Institute;
use App\Models\Admin\Settings\Occupation;
use App\Models\Admin\Settings\Sponsor;
use App\Models\Admin\Settings\Upazila;
use App\Models\Admin\Settings\Zone;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;

class DataImportController extends Controller
{

    public function index(): Renderable
    {
        return view('admin.exim');
    }

    public function import()
    {
        $attribute = request()->validate([
            'file' => ['required', 'mimes:csv,xls,xlsx']
        ]);
        $collection = (new DataImport())->toCollection($attribute['file']);
        //rules
        $rules = [
//            'gsp_id' => ['required', 'string'],
//            'status' => ['required', new Enum(StudentStatus::class)],
//            'zone' => ['required', 'string'],
//            'scholarship_year' => ['required', 'string'],
//            'batch' => ['required', 'string'],
//            'university' => ['required', 'string'],
//            'academic_discipline' => ['required', 'string'],
//            'academic_session' => ['required', 'string'],
            'recipient_name' => ['required', 'string'],
            'primary_mobile' => ['required',],
            'secondary_mobile' => ['nullable',],
//            'gender' => ['nullable', new Enum(Gender::class)],
//            'religion' => ['nullable', new Enum(Religion::class)],
//            'recipients_disability' => ['nullable'],
//            'date_of_birth' => ['nullable'],
//            'blood_group' => ['nullable', new Enum(BloodGroup::class)],
//            'email' => ['nullable'],
//            'nid_number' => ['nullable'],
//            'permanent_address' => ['nullable'],
//            'thana' => ['nullable'],
//            'district' => ['nullable'],
//            'hsc_year' => ['nullable'],
//            'hs_result' => ['nullable'],
//            'ss_result' => ['nullable'],
//            'father_name' => ['nullable'],
//            'father_living_status' => ['nullable', new Enum(LivingStatus::class)],
//            'father_occupation' => ['nullable', 'string'],
//            'father_dob' => ['nullable', 'string'],
//            'father_disability' => ['nullable', 'string'],
//            'father_mobile' => ['nullable', 'string'],
//            'mother_name' => ['nullable', 'string'],
//            'mother_living_status' => ['nullable', new Enum(LivingStatus::class)],
//            'mother_occupation' => ['nullable', 'string'],
//            'mother_dob' => ['nullable', 'string'],
//            'mother_disability' => ['nullable', 'string'],
//            'mother_mobile' => ['nullable', 'string'],
//            'guardian_mobile' => ['nullable', 'string'],
//            'number_of_family_member' => ['nullable', 'string'],
//            'bank_name' => ['nullable', 'string'],
//            'bank_account_title' => ['nullable', 'string'],
//            'bank_account_number' => ['nullable', 'string'],
//            'bank_branch' => ['nullable', 'string'],
//            'sponsor_name' => ['nullable', 'string'],
//            'stipend_starting_from' => ['nullable', 'string'],
//            'stipend_ended' => ['nullable', 'string'],
//            'total_stipend_receive' => ['nullable', 'string'],
//            'monthly_stipend_amount' => ['nullable', 'string'],
//            'primary_marks' => ['nullable', 'string'],
//            'viva_marks' => ['nullable', 'string'],
//            'remarks' => ['nullable', 'string'],
        ];
        //validation
        foreach ($collection[0] as $row) {
            Validator::make($row->toArray(), $rules)->validate();
        }
        set_time_limit(10 * 60);
        //import
        list($totalFound, $totalNew) = \DB::transaction(function () use ($collection) {
            $totalFound = $totalNew = 0;
            foreach ($collection[0] as $row) {
                $user = User::where('email', $row['email'])->orWhere('mobile', $row['primary_mobile'])->first();

                if ($user) {
                    ++$totalFound;
//                    continue;
                };
                ++$totalNew;

                $user = User::create([
                    'name' => $row['recipient_name'],
                    'email' => $row['email'] ?? null,
                    'mobile' => $row['primary_mobile'] ?? null,
                    'password' => User::DEFAULT_PASSWORD,
                    'role' => User::STUDENT,
                    'status' => CommonStatus::Active
                ]);
//                $this->byRaw($user, $row);
                $this->byRef($user, $row);
            }
            return [$totalFound, $totalNew];
        });
        $totalCount = isset($collection[0]) ? count($collection[0]) : 0;
        return back()->with(['status' => "Total $totalCount family has been successfully imported. Found->$totalFound, New->$totalNew"]);
    }

    private function byRaw($user, $row)
    {
        $zone = Zone::where('name', 'like', '%' . $row['zone'] . '%')->first();
        $batch = Batch::where('name', 'like', '%' . $row['batch'] . '%')->first();
        $institute = Institute::where('name', 'like', '%' . $row['university'] . '%')->first();
        $department = Department::where('name', 'like', '%' . $row['academic_discipline'] . '%')->first();
        $academicSession = AcademicSession::where('name', 'like', '%' . $row['academic_session'] . '%')->first();
        $recipientsDisability = Disability::where('name', 'like', '%' . $row['recipients_disability'] . '%')->first();
        $upazila = Upazila::where('name', 'like', '%' . $row['thana'] . '%')->first();
        $district = District::where('name', 'like', '%' . $row['district'] . '%')->first();
        $fatherOccupation = Occupation::where('name', 'like', '%' . $row['father_occupation'] . '%')->first();
        $fatherDisability = Disability::where('name', 'like', '%' . $row['father_disability'] . '%')->first();
        $motherOccupation = Occupation::where('name', 'like', '%' . $row['mother_occupation'] . '%')->first();
        $motherDisability = Disability::where('name', 'like', '%' . $row['mother_disability'] . '%')->first();
        $bank = Bank::where('name', 'like', '%' . $row['bank_name'] . '%')->first();
        $sponsor = Sponsor::where('name', 'like', '%' . $row['sponsor_name'] . '%')->first();
        $birthDate = $row['dob'] ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob']))->format('Y-m-d') : null;
        Student::create([
            'user_id' => $user->id,
            'gsp_id' => $row['gsp_id'],
            'recipient_name' => $row['recipient_name'],
            'primary_mobile' => $row['primary_mobile'],
            'status' => $row['status'] ?? null,
            'zone_id' => $zone?->id,
            'scholarship_year' => $row['scholarship_year'] ?? null,
            'batch_id' => $batch?->id,
            'institute_id' => $institute?->id,
            'department_id' => $department?->id,
            'academic_session_id' => $academicSession?->id,
            'secondary_mobile' => $row['secondary_mobile'] ?? null,
            'gender' => $row['gender'] ?? null,
            'religion' => $row['religion'] ?? null,
            'recipients_disability_id' => $recipientsDisability?->id,
            'dob' => $birthDate,
            'blood_group' => $row['blood_group'] ?? null,
            'nid_number' => $row['nid_number'] ?? null,
            'permanent_address' => $row['permanent_address'] ?? null,
            'upazila_id' => $upazila?->id,
            'district_id' => $district?->id,
            'hsc_result' => $row['hsc_result'] ?? null,
            'ssc_result' => $row['ssc_result'] ?? null,
            'hsc_year' => $row['hsc_year'] ?? null,
            'father_name' => $row['father_name'] ?? null,
            'father_dob' => $row['father_dob'] ?? null,
            'father_living_status' => $row['father_living_status'] ?? null,
            'father_occupation_id' => $fatherOccupation?->id,
            'father_disability_id' => $fatherDisability?->id,
            'father_mobile' => $row['father_mobile'] ?? null,
            'mother_name' => $row['mother_name'] ?? null,
            'mother_dob' => $row['mother_dob'] ?? null,
            'mother_living_status' => $row['mother_living_status'] ?? null,
            'mother_occupation_id' => $motherOccupation?->id,
            'mother_disability_id' => $motherDisability?->id,
            'mother_mobile' => $row['father_mobile'] ?? null,
            'other_guardian_mobile' => $row['other_guardian_mobile'] ?? null,
            'number_of_family_member' => $row['number_of_family_member'] ?? null,
            'bank_account_title' => $row['bank_account_title'] ?? null,
            'bank_account_number' => $row['bank_account_number'] ?? null,
            'bank_id' => $bank?->id,
            'bank_branch' => $row['bank_branch'] ?? null,
            'sponsor_id' => $sponsor?->id,
            'stipend_starting_from' => $row['stipend_starting_from'] ?? null,
            'stipend_ended' => $row['stipend_ended'] ?? null,
            'monthly_stipend_amount' => $row['monthly_stipend_amount'] ?? null,
            'total_stipend_receive' => $row['total_stipend_receive'] ?? null,
            'primary_marks' => $row['primary_marks'] ?? null,
            'viva_marks' => $row['viva_marks'] ?? null,
            'remarks' => $row['remarks'] ?? null,
        ]);
    }

    private function byRef($user, $row)
    {
        $birthDate = $row['dob'] ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob']))->format('Y-m-d') : null;
        Student::create([
            'user_id' => $user->id,
            'gsp_id' => $row['gsp_id'],
            'recipient_name' => $row['recipient_name'],
            'primary_mobile' => $row['primary_mobile'],
            'status' => $row['status'] ?? null,
            'zone_id' => $row['zone'] ?? null,
            'scholarship_year' => $row['scholarship_year'] ?? null,
            'batch_id' => $row['batch'] ?? null,
            'institute_id' => $row['university'] ?? null,
            'department_id' => $row['academic_discipline'] ?? null,
            'academic_session_id' => $row['academic_session'] ?? null,
            'secondary_mobile' => $row['secondary_mobile'] ?? null,
            'gender' => $row['gender'] ?? null,
            'religion' => $row['religion'] ?? null,
            'recipients_disability_id' => $row['recipients_disability'] ?? null,
            'dob' => $birthDate,
            'blood_group' => $row['blood_group'] ?? null,
            'nid_number' => $row['nid_number'] ?? null,
            'permanent_address' => $row['permanent_address'] ?? null,
            'union_id' => $row['union_id'] ?? null,
//            'upazila_id' => $row['thana'] ?? null,
            'district_id' => $row['district'] ?? null,
            'hsc_result' => $row['hsc_result'] ?? null,
            'ssc_result' => $row['ssc_result'] ?? null,
            'hsc_year' => $row['hsc_year'] ?? null,
            'father_name' => $row['father_name'] ?? null,
            'father_dob' => $row['father_dob'] ?? null,
            'father_living_status' => $row['father_living_status'] ?? null,
            'father_occupation_id' => $row['father_occupation'] ?? null,
            'father_disability_id' => $row['father_disability'] ?? null,
            'father_mobile' => $row['father_mobile'] ?? null,
            'mother_name' => $row['mother_name'] ?? null,
            'mother_dob' => $row['mother_dob'] ?? null,
            'mother_living_status' => $row['mother_living_status'] ?? null,
            'mother_occupation_id' => $row['mother_occupation'] ?? null,
            'mother_disability_id' => $row['mother_disability'] ?? null,
            'mother_mobile' => $row['father_mobile'] ?? null,
            'other_guardian_mobile' => $row['other_guardian_mobile'] ?? null,
            'number_of_family_member' => $row['number_of_family_member'] ?? null,
            'bank_account_title' => $row['bank_account_title'] ?? null,
            'bank_account_number' => $row['bank_account_number'] ?? null,
            'bank_id' => $row['bank_name'] ?? null,
            'bank_branch' => $row['bank_branch'] ?? null,
            'sponsor_id' => $row['sponsor_name'] ?? null,
            'stipend_starting_from' => $row['stipend_starting_from'] ?? null,
            'stipend_ended' => $row['stipend_ended'] ?? null,
            'monthly_stipend_amount' => $row['monthly_stipend_amount'] ?? null,
            'total_stipend_receive' => $row['total_stipend_receive'] ?? null,
            'primary_marks' => $row['primary_marks'] ?? null,
            'viva_marks' => $row['viva_marks'] ?? null,
            'remarks' => $row['remarks'] ?? null,
        ]);
    }
}
