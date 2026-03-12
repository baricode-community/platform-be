<div class="space-y-8">

    {{-- Score Result --}}
    @if ($submitted)
        <div class="text-center py-16 space-y-6">
            <div class="w-24 h-24 bg-green-500/20 rounded-full flex items-center justify-center mx-auto border border-green-500/40">
                <svg class="w-12 h-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-white">Quiz Selesai!</h2>
                <p class="text-purple-300 mt-1">Kamu telah menyelesaikan <strong class="text-white">{{ $quiz->title }}</strong></p>
            </div>

            <div class="bg-gradient-to-br from-green-700/30 to-emerald-700/30 border border-green-500/30 rounded-2xl p-10 inline-block">
                <p class="text-sm uppercase tracking-widest text-green-300 mb-2">Total Skor</p>
                <p class="text-6xl font-extrabold text-white">{{ $totalScore }}</p>
                <p class="text-sm text-green-300 mt-2">poin</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                <button
                    wire:click="retakeQuiz"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white/10 hover:bg-white/20 border border-purple-500/30 text-white font-semibold rounded-lg transition"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Ulangi Quiz
                </button>
                <a href="{{ route('lms.quiz.index') }}"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition">
                    Quiz Lainnya →
                </a>
            </div>
        </div>

    {{-- Quiz Form --}}
    @else
        <form wire:submit="submitQuiz" class="space-y-6">

            @foreach ($quiz->questions as $index => $question)
                <div class="bg-white/5 backdrop-blur-lg border border-purple-500/20 rounded-xl p-6 space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-8 h-8 bg-purple-500/30 text-purple-300 text-sm font-bold rounded-full flex items-center justify-center border border-purple-500/40">
                            {{ $index + 1 }}
                        </span>
                        <p class="font-semibold text-white pt-1">{{ $question->question_text }}</p>
                    </div>

                    <p class="text-xs text-purple-400 ml-11">Boleh pilih lebih dari satu jawaban</p>

                    <div class="ml-11 space-y-2">
                        @foreach ($question->options as $option)
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-purple-500/20 hover:border-green-500/40 hover:bg-green-500/5 cursor-pointer transition-all has-[:checked]:border-green-500/60 has-[:checked]:bg-green-500/10">
                                <input
                                    type="checkbox"
                                    wire:model="answers.{{ $question->id }}"
                                    value="{{ $option->id }}"
                                    class="w-4 h-4 rounded border-purple-500/40 bg-white/5 text-green-500 focus:ring-green-500/30"
                                />
                                <span class="text-purple-100">{{ $option->option_text }}</span>
                            </label>
                        @endforeach
                    </div>

                    @error("answers.{$question->id}")
                        <p class="ml-11 text-sm text-red-400 flex items-center gap-1 mt-1">
                            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            @endforeach

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl transition shadow-lg hover:shadow-green-500/30 disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center gap-2"
            >
                <span wire:loading.remove class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Submit Quiz
                </span>
                <span wire:loading class="flex items-center gap-2">
                    <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Mengirim...
                </span>
            </button>

        </form>
    @endif

</div>
