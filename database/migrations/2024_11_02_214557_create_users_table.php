<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_agency')->nullable();
            $table->string('full_name')->nullable();
            $table->string('father_name');
            $table->string('cnic_no')->unique();
            $table->string('applicant_phone');
            $table->string('email_address')->unique();
            $table->string('password');
            $table->foreignId('vswa_hq_id')->constrained('vswa_head_quarters')->onDelete('cascade');
            $table->foreignId('nature_of_authorization_id')->constrained('nature_of_authorizations')->onDelete('cascade');
            $table->foreignId('thematic_id')->default(1)->constrained('thematic_areas')->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
