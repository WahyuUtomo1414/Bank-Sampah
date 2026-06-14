<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'profile';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'kontak' => 'array',
            'misi' => 'array',
        ];
    }
}
