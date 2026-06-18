<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Support\ArticleViewDataBuilder;

class ArtikelController extends Controller
{
    public function index(ArticleViewDataBuilder $articleViewDataBuilder)
    {
        $articles = Artikel::query()
            ->with('kategori')
            ->where('active', true)
            ->latest('created_at')
            ->get();

        $featuredArticle = $articles->first();
        $articleCards = $articles
            ->skip(1)
            ->values()
            ->map(fn (Artikel $article) => $articleViewDataBuilder->toCard($article));

        return $this->renderPublicPage('pages.articles', [
            'hero' => [
                'eyebrow' => 'Artikel Edukasi',
                'title' => 'Wawasan praktis seputar sampah, lingkungan, dan kebiasaan baik warga.',
                'description' => 'Halaman artikel membantu warga memahami cara memilah sampah, manfaat bank sampah, dan langkah kecil yang berdampak untuk lingkungan sekitar.',
            ],
            'featuredArticle' => $featuredArticle ? $articleViewDataBuilder->toCard($featuredArticle) : null,
            'categories' => $articles
                ->pluck('kategori.nama')
                ->filter()
                ->unique()
                ->values(),
            'articles' => $articleCards,
        ]);
    }

    public function show(Artikel $artikel, ArticleViewDataBuilder $articleViewDataBuilder)
    {
        $article = $artikel->load('kategori');

        $relatedArticles = Artikel::query()
            ->with('kategori')
            ->where('active', true)
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
                        ->where('active', true)
                        ->whereKeyNot($article->getKey())
                        ->whereNotIn('id', $relatedArticles->pluck('id'))
                        ->latest('created_at')
                        ->limit(3 - $relatedArticles->count())
                        ->get()
                )
                ->take(3);
        }

        return $this->renderPublicPage('pages.article-detail', [
            'article' => $articleViewDataBuilder->toDetail($article),
            'relatedArticles' => $relatedArticles->map(fn (Artikel $related) => $articleViewDataBuilder->toCard($related)),
        ]);
    }
}
