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
        Schema::create('setor_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setor_header_id')->constrained('setor_header')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('barang_id')->constrained('barang')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedInteger('jumlah');
            $table->decimal('subtotal', 15, 2)->default(0);
            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setor_detail');
    }
};
