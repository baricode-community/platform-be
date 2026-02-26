<x-layouts.blog :title="__('Blog Baricode')">
    <div class="blog-container">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 3rem;">
            <h1 style="font-size: 3rem; font-weight: 700; color: white; margin-bottom: 0.5rem;">Blog Baricode</h1>
            <p style="font-size: 1.1rem; color: rgba(255,255,255,0.9);">Artikel terbaru dan berita dari tim Baricode</p>
        </div>
    </div>

    <div class="blog-container" style="margin-top: 2rem;">
        <!-- Error message -->
        @if (isset($error))
            <div
                style="background: #fee2e2; border-left: 4px solid #dc2626; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
                <p style="color: #991b1b; margin: 0; font-weight: 500;">⚠️ {{ $error }}</p>
            </div>
        @endif

        <!-- Blog posts grid -->
        @if (count($posts) > 0)
            <div style="display: grid; gap: 2rem; margin-bottom: 3rem;">
                @foreach ($posts as $post)
                    <article class="blog-article">
                        <div class="blog-article-header">
                            <!-- Title -->
                            <h2 class="blog-article-title">
                                <a href="{{ route('blog.show', $post['slug']) }}">
                                    {!! $post['title']['rendered'] !!}
                                </a>
                            </h2>

                            <!-- Meta information -->
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($post['date'])->translatedFormat('d F Y') }}</span>
                                </div>
                                @if (isset($post['_embedded']['author'][0]['name']))
                                    <div class="blog-meta-item">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $post['_embedded']['author'][0]['name'] }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Excerpt -->
                            <p class="blog-excerpt">
                                {!! strip_tags($post['excerpt']['rendered']) !!}
                            </p>

                            <!-- Read more button -->
                            <a href="{{ route('blog.show', $post['slug']) }}" class="blog-read-more">
                                Baca selengkapnya
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
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
