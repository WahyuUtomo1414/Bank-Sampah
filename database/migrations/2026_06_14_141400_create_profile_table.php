<?php

use App\Traits\BaseModelSoftDeleteDefault;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use BaseModelSoftDeleteDefault;

    public function up(): void
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('nama', 128);
            $table->string('alamat', 255)->nullable();
            $table->json('kontak')->nullable();
            $table->string('visi', 255)->nullable();
            $table->json('misi')->nullable();
            $table->text('deskripsi')->nullable();
            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
