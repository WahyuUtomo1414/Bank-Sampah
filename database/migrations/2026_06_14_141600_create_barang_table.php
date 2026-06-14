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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('unit_id')->constrained('unit')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->decimal('harga', 15, 2);
            $table->text('deskripsi')->nullable();
            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
