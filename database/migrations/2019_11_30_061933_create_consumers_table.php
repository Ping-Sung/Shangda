<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 顧客資料表 (廠商)
        Schema::create('consumers', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('編號');
            $table->unsignedBigInteger('discount_id')->comment('折扣編號');
            
            $table->string('name', 100)->comment('名稱');
            $table->string('shortName', 100)->nullable()->comment('簡稱');
            $table->string('act', 30)->unique()->comment('帳號');
            $table->string('pwd')->comment('密碼');
            $table->string('taxID')->nullable()->unique()->comment('統一編號');
            $table->string('idNumber')->nullable()->unique()->comment('身分證');
            $table->string('tax', 25)->nullable()->comment('傳真');
  
            $table->string('inCharge1', 50)->comment('聯絡人名稱1');                 //主要聯絡人資訊
            $table->string('tel1', 25)->comment('聯絡人電話1');                      
            $table->string('email1', 100)->nullable()->comment('聯絡人信箱1');
            $table->string('inCharge2', 50)->nullable()->comment('聯絡人名稱2');     //次要聯絡人資訊
            $table->string('tel2', 25)->nullable()->comment('聯絡人電話2');
            $table->string('email2', 100)->nullable()->comment('聯絡人信箱2');
            
            $table->unsignedInteger('monthlyCheckDate')->nullable()->comment('月結日');
            $table->float('uncheckedAmount')->default(0)->comment('未沖帳總額');
            $table->float('totalConsumption')->default(0)->comment('總消費額');

            $table->string('companyAddress')->comment('公司地址');
            $table->string('deliveryAddress')->comment('送貨地址');
            $table->string('invoiceAddress')->comment('發票地址');
            $table->string('comment')->nullable()->comment('備註');
            
            $table->softDeletes(); //黑名單
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('discount_id')->references('id')->on('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
