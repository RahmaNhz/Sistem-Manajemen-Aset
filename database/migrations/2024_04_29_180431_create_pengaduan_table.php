<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('users');
            $table->date('tanggal_pengaduan');
            $table->foreignId('aset_id')->constrained('asets');
            $table->foreignId('room_id')->constrained('room');
            $table->string('deskripsi_rusak');
            $table->string('status')->default('Diajukan');
            $table->string('ket_pengaduan')->nullable();
            $table->date('tanggal_selesai')->nullable();
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
        Schema::dropIfExists('pengaduan');
    }
}
