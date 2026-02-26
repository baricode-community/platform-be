<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class BlogController extends Controller
{
    private string $wordpressUrl = 'https://blog.baricode.org';

    /**
     * Display a listing of all blog posts
     */
    public function index(): View
    {
        try {
            $response = Http::get($this->wordpressUrl . '/wp-json/wp/v2/posts', [
                'per_page' => 10,
                'page' => request()->get('page', 1),
                '_embed' => true,
            ]);

            $posts = $response->successful() ? $response->json() : [];
            
            // Get total pages from header
            $totalPages = $response->header('X-WP-TotalPages') ?? 1;

            return view('pages.general.blog.index', [
                'posts' => $posts,
                'totalPages' => $totalPages,
                'currentPage' => request()->get('page', 1),
            ]);
        } catch (\Exception $e) {
            return view('pages.general.blog.index', [
                'posts' => [],
                'totalPages' => 1,
                'currentPage' => 1,
                'error' => 'Gagal mengambil data blog. Silakan coba lagi nanti.',
            ]);
        }
    }

    /**
     * Display a single blog post by slug
     */
    public function show(string $slug): View
    {
        try {
            $response = Http::get($this->wordpressUrl . '/wp-json/wp/v2/posts', [
                'slug' => $slug,
                '_embed' => true,
            ]);

            if (!$response->successful() || count($response->json()) === 0) {
                abort(404, 'Blog post tidak ditemukan');
            }

            $posts = $response->json();
            $post = $posts[0];

            return view('pages.general.blog.show', [
                'post' => $post
            ]);
        } catch (\Exception $e) {
            abort(404, 'Gagal mengambil data blog. Silakan coba lagi nanti.');
        }
    }

    /**
     * Get featured image URL from post
     */
    private function getFeaturedImage(array $post): ?string
    {
        if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url'])) {
            return $post['_embedded']['wp:featuredmedia'][0]['source_url'];
        }

        return null;
    }

    /**
     * Get author name from post
     */
    private function getAuthorName(array $post): string
    {
        if (isset($post['_embedded']['author'][0]['name'])) {
            return $post['_embedded']['author'][0]['name'];
        }

        return 'Unknown';
    }
}
