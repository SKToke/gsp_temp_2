<?php


use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getUIAvatarName')) {
    function getUIAvatarName(string $name = null): string
    {
        if ($name) return $name;
        $name = auth()?->user()?->name ?? 'Anonymous User';
        return str_replace(' ', '+', $name);
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString(int $length = 8): string
    {
        $characters = '0123456789';
//        $characters .= 'abcdefghijklmnopqrstuvwxyz';
//        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters .= '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('deleteFiles')) {
    function deleteFiles(string $file): bool
    {
        if (Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
            return true;
        }
        return false;
    }
}
if (!function_exists('updateStudent')) {
    function updateStudent(Student $student, array $attributes): void
    {
        $attributes['is_updated'] = 1;
        $student->fill(Arr::except($attributes, ['studentship_certificate', 'bank_statement', 'award_letter']));
        if (!empty($attributes['studentship_certificate']) && is_file($attributes['studentship_certificate'])) {
            if ($student->studentship_certificate) {
                $file = $student->app_id . "/" . $student->studentship_certificate;
                deleteFiles($file);
            }
            $file = $attributes['studentship_certificate'];
            $fileName = 'studentship_certificate__' . rand(1, 99) . '.' . $file->getClientOriginalExtension();
            $file->storeAs($student->app_id, $fileName, 'public');
            $student->studentship_certificate = $fileName;
        }
        if (!empty($attributes['bank_statement']) && is_file($attributes['bank_statement'])) {
            if ($student->bank_statement) {
                $file = $student->app_id . "/" . $student->bank_statement;
                deleteFiles($file);
            }
            $file = $attributes['bank_statement'];
            $fileName = 'bank_statement__' . rand(1, 99) . '.' . $file->getClientOriginalExtension();
            $file->storeAs($student->app_id, $fileName, 'public');
            $student->bank_statement = $fileName;
        }
        if (!empty($attributes['award_letter']) && is_file($attributes['award_letter'])) {
            if ($student->award_letter) {
                $file = $student->app_id . "/" . $student->award_letter;
                deleteFiles($file);
            }
            $file = $attributes['award_letter'];
            $fileName = 'award_letter__' . rand(1, 99) . '.' . $file->getClientOriginalExtension();
            $file->storeAs($student->app_id, $fileName, 'public');
            $student->award_letter = $fileName;
            $student->is_updated = 2;
        }
        $student->save();
    }
}
