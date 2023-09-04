<?php

namespace App\Models;

use App\Enums\BloodGroup;
use App\Enums\Gender;
use App\Enums\LivingStatus;
use App\Enums\Religion;
use App\Enums\StudentStatus;
use App\Models\Admin\Settings\AcademicSession;
use App\Models\Admin\Settings\District;
use App\Models\Admin\Settings\Upazila;
use App\Models\Admin\Settings\Union;
use App\Models\Admin\Settings\Disability;
use App\Models\Admin\Settings\Bank;
use App\Models\Admin\Settings\Zone;
use App\Models\Admin\Settings\Institute;
use App\Models\Admin\Settings\Department;
use App\Models\Admin\Settings\Occupation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Student extends Model
{
    protected $casts = [
        'is_updated' => 'bool',
        'father_dob' => 'datetime:Y-m-d',
        'mother_dob' => 'datetime:Y-m-d',
        'status' => StudentStatus::class,
        'scholarship_year' => 'int',
        'batch' => 'int',
        'gender' => Gender::class,
        'religion' => Religion::class,
        'blood_group' => BloodGroup::class,
        'father_living_status' => LivingStatus::class,
        'mother_living_status' => LivingStatus::class,
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resource(): MorphOne
    {
        return $this->morphOne(File::class, 'resource');
    }

    public function pictureResource(): MorphOne
    {
        return $this->morphOne(File::class, 'resource')->whereRemarks('picture');
    }

    public function nidResource(): MorphOne
    {
        return $this->morphOne(File::class, 'resource')->whereRemarks('nid');
    }

    public function bankResource(): MorphOne
    {
        return $this->morphOne(File::class, 'resource')->whereRemarks('bank');
    }

    public function resultResource(): MorphOne
    {
        return $this->morphOne(File::class, 'resource')->whereRemarks('result');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class);
    }
    public function union(): BelongsTo
    {
        return $this->belongsTo(Union::class);
    }

     public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

     public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

     public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }

     public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

     public function occupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }
    public function fatherOccupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class,'father_occupation_id','id');
    }
    public function motherOccupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class,'mother_occupation_id','id');
    }
    public function disability(): BelongsTo
    {
        return $this->belongsTo(Disability::class);
    }
    public function studentDisability(): BelongsTo
    {
        return $this->belongsTo(Disability::class,'recipients_disability_id','id');
    }
    public function fatherDisability(): BelongsTo
    {
        return $this->belongsTo(Disability::class,'father_disability_id','id');
    }
    public function motherDisability(): BelongsTo
    {
        return $this->belongsTo(Disability::class,'mother_disability_id','id');
    }
    public function academicSession(): BelongsTo
    {
        return $this->belongsTo(AcademicSession::class,'academic_session_id','id');
    }
}
