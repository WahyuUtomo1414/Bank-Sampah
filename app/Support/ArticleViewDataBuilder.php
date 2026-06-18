<?php

namespace App\Support;

use App\Models\Artikel;
use Illuminate\Support\Str;

class ArticleViewDataBuilder
{
    public function toCard(Artikel $article): array
    {
        $imagePath = $article->getPrimaryImagePath();
        $imageUrl = $article->getPrimaryImageUrl();

        return [
            'slug' => $article->slug,
            'category' => $article->kategori?->nama ?? 'Artikel',
            'title' => $article->judul,
            'excerpt' => Str::limit(strip_tags($article->konten), 140),
            'date' => $article->created_at?->locale('id')->translatedFormat('d F Y') ?? '-',
            'readTime' => max(1, (int) ceil(str_word_count(strip_tags($article->konten)) / 160)) . ' menit baca',
            'image' => $imagePath,
            'imageUrl' => $imageUrl,
            'hasImage' => $article->hasPrimaryImage(),
        ];
    }

    public function toDetail(Artikel $article): array
    {
        return [
            ...$this->toCard($article),
            'content' => $article->konten,
            'contentParagraphs' => collect(preg_split("/\n\s*\n/", trim($article->konten)))
                ->map(fn (string $paragraph): string => trim($paragraph))
                ->filter()
                ->values()
                ->all(),
        ];
    }
}
