<x-layouts.blog :title="strip_tags($post['title']['rendered'])">
    <div style="padding: 3rem 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
        <div class="blog-container">
            <!-- Back button -->
            <a href="{{ route('blog.index') }}"
                style="display: inline-flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.9); text-decoration: none; font-weight: 500; padding: 0.5rem 1rem; border-radius: 8px; background: rgba(255,255,255,0.1); transition: all 0.3s ease; margin-bottom: 1rem;">
                <span>←</span> Kembali ke Blog
            </a>
            <h1 style="font-size: 2.5rem; font-weight: 700; margin: 1rem 0 0 0; line-height: 1.3;">
                {!! $post['title']['rendered'] !!}
            </h1>
        </div>
    </div>

    <div class="blog-container" style="margin-top: -2rem; margin-bottom: 3rem;">
        <!-- Article -->
        <article class="blog-article" style="border-radius: 12px; overflow: hidden;">
            <!-- Featured image -->
            @if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url']))
                <div style="width: 100%; height: 450px; background: #e5e7eb; overflow: hidden;">
                    <img src="{{ $post['_embedded']['wp:featuredmedia'][0]['source_url'] }}"
                        alt="{{ $post['title']['rendered'] }}" style="width: 100%; height: 100%; object-fit: cover;" />
                </div>
            @endif

            <!-- Article content -->
            <div style="padding: 3rem;">
                <!-- Meta information -->
                <div class="blog-meta" style="margin-bottom: 2rem;">
                    <div class="blog-meta-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($post['date'])->translatedFormat('d F Y H:i') }}</span>
                    </div>

                    @if (isset($post['_embedded']['author'][0]))
                        <div class="blog-meta-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ $post['_embedded']['author'][0]['name'] }}</span>
                        </div>
                    @endif

                    @if (isset($post['_embedded']['wp:term']))
                        @foreach ($post['_embedded']['wp:term'] as $terms)
                            @if (count($terms) > 0 && isset($terms[0]['taxonomy']) && $terms[0]['taxonomy'] == 'category')
                                <div class="blog-meta-item">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                    <span>{{ implode(', ', array_map(fn($term) => $term['name'], $terms)) }}</span>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Article body -->
                <div style="color: #374151; line-height: 1.8; font-size: 1.05rem; margin-bottom: 2rem;">
                    {!! $post['content']['rendered'] !!}
                </div>

                <!-- Tags -->
                @if (isset($post['_embedded']['wp:term']))
                    @foreach ($post['_embedded']['wp:term'] as $terms)
                        @if (count($terms) > 0 && isset($terms[0]['taxonomy']) && $terms[0]['taxonomy'] == 'post_tag')
                            <div style="padding-top: 2rem; border-top: 2px solid #f3f4f6;">
                                <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                                    @foreach ($terms as $tag)
                                        <a href="#"
                                            style="display: inline-block; padding: 0.5rem 1rem; background: #f0f4ff; color: #667eea; border-radius: 20px; font-size: 0.9rem; font-weight: 500; transition: all 0.3s ease; text-decoration: none;"
                                            onmouseover="this.style.background='#667eea'; this.style.color='white';"
                                            onmouseout="this.style.background='#f0f4ff'; this.style.color='#667eea';">
                                            #{{ $tag['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </article>

        <!-- Back to blog link -->
        <div style="text-align: center; margin-top: 2rem;">
            <a href="{{ route('blog.index') }}"
                style="display: inline-block; color: #667eea; text-decoration: none; font-weight: 600; transition: all 0.3s ease; padding: 0.75rem 1.5rem; border-radius: 8px; border: 2px solid #667eea;"
                onmouseover="this.style.background='#667eea'; this.style.color='white';"
                onmouseout="this.style.background='transparent'; this.style.color='#667eea';">
                ← Kembali ke Blog
            </a>
        </div>
    </div>
</x-layouts.blog>
