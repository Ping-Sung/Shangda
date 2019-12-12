<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 原物料
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('編號');
            $table->string('name')->comment('名稱');
            $table->string('shortName', 100)->nullable()->comment('簡稱');
            $table->string('internationalNum', 25)->nullable()->comment('國際條碼');
            $table->string('unit', 25)->default('kg')->comment('慣用單位');
            $table->double('unitPrice')->default(0)->comment('單價');
            $table->string('comment')->nullable()->comment('備註');
            $table->unsignedInteger('stock')->default(0)->comment('目前存貨量');
            $table->string('picture')->nullable()->comment('圖片');
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
        Schema::dropIfExists('materials');
    }
}