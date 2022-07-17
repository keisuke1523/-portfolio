<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // カラム名を変更
        Schema::table('diary_post', function (Blueprint $table) {
            $table->binary('image');
        });

               // カラム名を変更
              // Schema::table('study_post', function (Blueprint $table) {
                // 型を変える場合
                //$table->string('name')->default(NULL)->change();
                // 型を変える場合　nullを許可に変更
                //$table->string('name')->nullable()->change();
                // カラム削除
                //$table->dropColumn('name');
                // 追加
                //$table->string('name2')->default(NULL);
             //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
