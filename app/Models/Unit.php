<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'unit';

    protected $guarded = ['id'];

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'unit_id');
    }
}
