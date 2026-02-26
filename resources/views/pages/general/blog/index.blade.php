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
            <p style="font-size: 1.25rem; color: rgba(255,255,255,0.9); margin: 0;">Explore insights, tips, dan berita terkini dari komunitas IT Indonesia</p>
        </div>
    </div>

    <div class="blog-container" style="margin-top: 3rem;">
        <!-- Error message -->
        @if (isset($error))
            <div style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-left: 4px solid #dc2626; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; box-shadow: 0 4px 15px rgba(220, 38, 38, 0.2);">
                <p style="color: #991b1b; margin: 0; font-weight: 500;">⚠️ {{ $error }}</p>
            </div>
        @endif

        <!-- Blog posts grid -->
        @if (count($posts) > 0)
            <div style="display: grid; gap: 2.5rem; margin-bottom: 3rem;">
                @foreach ($posts as $post)
                    <article class="blog-article">
                        <!-- Featured Image -->
                        <div class="blog-article-featured">
                            @if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url']))
                                <img src="{{ $post['_embedded']['wp:featuredmedia'][0]['source_url'] }}" alt="{{ $post['title']['rendered'] }}" />
                            @else
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); display: flex; align-items: center; justify-content: center;">
                                    <span style="font-size: 3rem;">📝</span>
                                </div>
                            @endif
                        </div>

                        <div class="blog-article-header">
                            <!-- Category Badge -->
                            @if (isset($post['_embedded']['wp:term']))
                                @php
                                    $categories = [];
                                    foreach ($post['_embedded']['wp:term'] as $terms) {
                                        if (count($terms) > 0 && isset($terms[0]['taxonomy']) && $terms[0]['taxonomy'] == 'category') {
                                            $categories = array_slice(array_map(fn($term) => $term['name'], $terms), 0, 2);
                                        }
                                    }
                                @endphp
                                @foreach ($categories as $category)
                                    <span class="blog-badge">{{ $category }}</span>
                                @endforeach
                            @endif

                            <!-- Title -->
                            <h2 class="blog-article-title">
                                <a href="{{ route('blog.show', $post['slug']) }}">
                                    {!! $post['title']['rendered'] !!}
                                </a>
                            </h2>

                            <!-- Meta information -->
                            <div class="blog-meta">
                                @if (isset($post['_embedded']['author'][0]))
                                    <div class="blog-meta-item">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>{{ $post['_embedded']['author'][0]['name'] }}</span>
                                    </div>
                                @endif

                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($post['date'])->translatedFormat('d M Y') }}</span>
                                </div>

                                @php
                                    $wordCount = str_word_count(strip_tags($post['content']['rendered']));
                                    $readingTime = ceil($wordCount / 200);
                                @endphp
                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $readingTime }} min read</span>
                                </div>
                            </div>

                            <!-- Excerpt -->
                            <p class="blog-excerpt">
                                {!! strip_tags($post['excerpt']['rendered']) !!}
                            </p>

                            <!-- Read more button -->
                            <a href="{{ route('blog.show', $post['slug']) }}" class="blog-read-more">
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
            @if ($totalPages > 1)
                <div class="blog-pagination">
                    @if ($currentPage > 1)
                        <a href="{{ route('blog.index', ['page' => $currentPage - 1]) }}">
                            ← Sebelumnya
                        </a>
                    @endif

                    @for ($i = 1; $i <= $totalPages; $i++)
                        @if ($i == $currentPage)
                            <span>{{ $i }}</span>
                        @else
                            <a href="{{ route('blog.index', ['page' => $i]) }}">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($currentPage < $totalPages)
                        <a href="{{ route('blog.index', ['page' => $currentPage + 1]) }}">
                            Selanjutnya →
                        </a>
                    @endif
                </div>
            @endif
        @else
            <div class="blog-article" style="text-align: center; padding: 3rem;">
                <p style="font-size: 1.1rem; color: #6b7280; margin: 0;">📭 Belum ada artikel blog</p>
                <p style="color: #9ca3af; margin-top: 0.5rem;">Kembali lagi nanti untuk artikel terbaru</p>
            </div>
        @endif
    </div>
</x-layouts.blog>
