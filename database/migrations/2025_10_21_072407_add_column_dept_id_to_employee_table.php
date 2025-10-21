<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->string('dept_id', 2)->nullable()->after('phone_no');
        
            $table->foreign('dept_id')
                  ->references('department_id')
                  ->on('department')
                  ->onDelete('set null');
                //   ->onDelete('cascade'); // delete the employee if the department is deleted
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->dropForeign(['dept_id']);
            $table->dropColumn('dept_id');
        });
    }
};
