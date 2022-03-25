<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->primary('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->json('avatar')->default('default.png');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 45);
            $table->timestamp('phone_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->enum('status', ['ban', 'active']);

            $table->index(["status"], 'status_index');

            $table->unique(["email"], 'users_email_unique');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
