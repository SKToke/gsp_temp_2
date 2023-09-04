<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name');
            $table->foreignIdFor(\App\Models\Admin\Settings\Upazila::class)->index();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['name', 'upazila_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unions');
    }
};
