<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Exports\StudentsExport;
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
use Maatwebsite\Excel\Facades\Excel;

class DataImportController extends Controller
{
    public function index(): Renderable
    {
        return view('admin.exim');
    }

    public function export()
    {
        $students = Student::orderBy('id')->get();

        $data['students'] = $students;
        $file_name = "Students_" . now()->format('Ymd_Hi') . '.xlsx';
        return Excel::download(new StudentsExport('admin.export-students', $data), $file_name, null, ['file_name' => $file_name]);
    }

    public function import()
    {
        $attribute = request()->validate([
            'file' => ['required', 'mimes:csv,xls,xlsx']
        ]);
        $collection = (new DataImport())->toCollection($attribute['file']);
        //rules
        $rules = [
            'zone' => ['required', 'string'],
            'app_id' => ['required', 'string'],
            'gsp_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'mobile' => ['required'],
            'alternate_mobile' => ['nullable'],
            'university' => ['required', 'string'],
            'department' => ['required', 'string'],
            'password' => ['required', 'numeric']
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
                $user = User::where('mobile', $row['mobile'])->where('email', $row['email'])->first();
                if ($user) {
                    ++$totalFound;
                    continue;
                };
                ++$totalNew;
                $user = User::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'mobile' => $row['mobile'],
                    'alternate_mobile' => $row['alternate_mobile'],
                    'password' => $row['password'],
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

    private function byRef($user, $row)
    {
        Student::create([
            'user_id' => $user->id,
            'app_id' => $row['app_id'],
            'gsp_id' => $row['gsp_id'],
            'zone' => $row['zone'],
            'university' => $row['university'],
            'department' => $row['department'],
            'created_at' => now(),
            'updated_at' => null
        ]);
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
}
