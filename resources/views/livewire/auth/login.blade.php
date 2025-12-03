<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 text-white overflow-hidden flex items-center justify-center px-4 py-20">
        
        <!-- Background Code Snippets -->
        <div class="fixed inset-0 opacity-5 pointer-events-none">
            <pre class="text-purple-300 text-sm">
function login() {
    const auth = authenticate();
    return auth.verify();
}
            </pre>
        </div>

        <!-- Floating Decorations -->
        <div class="absolute top-20 left-10 animate-bounce delay-100">
            <div class="bg-purple-500/20 backdrop-blur-lg rounded-3xl p-4 text-4xl">🔐</div>
        </div>
        <div class="absolute bottom-40 right-20 animate-bounce delay-500">
            <div class="bg-indigo-500/20 backdrop-blur-lg rounded-3xl p-4 text-4xl">💜</div>
        </div>

        <div class="max-w-md w-full z-10">
            <!-- Logo Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-purple-400 via-violet-400 to-indigo-400 bg-clip-text text-transparent">
                    {{ __('Selamat Datang') }}
                </h1>
                <p class="text-gray-300 text-lg">
                    {{ __('Masuk ke akun Baricode kamu') }}
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-2xl text-green-300 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <div class="bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-xl rounded-3xl p-8 border border-purple-500/20 mb-8">
                <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            {{ __('Email') }}
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="kamu@example.com"
                            class="w-full px-4 py-3 bg-white/5 border border-purple-500/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-purple-500/60 focus:ring-2 focus:ring-purple-500/20 transition-all"
                        />
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            {{ __('Password') }}
                        </label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 bg-white/5 border border-purple-500/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-purple-500/60 focus:ring-2 focus:ring-purple-500/20 transition-all"
                        />
                        @error('password')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-purple-500/30 bg-white/5 text-purple-600 focus:ring-purple-500/20 cursor-pointer"
                        />
                        <label for="remember" class="ml-3 text-sm text-gray-300 cursor-pointer">
                            {{ __('Ingat saya') }}
                        </label>
                    </div>

                    <!-- Forgot Password Link -->
                    @if (Route::has('password.request'))
                        <div class="text-right">
                            <a href="{{ route('password.request') }}" class="text-sm text-purple-400 hover:text-purple-300 transition-colors" wire:navigate>
                                {{ __('Lupa password?') }}
                            </a>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full px-4 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl font-semibold text-lg hover:shadow-2xl hover:shadow-purple-500/50 transition-all transform hover:scale-105"
                        data-test="login-button"
                    >
                        {{ __('Masuk') }}
                    </button>
                </form>
            </div>

            <!-- Sign Up Link -->
            @if (Route::has('register'))
                <div class="text-center">
                    <p class="text-gray-300">
                        {{ __('Belum punya akun?') }}
                        <a href="{{ route('register') }}" class="text-purple-400 font-semibold hover:text-purple-300 transition-colors" wire:navigate>
                            {{ __('Daftar Sekarang') }}
                        </a>
                    </p>
                </div>
            @endif

            <!-- Back to Home -->
            <div class="text-center mt-6">
                <a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-gray-300 transition-colors" wire:navigate>
                    ← {{ __('Kembali ke Beranda') }}
                </a>
            </div>
        </div>
    </div>

    @fluxScripts
</body>
</html>
