<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgerEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_entries', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('account_id')->unsigned();
			$table->integer('debit')->nullable();
			$table->integer('credit')->nullable();
			$table->text('desc');
			$table->integer('balance');
            $table->timestamp('created_at')->default(DB::raw('NOW()'));
            
            $table->foreign('account_id')->references('id')->on('accounts')
						->onDelete('no action')
						->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledger_entries');
    }
}
