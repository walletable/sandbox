<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'holds';

    /**
     * Run the migrations.
     * @table wallet_locks
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('wallet_id')->index();
            $table->string('for_id', 100);
            $table->string('for_type', 45);
            $table->unsignedBigInteger('amount');
            $table->char('currency', 10);
            $table->char('tag', 45)->index();
            $table->string('remarks', 200)->index();
            $table->enum('action', ['released', 'resolved'])->nullable()->index();
            $table->enum('status', ['active', 'inactive'])->index();
            $table->dateTime('relieved_at')->nullable();
            $table->timestamps();


            $table->foreign('wallet_id')
                ->references('id')->on('wallets');
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
