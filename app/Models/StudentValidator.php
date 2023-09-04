<?php

namespace App\Models;

use App\Enums\BloodGroup;
use App\Enums\LivingStatus;
use App\Models\Admin\Settings\AcademicSession;
use App\Models\Admin\Settings\Bank;
use App\Models\Admin\Settings\Department;
use App\Models\Admin\Settings\Disability;
use App\Models\Admin\Settings\District;
use App\Models\Admin\Settings\Institute;
use App\Models\Admin\Settings\Occupation;
use App\Models\Admin\Settings\Union;
use App\Models\Admin\Settings\Upazila;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StudentValidator
{
    /**
     * @param Student $model
     * @param array $attributes
     * @param bool $cpr
     * @return array
     */
    public function validate(Student $model, array $attributes, bool $cpr = true): array
    {
        $rules = [
            'is_updated' => ['in:0,1'],
            'institute_id' => [Rule::requiredIf(Gate::check('admin')), Rule::exists(Institute::class, 'id')],
            'recipient_name' => [Rule::requiredIf(Gate::check('admin')), 'string'],
            'department_id' => ['nullable', Rule::exists(Department::class, 'id')],
            'academic_session_id' => ['nullable', Rule::exists(AcademicSession::class, 'id')],
            'recipients_disability_id' => ['nullable', Rule::exists(Disability::class, 'id')],
            'primary_mobile' => ['nullable','digits:11'],
            'secondary_mobile' => ['nullable','digits:11'],
            'dob' => ['required', 'array'],
            'dob.day' => ['required'],
            'dob.month' => ['required'],
            'dob.year' => ['required'],
            'blood_group' => ['nullable', new Enum(BloodGroup::class)],
            'email' => ['nullable', 'email'],
            'nid_number' => ['nullable'],
            'district_id' => ['nullable', Rule::exists(District::class, 'id')],
            'upazila_id' => ['nullable', Rule::exists(Upazila::class, 'id')],
            'union_id' => ['nullable', Rule::exists(Union::class, 'id')],
            'hsc_result' => ['nullable'],
            'hsc_year' => ['nullable'],
            'ssc_result' => ['nullable'],
            'permanent_address' => ['nullable'],
            'father_name' => ['nullable'],
            'father_living_status' => ['nullable', new Enum(LivingStatus::class)],
            'father_age' => ['nullable', 'int'],
            'father_occupation_id' => ['nullable', Rule::exists(Occupation::class, 'id')],
            'father_disability_id' => ['nullable', Rule::exists(Disability::class, 'id')],
            'father_mobile' => ['nullable','digits:11'],
            'mother_name' => ['nullable'],
            'mother_living_status' => ['nullable', new Enum(LivingStatus::class)],
            'mother_age' => ['nullable', 'int'],
            'mother_occupation_id' => ['nullable', Rule::exists(Occupation::class, 'id')],
            'mother_disability_id' => ['nullable', Rule::exists(Disability::class, 'id')],
            'mother_mobile' => ['nullable','digits:11'],
            'other_guardian_mobile' => ['nullable','digits:11'],
            'number_of_family_member' => ['nullable'],
            'bank_id' => ['nullable', Rule::exists(Bank::class, 'id')],
            'bank_account_number' => ['nullable'],
            'bank_account_title' => ['nullable'],
            'bank_branch' => ['nullable'],
            'remarks' => ['nullable'],
            'cgpa' => ['nullable'],
            'running_year' => ['nullable'],
            'password' => ['sometimes', 'confirmed'],
            'current_password' => [Rule::requiredIf($cpr), 'current_password'],
            'profile_picture' => ['nullable', 'file', 'mimes:png,jpg','max:300'],
            'nid_document' => ['nullable', 'file', 'mimes:png,jpg,pdf','max:300'],
            'bank_statement' => ['nullable', 'file', 'mimes:png,jpg,pdf','max:300'],
            'result_document' => [Rule::requiredIf(!Gate::check('admin')), 'file', 'mimes:png,jpg,pdf','max:300'],
            'result_remarks' => ['nullable'],
        ];
        $messages = [
            'dob.day.required' => "The day (date of birth) field is required.",
            'dob.month.required' => "The month (date of birth) field is required.",
            'dob.year.required' => "The year (date of birth) field is required.",
        ];
        $data = validator($attributes, $rules, $messages)->validate();
        return $model->exists ? Arr::except($data, 'created_by') : Arr::except($data, 'updated_by');
    }
}
