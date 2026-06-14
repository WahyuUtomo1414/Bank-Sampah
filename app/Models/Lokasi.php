<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokasi extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'lokasi';

    protected $guarded = ['id'];
}
