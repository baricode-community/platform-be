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
function resetPassword() {
    const token = generateToken();
    return sendEmail(token);
}
            </pre>
        </div>

        <!-- Floating Decorations -->
        <div class="absolute top-20 left-10 animate-bounce delay-100">
            <div class="bg-purple-500/20 backdrop-blur-lg rounded-3xl p-4 text-4xl">📧</div>
        </div>
        <div class="absolute bottom-40 right-20 animate-bounce delay-500">
            <div class="bg-indigo-500/20 backdrop-blur-lg rounded-3xl p-4 text-4xl">🔑</div>
        </div>

        <div class="max-w-md w-full z-10">
            <!-- Logo Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-purple-400 via-violet-400 to-indigo-400 bg-clip-text text-transparent">
                    {{ __('Lupa Password?') }}
                </h1>
                <p class="text-gray-300 text-lg">
                    {{ __('Tidak masalah! Kami akan mengirim link reset ke email kamu') }}
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-2xl text-green-300 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Forgot Password Form -->
            <div class="bg-gradient-to-br from-purple-500/10 to-indigo-500/10 backdrop-blur-xl rounded-3xl p-8 border border-purple-500/20 mb-8">
                <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-6">
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
                            required
                            autofocus
                            placeholder="kamu@example.com"
                            class="w-full px-4 py-3 bg-white/5 border border-purple-500/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-purple-500/60 focus:ring-2 focus:ring-purple-500/20 transition-all"
                        />
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full px-4 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl font-semibold text-lg hover:shadow-2xl hover:shadow-purple-500/50 transition-all transform hover:scale-105"
                        data-test="email-password-reset-link-button"
                    >
                        {{ __('Kirim Link Reset') }}
                    </button>
                </form>
            </div>

            <!-- Back to Login -->
            <div class="text-center">
                <p class="text-gray-300">
                    <a href="{{ route('login') }}" class="text-purple-400 font-semibold hover:text-purple-300 transition-colors" wire:navigate>
                        ← {{ __('Kembali ke Masuk') }}
                    </a>
                </p>
            </div>
        </div>
    </div>

    @fluxScripts
</body>
</html>
