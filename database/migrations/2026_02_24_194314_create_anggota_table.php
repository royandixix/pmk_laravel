<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('umur');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('photo')->nullable();
            $table->string('phone');
            $table->enum('jenis', ['biasa', 'luar_biasa']);
            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
