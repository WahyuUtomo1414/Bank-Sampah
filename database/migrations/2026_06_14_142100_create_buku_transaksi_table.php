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
        Schema::create('buku_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ref_id');
            $table->string('ref_type', 128);
            $table->date('tanggal_transaksi');
            $table->foreignId('warga_id')->constrained('warga')->cascadeOnUpdate()->restrictOnDelete();
            $table->decimal('total_harga', 15, 2);
            $table->text('deskripsi')->nullable();
            $table->index(['ref_id', 'ref_type']);
            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku_transaksi');
    }
};
