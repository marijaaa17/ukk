<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateGalleryFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_foto', function (Blueprint $table) {
            $table->id('foto_id'); // Membuat primary key 'foto_id'
            $table->string('judul_foto'); // Membuat kolom 'judul_foto'
            $table->text('deskripsi_foto')->nullable(); // Membuat kolom 'deskripsi_foto' yang bisa null
            $table->string('lokasi_file'); // Membuat kolom 'lokasi_file' untuk menyimpan path file
            $table->unsignedBigInteger('album_id'); // Gunakan tipe yang sama dengan 'album_id' di 'gallery_album'
            $table->foreign('album_id')->references('album_id')->on('gallery_album')->onDelete('cascade'); // Membuat foreign key 'album_id' yang merujuk ke tabel 'gallery_album'
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Membuat foreign key 'user_id' yang merujuk ke tabel 'users'
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at'
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_foto'); // Menghapus tabel 'gallery_foto' jika migration di-rollback
    }
}
