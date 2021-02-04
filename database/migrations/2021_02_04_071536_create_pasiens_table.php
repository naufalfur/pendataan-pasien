<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('rt_rw');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki_laki','perempuan']);
            $table->timestamps();
        });

        Schema::table('pasiens', function (Blueprint $table){
            $table->foreignId('kelurahan_id')
                ->constrained('kelurahans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
