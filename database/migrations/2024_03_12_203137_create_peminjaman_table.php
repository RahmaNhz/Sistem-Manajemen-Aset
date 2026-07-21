<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aset_id')->constrained('asets');
            $table->foreignId('pegawai_id')->constrained('users');
            $table->date('tanggal_pinjam');
            $table->date('rencana_kembali');
            $table->integer('jumlah_pinjam');
            $table->date('tanggal_pengembalian')->nullable();
            $table->string('ket_pinjam')->default('Menunggu Approval');
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
        Schema::dropIfExists('peminjaman');
    }
}
