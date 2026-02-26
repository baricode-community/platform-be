<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    @include('partials.head')
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .blog-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 0;
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 2rem), 0 100%);
        }

        .blog-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .blog-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .blog-nav-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
        }

        .blog-logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .blog-nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .blog-nav-link {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .blog-nav-link:hover {
            color: #667eea;
        }

        .blog-nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
        }

        .blog-nav-link:hover::after {
            width: 100%;
        }

        .blog-main {
            margin-top: -1rem;
            padding: 2rem 0;
        }

        .blog-article {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .blog-article:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .blog-article-header {
            padding: 2rem;
        }

        .blog-article-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 1rem 0;
            line-height: 1.4;
        }

        .blog-article-title a {
            color: #1f2937;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .blog-article-title a:hover {
            color: #667eea;
        }

        .blog-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            font-size: 0.95rem;
            color: #6b7280;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 1rem;
        }

        .blog-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .blog-meta-item svg {
            width: 18px;
            height: 18px;
            color: #667eea;
        }

        .blog-excerpt {
            color: #4b5563;
            line-height: 1.8;
            font-size: 1rem;
            margin: 1.5rem 0;
        }

        .blog-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .blog-read-more:hover {
            background: #667eea;
            color: white;
            transform: translateX(5px);
        }

        .blog-footer {
            background: white;
            color: #6b7280;
            padding: 3rem 1.5rem;
            margin-top: 3rem;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }

        .blog-footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin: 2rem 0;
        }

        .blog-pagination a,
        .blog-pagination span {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .blog-pagination span {
            background: #667eea;
            color: white;
            font-weight: 600;
        }

        .blog-pagination a {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            text-decoration: none;
        }

        .blog-pagination a:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .blog-nav-links {
                gap: 1rem;
                font-size: 0.9rem;
            }

            .blog-article-title {
                font-size: 1.4rem;
            }

            .blog-meta {
                gap: 1rem;
                font-size: 0.85rem;
            }
        }

        /* Smooth transitions */
        * {
            transition: background-color 0.2s ease;
        }

        /* Loading animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .blog-article {
            animation: fadeIn 0.5s ease;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="blog-nav">
        <div class="blog-nav-content">
            <a href="{{ route('blog.index') }}" class="blog-logo">Blog Baricode</a>
            <ul class="blog-nav-links">
                <li><a href="{{ route('blog.index') }}" class="blog-nav-link">Beranda</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="blog-main">
        @if (isset($slot))
            {{ $slot }}
        @else
            @yield('content')
        @endif
    </div>

    <!-- Footer -->
    <footer class="blog-footer">
        <div class="blog-footer-content">
            <p>&copy; {{ date('Y') }} Baricode. Komunitas IT Keren di Indonesia.</p>
            <p style="font-size: 0.9rem; margin-top: 0.5rem;">Baca artikel terbaru dan terlengkap tentang teknologi dan programming.</p>
        </div>
    </footer>

    @fluxScripts
</body>

</html>
