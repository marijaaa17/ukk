<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddUsernameAndAlamatToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Menambahkan kolom 'username' dan 'alamat' ke tabel 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique(); // Menambahkan kolom 'username' yang unik
            $table->text('alamat'); // Menambahkan kolom 'alamat'
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus kolom 'username' dan 'alamat' jika migration di-rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username'); // Menghapus kolom 'username'
            $table->dropColumn('alamat'); // Menghapus kolom 'alamat'
        });
    }
}
