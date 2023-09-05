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
            $table->string('app_id')->index()->unique();
            $table->string('gsp_id')->index()->unique();
            $table->string('zone')->index();
            $table->string('university')->nullable();
            $table->string('department')->nullable();
            $table->foreignIdFor(Bank::class)->index()->nullable()->constrained();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_title')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('studentship_certificate')->nullable();
            $table->string('bank_statement')->nullable();
            $table->string('award_letter')->nullable();
            $table->tinyInteger('is_updated')->default(0);
            $table->tinyInteger('is_verified')->default(0);
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
