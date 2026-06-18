<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Profile;

class AboutController extends Controller
{
    public function index()
    {
        $profile = Profile::query()
            ->where('active', true)
            ->latest('id')
            ->first();

        $locations = Lokasi::query()
            ->where('active', true)
            ->get()
            ->map(function (Lokasi $location) {
                return [
                    'nama' => $location->nama,
                    'googleMapsUrl' => $location->getGoogleMapsUrl(),
                    'googleMapsEmbedUrl' => $location->getGoogleMapsEmbedUrl(),
                ];
            })
            ->all();

        return $this->renderPublicPage('pages.about', [
            'hero' => [
                'eyebrow' => 'Tentang Kami',
                'title' => $profile?->nama,
                'description' => $profile?->deskripsi,
            ],
            'story' => [
                'lead' => $profile?->visi,
                'paragraphs' => collect([$profile?->deskripsi])
                    ->filter()
                    ->values()
                    ->all(),
            ],
            'visionMission' => [
                'vision' => $profile?->visi,
                'missions' => collect($profile?->misi ?? [])
                    ->filter()
                    ->values()
                    ->all(),
            ],
            'locations' => $locations,
        ]);
    }
}
