<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatus;
use App\Enums\Gender;
use App\Enums\Religion;
use App\Enums\StudentStatus;
use App\Http\Controllers\Controller;
use App\Models\Admin\Settings\Bank;
use App\Models\Admin\Settings\Batch;
use App\Models\Admin\Settings\Department;
use App\Models\Admin\Settings\Disability;
use App\Models\Admin\Settings\District;
use App\Models\Admin\Settings\Institute;
use App\Models\Admin\Settings\Zone;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StudentsController extends Controller
{
    public function index(): Renderable
    {
        $attributes = \request()->validate([
            'items' => ['nullable', 'in:10,50,100'],
            'search' => ['nullable', 'string'],
            'gender' => ['nullable', new Enum(Gender::class)],
            'religion' => ['nullable', new Enum(Religion::class)],
            'status' => ['nullable', new Enum(StudentStatus::class)],
            'zone_id' => ['nullable', Rule::exists(Zone::class, 'id')],
            'institute_id' => ['nullable', Rule::exists(Institute::class, 'id')],
            'department_id' => ['nullable', Rule::exists(Department::class, 'id')],
            'disability_id' => ['nullable', Rule::exists(Disability::class, 'id')],
            'batch_id' => ['nullable', Rule::exists(Batch::class, 'id')],
            'district_id' => ['nullable', Rule::exists(District::class, 'id')],
            'is_updated' => ['nullable', 'in:0,1,2'],
        ]);

        $isUpdated = $attributes['is_updated'] ?? 0;
        $items = $attributes['items'] ?? 10;
        $search = $attributes['search'] ?? null;
        $status = $attributes['status'] ?? null;
        $gender = $attributes['gender'] ?? null;
        $religion = $attributes['religion'] ?? null;
        $zone_id = $attributes['zone_id'] ?? null;
        $disability_id = $attributes['disability_id'] ?? null;
        $institute_id = $attributes['institute_id'] ?? null;
        $department_id = $attributes['department_id'] ?? null;
        $district_id = $attributes['district_id'] ?? null;
        $batch_id = $attributes['batch_id'] ?? null;

        $students = Student::whereRelation('user', 'status', '=', CommonStatus::Active->name)
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($gender, fn($q) => $q->where('gender', $gender))
            ->when($religion, fn($q) => $q->where('religion', $religion))
            ->when($zone_id, fn($q) => $q->where('zone_id', $zone_id))
            ->when($disability_id, fn($q) => $q->where('recipients_disability_id', $disability_id))
            ->when($institute_id, fn($q) => $q->where('institute_id', $institute_id))
            ->when($department_id, fn($q) => $q->where('department_id', $department_id))
            ->when($district_id, fn($q) => $q->where('district_id', $district_id))
            ->when($batch_id, fn($q) => $q->where('batch_id', $batch_id))
            ->when($isUpdated, fn($q) => $q->where('is_updated', $isUpdated))
            ->when($search, function ($sql) use ($search) {
                $sql->where('gsp_id', 'like', '%' . $search . '%')
                    ->orWhere('app_id', 'like', '%' . $search . '%')
                    ->orWhereRelation('user', 'name', 'like', '%' . $search . '%')
                    ->orWhereRelation('user', 'email', 'like', '%' . $search . '%')
                    ->orWhereRelation('user', 'mobile', 'like', '%' . $search . '%')
                    ->orWhereRelation('user', 'alternate_mobile', 'like', '%' . $search . '%');
            })
            ->orderBy('id')
            ->orderBy('is_updated')
            ->paginate($items)
            ->withQueryString();
        return view('admin.student', compact('students'));
    }

    public function view(Student $student): Renderable
    {
        return view('admin.student-view', compact('student'));
    }

    public function edit(Student $student): Renderable
    {
        return view('admin.student-edit', compact('student'));
    }

    public function password(Student $student)
    {
        $password = generateRandomString();
        $user = $student->user;
        $user->password = $password;
        $user->save();
        return back()->with('status', "Password has been successfully reset for $user->name to " . $password);
    }

    public function verify(Student $student)
    {
        $student->is_verified = !$student->is_verified;
        $student->save();
        return back()->with('status', 'Data has been successfully updated.');
    }

    public function update(Student $student, Request $request)
    {
        $update_rules = [
            //Update
            'update_personal_info' => ['nullable', 'in:on,off'],
            'update_bank_info' => ['nullable', 'in:on,off'],
            'update_files' => ['nullable', 'in:on,off'],
        ];
        $primary_attributes = \request()->validate($update_rules);

        $rules = [];
        if (!empty($primary_attributes['update_personal_info'])) {
            $rules = array_merge($rules, [
                //Personal
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'email', 'max:50'],
                'mobile' => ['required', 'numeric', 'digits:11'],
                'alternate_mobile' => ['required', 'numeric', 'digits:11'],
            ]);
        }
        if (!empty($primary_attributes['update_bank_info'])) {
            $rules = array_merge($rules, [
                //Student
                'bank_id' => ['required', Rule::exists(Bank::class, 'id')],
                'bank_branch' => ['required', 'min:5', 'max:30'],
                'bank_account_title' => ['required', 'min:5', 'max:30'],
                'bank_account_number' => ['required', 'numeric', 'digits_between:13,17'],
                'remarks' => ['nullable', 'max:999'],
                'studentship_certificate' => ['nullable', 'file', 'mimes:pdf', 'max:300'],
                'bank_statement' => ['nullable', 'file', 'mimes:pdf', 'max:300'],
                'award_letter' => ['nullable', 'file', 'mimes:png,jpg,pdf', 'max:300'],
            ]);
        }
        if (!empty($primary_attributes['update_files'])) {
            $rules = array_merge($rules, [
                //Delete
                'delete_bank_statement' => ['nullable', 'in:on,off'],
                'delete_studentship_certificate' => ['nullable', 'in:on,off'],
                'delete_award_letter' => ['nullable', 'in:on,off'],
                //new
                'studentship_certificate' => ['nullable', 'file', 'mimes:pdf', 'max:300'],
                'bank_statement' => ['nullable', 'file', 'mimes:pdf', 'max:300'],
                'award_letter' => ['nullable', 'file', 'mimes:png,jpg,pdf', 'max:300'],

            ]);
        }
        $rules = array_merge($rules, $update_rules);

        $attributes = \request()->validate($rules);
        $message = 'No change happened.';
        //Personal
        if (!empty($attributes['update_personal_info'])) {
            $user = User::findOrFail($student->user->id);
            $user->name = $attributes['name'];
            $user->email = $attributes['email'];
            $user->mobile = $attributes['mobile'];
            $user->alternate_mobile = $attributes['alternate_mobile'];
            $user->save();
            $message = 'Data has been successfully updated.';
        }
        //Bank && Files
        if (!empty($attributes['update_bank_info']) || !empty($attributes['update_files'])) {
            //Bank
            if (!empty($attributes['update_bank_info'])) {
                $student->bank_id = $attributes['bank_id'];
                $student->bank_branch = $attributes['bank_branch'];
                $student->bank_account_title = $attributes['bank_account_title'];
                $student->bank_account_number = $attributes['bank_account_number'];
                $student->remarks = $attributes['remarks'];
            }
            //Files
            if (!empty($attributes['update_files'])) {
                if (!empty($attributes['delete_bank_statement'])) {
                    $file = "$student->app_id/$student->bank_statement";
                    if (deleteFiles($file)) {
                        $student->bank_statement = null;
                    };
                }
                if (!empty($attributes['delete_studentship_certificate'])) {
                    $file = "$student->app_id/$student->studentship_certificate";
                    if (deleteFiles($file)) {
                        $student->studentship_certificate = null;
                    };
                }
                if (!empty($attributes['delete_award_letter'])) {
                    $file = "$student->app_id/$student->award_letter";
                    if (deleteFiles($file)) {
                        $student->award_letter = null;
                    };
                }
                if (!empty($attributes['studentship_certificate']) && is_file($attributes['studentship_certificate'])) {
                    $file = $attributes['studentship_certificate'];
                    $fileName = 'studentship_certificate__' . rand(1, 99) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs($student->app_id, $fileName, 'public');
                    $student->studentship_certificate = $fileName;
                }
                if (!empty($attributes['bank_statement']) && is_file($attributes['bank_statement'])) {
                    $file = $attributes['bank_statement'];
                    $fileName = 'bank_statement__' . rand(1, 99) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs($student->app_id, $fileName, 'public');
                    $student->bank_statement = $fileName;
                }
                if (!empty($attributes['award_letter']) && is_file($attributes['award_letter'])) {
                    $file = $attributes['award_letter'];
                    $fileName = 'award_letter__' . rand(1, 99) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs($student->app_id, $fileName, 'public');
                    $student->award_letter = $fileName;
                }
            }
            $student->admin_updated_at = now();
            $student->updated_at = now();
            $student->save();
            $message = 'Data has been successfully updated.';
        }
        return back()->with('status', $message);
    }
}
