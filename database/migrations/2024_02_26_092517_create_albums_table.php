<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateGalleryAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_album', function (Blueprint $table) {
            $table->id('album_id'); // Membuat primary key 'album_id'
            $table->string('nama_album'); // Membuat kolom 'nama_album'
            $table->text('deskripsi')->nullable(); // Membuat kolom 'deskripsi' yang bisa null
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Membuat foreign key 'user_id' yang merujuk ke 'id' di tabel 'users' dengan constraint onDelete cascade
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
        Schema::dropIfExists('gallery_album'); // Menghapus tabel 'gallery_album' jika migration di-rollback
    }
}
