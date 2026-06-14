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
        Schema::create('setor_header', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('kode', 128)->unique();
            $table->date('tanggal_transaksi');
            $table->decimal('total_harga', 15, 2)->default(0);
            $table->text('deskripsi')->nullable();
            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setor_header');
    }
};
