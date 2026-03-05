<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of all blog posts
     */
    public function index(): View
    {
        $currentPage = request()->get('page', 1);
        $perPage = 10;

        $posts = Blog::published()
            ->with(['author', 'categories', 'tags'])
            ->latest('created_at')
            ->paginate($perPage, ['*'], 'page', $currentPage);

        return view('pages.general.blog.index', [
            'posts' => $posts,
            'totalPages' => $posts->lastPage(),
            'currentPage' => $currentPage,
        ]);
    }

    /**
     * Display a single blog post by slug
     */
    public function show(string $slug): View
    {
        $post = Blog::published()
            ->where('slug', $slug)
            ->with(['author', 'categories', 'tags'])
            ->firstOrFail();

        return view('pages.general.blog.show', [
            'post' => $post
        ]);
    }
}
