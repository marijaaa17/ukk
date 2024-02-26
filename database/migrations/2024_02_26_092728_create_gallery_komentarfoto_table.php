<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateGalleryKomentarfotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_komentarfoto', function (Blueprint $table) {
            $table->id('komentar_id'); // Membuat primary key 'komentar_id'
            $table->unsignedBigInteger('foto_id'); // Gunakan tipe yang sama dengan 'foto_id' di 'gallery_foto'
            $table->foreign('foto_id')->references('foto_id')->on('gallery_foto')->onDelete('cascade'); // Foreign key 'foto_id' ke 'gallery_foto' Secara eksplisit merujuk ke 'foto_id' di 'gallery_foto'
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key 'user_id' ke 'users'
            $table->text('isi_komentar'); // Kolom untuk isi komentar
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' secara otomatis
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_komentarfoto'); // Menghapus tabel 'gallery_komentarfoto' jika migration di-rollback
    }
}
