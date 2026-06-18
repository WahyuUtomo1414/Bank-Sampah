<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Lokasi extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'lokasi';

    protected $guarded = ['id'];

    public function getGoogleMapsUrl(): ?string
    {
        $value = trim((string) $this->google_maps);

        if ($value === '') {
            return null;
        }

        if (preg_match('/src="([^"]+)"/i', $value, $matches) === 1) {
            return html_entity_decode($matches[1], ENT_QUOTES, 'UTF-8');
        }

        return Str::startsWith($value, ['http://', 'https://']) ? $value : null;
    }

    public function getGoogleMapsEmbedUrl(): ?string
    {
        $url = $this->getGoogleMapsUrl();

        if (blank($url)) {
            return null;
        }

        return Str::contains($url, '/maps/embed?') ? $url : null;
    }
}
