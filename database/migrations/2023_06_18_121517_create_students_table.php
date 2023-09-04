<?php

use App\Models\Admin\Settings\AcademicSession;
use App\Models\Admin\Settings\Bank;
use App\Models\Admin\Settings\Batch;
use App\Models\Admin\Settings\Department;
use App\Models\Admin\Settings\District;
use App\Models\Admin\Settings\Institute;
use App\Models\Admin\Settings\Sponsor;
use App\Models\Admin\Settings\Union;
use App\Models\Admin\Settings\Upazila;
use App\Models\Admin\Settings\Zone;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->index()->constrained();
            $table->tinyInteger('is_updated')->default(0);
            $table->string('gsp_id')->unique();
            $table->string('recipient_name');
            $table->string('gender')->nullable();
            $table->string('primary_mobile')->nullable();
            $table->string('secondary_mobile')->nullable()->nullable();
            $table->string('religion')->nullable();
            $table->string('status')->nullable();
            $table->foreignIdFor(Zone::class)->index()->nullable()->constrained();
            $table->string('scholarship_year')->nullable();
            $table->foreignIdFor(Batch::class)->index()->nullable()->constrained();
            $table->foreignIdFor(Institute::class)->index()->nullable()->constrained();
            $table->foreignIdFor(Department::class)->index()->nullable()->constrained();
            $table->foreignIdFor(AcademicSession::class)->index()->nullable()->constrained();
            $table->unsignedBigInteger('recipients_disability_id')->index()->nullable();
            $table->foreign('recipients_disability_id')->references('id')->on('disabilities');
            $table->string('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('email')->nullable();
            $table->string('nid_number')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->foreignIdFor(Union::class)->index()->nullable()->constrained();
            $table->foreignIdFor(Upazila::class)->index()->nullable()->constrained();
            $table->foreignIdFor(District::class)->index()->nullable()->constrained();
            $table->string('hsc_result')->nullable();
            $table->string('ssc_result')->nullable();
            $table->string('hsc_year')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_dob')->nullable();
            $table->string('father_living_status')->nullable();
            $table->unsignedBigInteger('father_occupation_id')->index()->nullable();
            $table->foreign('father_occupation_id')->references('id')->on('occupations');
            $table->unsignedBigInteger('father_disability_id')->index()->nullable();
            $table->foreign('father_disability_id')->references('id')->on('disabilities');
            $table->string('father_mobile')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_dob')->nullable();
            $table->string('mother_living_status')->nullable();
            $table->unsignedBigInteger('mother_occupation_id')->index()->nullable();
            $table->foreign('mother_occupation_id')->references('id')->on('occupations');
            $table->unsignedBigInteger('mother_disability_id')->index()->nullable();
            $table->foreign('mother_disability_id')->references('id')->on('disabilities');
            $table->string('mother_mobile')->nullable();
            $table->string('other_guardian_mobile')->nullable();
            $table->string('number_of_family_member')->nullable();
            $table->string('bank_account_title')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->foreignIdFor(Bank::class)->index()->nullable()->constrained();
            $table->string('bank_branch')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('running_year')->nullable();
            $table->string('result_remarks')->nullable();
            $table->foreignIdFor(Sponsor::class)->index()->nullable()->constrained();
            $table->string('stipend_starting_from')->nullable();
            $table->string('stipend_ended')->nullable();
            $table->string('monthly_stipend_amount')->nullable();
            $table->string('total_stipend_receive')->nullable();
            $table->string('primary_marks')->nullable();
            $table->string('viva_marks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
