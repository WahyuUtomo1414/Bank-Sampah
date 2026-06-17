<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = Artikel::query()
            ->with('kategori')
            ->latest('created_at')
            ->get();

        $featuredArticle = $articles->first();
        $articleCards = $articles
            ->skip(1)
            ->values()
            ->map(fn (Artikel $article) => $this->formatArticleCard($article));

        return view('pages.articles', [
            'hero' => [
                'eyebrow' => 'Artikel Edukasi',
                'title' => 'Wawasan praktis seputar sampah, lingkungan, dan kebiasaan baik warga.',
                'description' => 'Halaman artikel membantu warga memahami cara memilah sampah, manfaat bank sampah, dan langkah kecil yang berdampak untuk lingkungan sekitar.',
            ],
            'featuredArticle' => $featuredArticle ? $this->formatArticleCard($featuredArticle) : null,
            'categories' => $articles
                ->pluck('kategori.nama')
                ->filter()
                ->unique()
                ->values(),
            'articles' => $articleCards,
        ]);
    }

    public function show(Artikel $artikel)
    {
        $article = $artikel->load('kategori');

        $relatedArticles = Artikel::query()
            ->with('kategori')
            ->whereKeyNot($article->getKey())
            ->when($article->kategori_id, fn ($query) => $query->where('kategori_id', $article->kategori_id))
            ->latest('created_at')
            ->limit(3)
            ->get();

        if ($relatedArticles->count() < 3) {
            $relatedArticles = $relatedArticles
                ->concat(
                    Artikel::query()
                        ->with('kategori')
                        ->whereKeyNot($article->getKey())
                        ->whereNotIn('id', $relatedArticles->pluck('id'))
                        ->latest('created_at')
                        ->limit(3 - $relatedArticles->count())
                        ->get()
                )
                ->take(3);
        }

        return view('pages.article-detail', [
            'article' => [
                ...$this->formatArticleCard($article),
                'content' => $article->konten,
                'image' => $article->foto ?: $article->thumbnail,
            ],
            'relatedArticles' => $relatedArticles->map(fn (Artikel $related) => $this->formatArticleCard($related)),
        ]);
    }

    private function formatArticleCard(Artikel $article): array
    {
        $minutes = max(1, (int) ceil(str_word_count(strip_tags($article->konten)) / 160));

        return [
            'slug' => $article->slug,
            'category' => $article->kategori?->nama ?? 'Artikel',
            'title' => $article->judul,
            'excerpt' => Str::limit(strip_tags($article->konten), 140),
            'date' => $article->created_at?->locale('id')->translatedFormat('d F Y') ?? '-',
            'readTime' => $minutes . ' menit baca',
            'image' => $article->thumbnail,
        ];
    }
}
