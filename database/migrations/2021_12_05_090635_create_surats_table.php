<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->enum('jenis_surat', ['tugas pribadi', 'tugas kelompok', 'tugas dosen', 'berita acara', 'sk dosen', 'personalia']);
            $table->string('judul')->nullable();
            $table->string('kepada')->nullable();
            $table->string('alamat')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('dosen_id')->nullable();
            $table->foreign('dosen_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_mitra')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tempat')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('tema')->nullable();
            $table->enum('status', ['proses', 'diterima', 'ditolak']);
            $table->unsignedBigInteger('sign_id')->nullable();
            $table->foreign('sign_id')->references('id')->on('signs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('surats');
    }
}
