<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrackingsTable extends Migration
{
    public function up()
    {
        Schema::table('trackings', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_5226566')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5226567')->references('id')->on('users');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id', 'transaction_fk_5226568')->references('id')->on('transactions');
        });
    }
}
