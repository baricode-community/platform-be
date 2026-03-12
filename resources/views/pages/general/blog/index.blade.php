<x-layouts.blog :title="__('Blog Baricode')">
    <!-- Hero Header -->
    <div style="padding: 4rem 0; background: linear-gradient(135deg, #2563eb 0%, #1e40af 50%, #1e3a8a 100%); color: white; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.1;">
            <svg style="width: 100%; height: 100%; object-fit: cover;" viewBox="0 0 1000 500" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="1000" height="500" fill="url(#grid)" />
            </svg>
        </div>
        <div class="blog-container" style="position: relative; z-index: 1;">
            <h1 style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">✨ Temukan Cerita & Wawasan Teknologi Terkini</h1>
            <p style="font-size: 1.25rem; color: rgba(255,255,255,0.9); margin: 0 0 2rem 0;">Explore insights, tips, dan berita terkini dari komunitas IT Indonesia</p>

            <!-- Search Form -->
            <form action="{{ route('blog.index') }}" method="GET" style="display: flex; gap: 0.75rem; max-width: 600px;">
                <input
                    type="text"
                    name="q"
                    value="{{ $search ?? '' }}"
                    placeholder="Cari artikel..."
                    style="flex: 1; padding: 0.75rem 1.25rem; border-radius: 10px; border: 2px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.1); color: white; font-size: 1rem; outline: none; backdrop-filter: blur(5px);"
                    onfocus="this.style.borderColor='rgba(255,255,255,0.7)'"
                    onblur="this.style.borderColor='rgba(255,255,255,0.3)'"
                />
                <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 10px; background: white; color: #1e40af; font-weight: 600; border: none; cursor: pointer; font-size: 1rem; transition: all 0.2s ease;"
                    onmouseover="this.style.background='#dbeafe'"
                    onmouseout="this.style.background='white'">
                    Cari
                </button>
                @if($search)
                    <a href="{{ route('blog.index') }}" style="padding: 0.75rem 1rem; border-radius: 10px; background: rgba(255,255,255,0.15); color: white; border: 2px solid rgba(255,255,255,0.3); text-decoration: none; font-weight: 500; display: flex; align-items: center;">✕</a>
                @endif
            </form>
        </div>
    </div>

    <div class="blog-container" style="margin-top: 3rem;">
        <!-- Active filter label -->
        @if(!empty($filterLabel))
            <div style="margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem;">
                <span style="padding: 0.5rem 1.25rem; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: white; border-radius: 20px; font-weight: 600; font-size: 0.95rem;">
                    {{ $filterLabel }}
                </span>
                <a href="{{ route('blog.index') }}" style="color: #94a3b8; font-size: 0.9rem; text-decoration: none; transition: color 0.2s;"
                    onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='#94a3b8'">
                    ✕ Hapus filter
                </a>
            </div>
        @elseif($search)
            <div style="margin-bottom: 2rem;">
                <p style="color: #94a3b8; font-size: 0.95rem;">
                    Hasil pencarian untuk <strong style="color: #f1f5f9;">"{{ $search }}"</strong>
                    — {{ $posts->total() }} artikel ditemukan
                </p>
            </div>
        @endif

        <!-- Blog posts grid -->
        @if ($posts->count() > 0)
            <div style="display: grid; gap: 2.5rem; margin-bottom: 3rem;">
                @foreach ($posts as $post)
                    <article class="blog-article">
                        <!-- Featured Image -->
                        <div class="blog-article-featured">
                            @if ($post->featured_image)
                                <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" />
                            @else
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); display: flex; align-items: center; justify-content: center;">
                                    <span style="font-size: 3rem;">📝</span>
                                </div>
                            @endif
                        </div>

                        <div class="blog-article-header">
                            <!-- Category Badges -->
                            @if ($post->categories->count() > 0)
                                @foreach ($post->categories->take(2) as $category)
                                    <a href="{{ route('blog.category', $category->slug) }}" class="blog-badge" style="text-decoration: none;">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            @endif

                            <!-- Title -->
                            <h2 class="blog-article-title">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <!-- Meta information -->
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>{{ $post->author->name }}</span>
                                </div>

                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ ($post->published_at ?? $post->created_at)->translatedFormat('d M Y') }}</span>
                                </div>

                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $post->reading_time }} min read</span>
                                </div>

                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span>{{ number_format($post->views_count) }} views</span>
                                </div>
                            </div>

                            <!-- Excerpt -->
                            @if ($post->excerpt)
                                <p class="blog-excerpt">{{ $post->excerpt }}</p>
                            @endif

                            <!-- Read more button -->
                            <a href="{{ route('blog.show', $post->slug) }}" class="blog-read-more">
                                Baca Selengkapnya
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($posts->hasPages())
                <div class="blog-pagination">
                    {{ $posts->links('pagination::simple-bootstrap-5') }}
                </div>
            @endif
        @else
            <div class="blog-article" style="text-align: center; padding: 3rem;">
                <p style="font-size: 1.1rem; color: #6b7280; margin: 0;">📭 Tidak ada artikel ditemukan</p>
                <p style="color: #9ca3af; margin-top: 0.5rem;">
                    @if($search)
                        Coba kata kunci lain atau <a href="{{ route('blog.index') }}" style="color: #3b82f6;">lihat semua artikel</a>
                    @else
                        Kembali lagi nanti untuk artikel terbaru
                    @endif
                </p>
            </div>
        @endif
    </div>
</x-layouts.blog>
