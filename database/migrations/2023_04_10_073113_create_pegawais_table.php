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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pegawai', 10)->unique();
            $table->string('nama', 50)->nullable();
            $table->string('jk')->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->string('no_telp', 13)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir',50)->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
};
