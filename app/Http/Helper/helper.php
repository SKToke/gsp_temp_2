<?php


use App\Models\File;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

if (!function_exists('updateStudent')) {
    function updateStudent(Student $student, array $attributes, bool $isUpdate = false): void
    {
        $exceptKeys = ['password', 'current_password', 'dob', 'father_age', 'mother_age', 'profile_picture', 'nid_document', 'bank_statement', 'result_document'];
        $finalArr = Arr::except($attributes, $exceptKeys);
        if ($attributes['dob']) {
            $studentBirthDate = $attributes['dob']['day'] . '-' . $attributes['dob']['month'] . '-' . $attributes['dob']['year'];
            $finalArr['dob'] = Carbon::parse($studentBirthDate)->format('Y-m-d');
        }
        if ($attributes['father_age'] && ctype_digit($attributes['father_age'])) {
            $finalArr['father_dob'] = Carbon::now()->copy()->year - $attributes['father_age'] . '-01-01';
        }
        if ($attributes['mother_age'] && ctype_digit($attributes['mother_age'])) {
            $finalArr['mother_dob'] = Carbon::now()->copy()->year - $attributes['mother_age'] . '-01-01';
        }
        if ($isUpdate) {
            $finalArr['is_updated'] = 1;
        }
        $student->fill($finalArr);
        DB::transaction(function () use ($student, $attributes) {
            $user = $student->user()->first();
            if ($attributes['password']) {
                $user->password = $attributes['password'];
            }
            $user->name = $attributes['recipient_name'];
            $user->email = $attributes['email'];
            $user->mobile = $attributes['primary_mobile'];
            $user->save();
            $student->save();
        });
        if (!empty($attributes['profile_picture']) && is_file($attributes['profile_picture'])) {
            $file = $student->pictureResource()->first();
            $file?->resourceDelete();
            $file?->delete();
            $fileName = 'picture_' . File::getUniqueFileName($attributes['profile_picture']);
            $attributes['profile_picture']->storeAs($student->id, $fileName, 'public');
            $student->pictureResource()->create(['path' => $student->id, 'name' => $fileName, 'remarks' => 'picture']);
        }
        if (!empty($attributes['nid_document']) && is_file($attributes['nid_document'])) {
            $file = $student->nidResource()->first();
            $file?->resourceDelete();
            $file?->delete();
            $fileName = 'nid_' . File::getUniqueFileName($attributes['nid_document']);
            $attributes['nid_document']->storeAs($student->id, $fileName, 'public');
            $student->nidResource()->create(['path' => $student->id, 'name' => $fileName, 'remarks' => 'nid']);
        }
        if (!empty($attributes['bank_statement']) && is_file($attributes['bank_statement'])) {
            $file = $student->bankResource()->first();
            $file?->resourceDelete();
            $file?->delete();
            $fileName = 'bank_' . File::getUniqueFileName($attributes['bank_statement']);
            $attributes['bank_statement']->storeAs($student->id, $fileName, 'public');
            $student->nidResource()->create(['path' => $student->id, 'name' => $fileName, 'remarks' => 'bank']);
        }
        if (!empty($attributes['result_document']) && is_file($attributes['result_document'])) {
            $file = $student->resultResource()->first();
            $file?->resourceDelete();
            $file?->delete();
            $fileName = 'result_' . File::getUniqueFileName($attributes['result_document']);
            $attributes['result_document']->storeAs($student->id, $fileName, 'public');
            $student->nidResource()->create(['path' => $student->id, 'name' => $fileName, 'remarks' => 'result']);
        }
    }
}
