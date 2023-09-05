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
    public function validate(Student $model, array $attributes): array
    {
        $rule0 = [];
        if (0==$model->is_updated){
            $rule0 = [
                'bank_id' => ['required', Rule::exists(Bank::class, 'id')],
                'bank_branch' => ['required','min:5','max:30'],
                'bank_account_title' => ['required','min:5','max:30'],
                'bank_account_number' => ['required','numeric','digits_between:13,17'],
                'remarks' => ['nullable','max:999'],
                'studentship_certificate' => ['required', 'file', 'mimes:pdf','max:300'],
                'bank_statement' => ['required', 'file', 'mimes:pdf','max:300'],
                'award_letter' => ['nullable', 'file', 'mimes:pdf','max:300'],
            ];
        }
        $rule1 = [];
        if (1==$model->is_updated){
            $rule1 = [
                'remarks' => ['nullable','max:1000'],
                'award_letter' => ['required', 'file', 'mimes:png,jpg,pdf','max:300'],
            ];
        }
        $rules = array_merge($rule0,$rule1);
        $messages = [];
        $data = validator($attributes, $rules, $messages)->validate();
        return $model->exists ? Arr::except($data, 'created_by') : Arr::except($data, 'updated_by');
    }
}
