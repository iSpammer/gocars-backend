<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("mac")->nullable();
            $table->text('value')->nullable();
            $table->text('flame')->nullable();
            $table->text('smoke')->nullable();

            $table->timestamps();

        });

        DB::table('temps')->insert(
            ['id' => 1, "mac" => "11:22:33:44:55", 'value'=>"32" ,'flame'=>"LOW" ,'smoke'=>"YES" ,"created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()]
        );
        DB::table('temps')->insert(
            ['id' => 2, "mac" => "22:34:45:14:25", 'value'=>"11" ,'flame'=>"HIGHT" ,'smoke'=>"NO" ,"created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()]
        );
        DB::table('temps')->insert(
            ['id' => 3, "mac" => "33:42:13:41:25", 'value'=>"12" ,'flame'=>"MEDIUM" ,'smoke'=>"NO" ,"created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()]
        );
        DB::table('temps')->insert(
            ['id' => 4, "mac" => "12:11:42:24:15", 'value'=>"21" ,'flame'=>"LOW" ,'smoke'=>"YES" ,"created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()]
        );
        DB::table('temps')->insert(
            ['id' => 5, "mac" => "21:24:35:33:15", 'value'=>"26" ,'flame'=>"MEDIUM" ,'smoke'=>"NO" ,"created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temps');
    }
}
