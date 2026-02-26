<x-layouts.blog :title="strip_tags($post['title']['rendered'])">
    <!-- Hero Header -->
    <div style="padding: 3rem 0; background: linear-gradient(135deg, #2563eb 0%, #1e40af 50%, #1e3a8a 100%); color: white; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.1;">
            <svg style="width: 100%; height: 100%;" viewBox="0 0 1000 500" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid-detail" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="1000" height="500" fill="url(#grid-detail)" />
            </svg>
        </div>
        <div class="blog-container" style="position: relative; z-index: 1;">
            <!-- Back button -->
            <a href="{{ route('blog.index') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.9); text-decoration: none; font-weight: 500; padding: 0.5rem 1rem; border-radius: 8px; background: rgba(255,255,255,0.1); transition: all 0.3s ease; margin-bottom: 1rem; border: 1px solid rgba(255,255,255,0.2);">
                <span>←</span> Kembali ke Blog
            </a>
            <h1 style="font-size: 2.8rem; font-weight: 700; margin: 1rem 0 0 0; line-height: 1.3;">
                {!! $post['title']['rendered'] !!}
            </h1>
        </div>
    </div>

    <div class="blog-container" style="margin-top: -2rem; margin-bottom: 3rem;">
        <!-- Article -->
        <article class="blog-article" style="border-radius: 15px; overflow: hidden;">
            <!-- Featured image -->
            @if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url']))
                <div style="width: 100%; height: 450px; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); overflow: hidden; position: relative;">
                    <img src="{{ $post['_embedded']['wp:featuredmedia'][0]['source_url'] }}" alt="{{ $post['title']['rendered'] }}" style="width: 100%; height: 100%; object-fit: cover;" />
                </div>
            @else
                <div style="width: 100%; height: 450px; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); display: flex; align-items: center; justify-content: center;">
                    <span style="font-size: 5rem; opacity: 0.5;">📝</span>
                </div>
            @endif

            <!-- Article content -->
            <div style="padding: 3rem;">
                <!-- Category Badges -->
                @if (isset($post['_embedded']['wp:term']))
                    @foreach ($post['_embedded']['wp:term'] as $terms)
                        @if (count($terms) > 0 && isset($terms[0]['taxonomy']) && $terms[0]['taxonomy'] == 'category')
                            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                                @foreach ($terms as $category)
                                    <span class="blog-badge">{{ $category['name'] }}</span>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                @endif

                <!-- Meta information -->
                <div class="blog-meta" style="margin-bottom: 2rem;">
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
                        <span>{{ \Carbon\Carbon::parse($post['date'])->translatedFormat('d F Y H:i') }}</span>
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

                    <div class="blog-meta-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $wordCount }} kata</span>
                    </div>
                </div>

                <!-- Article body -->
                <div style="color: #e2e8f0; line-height: 2; font-size: 1.1rem; margin-bottom: 2rem;">
                    {!! $post['content']['rendered'] !!}
                </div>

                <!-- Tags -->
                @if (isset($post['_embedded']['wp:term']))
                    @foreach ($post['_embedded']['wp:term'] as $terms)
                        @if (count($terms) > 0 && isset($terms[0]['taxonomy']) && $terms[0]['taxonomy'] == 'post_tag')
                            <div style="padding-top: 2rem; border-top: 2px solid rgba(37, 99, 235, 0.2);">
                                <h3 style="color: #f1f5f9; font-weight: 600; margin: 0 0 1rem 0;">🏷️ Tags</h3>
                                <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                                    @foreach ($terms as $tag)
                                        <a href="#" style="display: inline-block; padding: 0.5rem 1rem; background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%); color: #dbeafe; border-radius: 20px; font-size: 0.9rem; font-weight: 500; transition: all 0.3s ease; text-decoration: none; border: 1px solid #2563eb;" 
                                            onmouseover="this.style.background='linear-gradient(135deg, #2563eb 0%, #1e40af 100%)'; this.style.color='white'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(37, 99, 235, 0.3)';"
                                            onmouseout="this.style.background='linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%)'; this.style.color='#dbeafe'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
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
        <div style="text-align: center; margin-top: 3rem;">
            <a href="{{ route('blog.index') }}" style="display: inline-block; color: #2563eb; text-decoration: none; font-weight: 600; transition: all 0.3s ease; padding: 0.875rem 2rem; border-radius: 8px; border: 2px solid #2563eb; background: transparent;" 
                onmouseover="this.style.background='linear-gradient(135deg, #2563eb 0%, #1e40af 100%)'; this.style.color='white'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(37, 99, 235, 0.3)';"
                onmouseout="this.style.background='transparent'; this.style.color='#2563eb'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                ← Kembali ke Blog
            </a>
        </div>
    </div>
</x-layouts.blog>
