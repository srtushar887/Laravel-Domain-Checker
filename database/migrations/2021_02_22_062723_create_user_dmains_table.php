<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_dmains', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('domain_name')->nullable();
            $table->date('domain_create_date')->nullable();
            $table->date('domain_exp_date')->nullable();
            $table->text('domain_owner')->nullable();
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
        Schema::dropIfExists('user_dmains');
    }
}
