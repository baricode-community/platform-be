<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public $csv_file;
    public $preview_data = [];
    public $headers = [];
    public $error_message = '';
    public $success_message = '';
    public $total_rows = 0;
    public $is_loading = false;

    public function updatedCsvFile()
    {
        try {
            $this->is_loading = true;
            $this->error_message = '';
            $this->preview_data = [];
            $this->headers = [];
            $this->total_rows = 0;

            if (!$this->csv_file) {
                return;
            }

            $file_path = $this->csv_file->getRealPath();
            $file = fopen($file_path, 'r');

            if (!$file) {
                $this->error_message = 'Tidak dapat membuka file CSV';
                return;
            }

            // Baca header
            $headers = fgetcsv($file);
            if (!$headers) {
                $this->error_message = 'File CSV kosong atau format tidak valid';
                fclose($file);
                return;
            }

            $this->headers = array_map('trim', $headers);

            // Validasi kolom yang diperlukan (password_hashed opsional)
            $required_columns = ['name', 'email', 'username', 'phone_number', 'bio'];
            $missing_columns = array_diff($required_columns, $this->headers);
            
            if (!empty($missing_columns)) {
                $this->error_message = 'Kolom yang hilang: ' . implode(', ', $missing_columns);
                fclose($file);
                return;
            }
            
            // Peringatan jika password_hashed tidak ada
            if (!in_array('password_hashed', $this->headers)) {
                // password_hashed opsional, akan gunakan default password123
            }

            // Baca data (preview maksimal 10 baris)
            $row_count = 0;
            while (($row = fgetcsv($file)) !== false && $row_count < 10) {
                if (count($row) > 0 && trim(implode('', $row)) !== '') {
                    // Pastikan jumlah kolom sesuai dengan header
                    if (count($row) === count($this->headers)) {
                        $this->preview_data[] = array_combine($this->headers, array_map('trim', $row));
                        $row_count++;
                    }
                }
            }

            // Hitung total baris
            rewind($file);
            fgetcsv($file); // Skip header
            $this->total_rows = 0;
            while (fgetcsv($file) !== false) {
                $this->total_rows++;
            }

            fclose($file);

            if (empty($this->preview_data)) {
                $this->error_message = 'Tidak ada data ditemukan dalam file CSV';
            }
        } catch (\Exception $e) {
            $this->error_message = 'Error: ' . $e->getMessage();
            $this->preview_data = [];
            $this->headers = [];
        } finally {
            $this->is_loading = false;
        }
    }

    public function import()
    {
        try {
            $this->is_loading = true;
            
            if (!$this->csv_file) {
                $this->error_message = 'Pilih file CSV terlebih dahulu';
                return;
            }

            $file_path = $this->csv_file->getRealPath();
            $file = fopen($file_path, 'r');
            $headers = fgetcsv($file);

            if (!$headers) {
                $this->error_message = 'File CSV kosong atau format tidak valid';
                fclose($file);
                return;
            }

            $headers = array_map('trim', $headers);

            $imported = 0;
            $failed = 0;
            
            while (($row = fgetcsv($file)) !== false) {
                if (count($row) > 0 && trim(implode('', $row)) !== '') {
                    // Validasi jumlah kolom
                    if (count($row) !== count($headers)) {
                        $failed++;
                        continue;
                    }

                    $data = array_combine($headers, array_map('trim', $row));

                    // Validasi minimal kolom yang diperlukan
                    if (
                        !isset($data['name']) ||
                        !isset($data['email']) ||
                        !isset($data['username']) ||
                        !isset($data['phone_number']) ||
                        !isset($data['bio'])
                    ) {
                        $failed++;
                        continue;
                    }

                    // Cek apakah email sudah ada
                    if (\App\Models\User::where('email', $data['email'])->exists()) {
                        $failed++;
                        continue;
                    }

                    // Tentukan password
                    if (isset($data['password_hashed']) && !empty(trim($data['password_hashed']))) {
                        // Gunakan password yang sudah di-hash dari kolom password_hashed
                        $password = trim($data['password_hashed']);
                    } else {
                        // Gunakan password default yang di-hash
                        $password = bcrypt('password123');
                    }

                    // Buat user baru
                    \App\Models\User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'username' => $data['username'],
                        'phone_number' => $data['phone_number'],
                        'bio' => $data['bio'],
                        'password' => $password,
                    ]);
                    $imported++;
                }
            }
            fclose($file);

            if ($imported > 0) {
                $this->success_message = "✓ Berhasil mengimport $imported user baru" . ($failed > 0 ? " (Gagal: $failed)" : '');
                $this->dispatch('notify', type: 'success', message: $this->success_message);
                $this->resetForm();
                $this->dispatch('refresh-table');
            } else {
                $this->error_message = 'Tidak ada user yang berhasil diimport. Pastikan email belum terdaftar.';
                $this->dispatch('notify', type: 'error', message: $this->error_message);
            }
        } catch (\Exception $e) {
            $this->error_message = '✗ Error saat import: ' . $e->getMessage();
            $this->dispatch('notify', type: 'error', message: $this->error_message);
        } finally {
            $this->is_loading = false;
        }
    }

    public function downloadSample()
    {
        $headers = ['name', 'email', 'username', 'phone_number', 'bio', 'password_hashed'];
        $sample_data = [
            ['John Doe', 'john.doe@example.com', 'johndoe', '081234567890', 'Software Developer', ''],
            ['Jane Smith', 'jane.smith@example.com', 'janesmith', '081234567891', 'Product Manager', ''],
            ['Ahmad Rahman', 'ahmad.rahman@example.com', 'ahmadrahman', '081234567892', 'UI/UX Designer', ''],
        ];

        $filename = 'sample_user_import_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://memory', 'w');

        // Write headers
        fputcsv($handle, $headers);

        // Write sample data
        foreach ($sample_data as $row) {
            fputcsv($handle, $row);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return response()->streamDownload(
            function () use ($csv) {
                echo $csv;
            },
            $filename,
            [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ],
        );
    }

    public function resetForm()
    {
        $this->csv_file = null;
        $this->preview_data = [];
        $this->headers = [];
        $this->error_message = '';
        $this->success_message = '';
        $this->total_rows = 0;
    }
}; ?>

<div class="dark:bg-gray-900 min-h-screen p-4 md:p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Import Data User</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Upload file CSV untuk mengimport data user secara massal dengan mudah</p>
                </div>
            </div>
        </div>

        <!-- Alert Messages with Animation -->
        @if ($error_message)
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 rounded-r-lg shadow-sm animate-pulse">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-red-800 dark:text-red-300">Error</h3>
                        <p class="text-red-700 dark:text-red-200 text-sm mt-1">{{ $error_message }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($success_message)
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 rounded-r-lg shadow-sm animate-pulse">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-green-800 dark:text-green-300">Berhasil!</h3>
                        <p class="text-green-700 dark:text-green-200 text-sm mt-1">{{ $success_message }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Upload Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 mb-8 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <label for="csv_file" class="block text-lg font-semibold text-gray-900 dark:text-white mb-1">
                        Pilih File CSV
                    </label>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Drag dan drop atau klik untuk memilih file</p>
                </div>
                <button wire:click="downloadSample" type="button"
                    class="flex items-center gap-2 px-6 py-3 text-sm bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-lg hover:shadow-lg hover:scale-105 transition-all duration-200 whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download Contoh CSV
                </button>
            </div>

            <!-- File Input -->
            <div class="mb-4">
                <div class="relative">
                    <input type="file" id="csv_file" wire:model="csv_file" accept=".csv"
                        class="block w-full px-6 py-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 cursor-pointer hover:border-blue-400 transition-colors"
                        @if($csv_file) disabled @endif>
                </div>

                @if($csv_file)
                    <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-xl">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm text-blue-800 dark:text-blue-300 font-medium">{{ $csv_file->getClientOriginalName() }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Format yang didukung: <span class="font-semibold">CSV (Comma Separated Values)</span></p>

            <!-- Required Columns Info -->
            <div class="grid md:grid-cols-2 gap-4">
                <div class="p-4 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl">
                    <div class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-amber-600 dark:text-amber-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="text-xs font-semibold text-amber-900 dark:text-amber-300 uppercase tracking-wide">Kolom Wajib</p>
                            <p class="text-sm text-amber-800 dark:text-amber-200 font-mono mt-1">name • email • username • phone_number • bio</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-xl">
                    <div class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2h8v-2zM2 15a4 4 0 008 0v2H0v-2z" />
                        </svg>
                        <div>
                            <p class="text-xs font-semibold text-purple-900 dark:text-purple-300 uppercase tracking-wide">Password</p>
                            <p class="text-sm text-purple-800 dark:text-purple-200 mt-1">
                                <strong>Default:</strong> password123 (jika kolom password_hashed kosong)
                                <br><strong>Custom:</strong> Isi kolom password_hashed dengan password yang sudah di-hash
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Section -->
        @if (!empty($preview_data))
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Preview Data</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Menampilkan 10 baris pertama dari <span class="font-semibold text-blue-600 dark:text-blue-400">{{ $total_rows }}</span> total baris
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ count($preview_data) }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">baris preview</p>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm">
                    <table class="w-full text-sm">
                        <thead class="bg-gradient-to-r from-gray-100 to-gray-50 dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <tr>
                                <th class="px-4 py-4 text-left font-bold text-gray-900 dark:text-white w-12">#</th>
                                @foreach ($headers as $header)
                                    <th class="px-4 py-4 text-left font-bold text-gray-900 dark:text-white">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-block w-2 h-2 rounded-full bg-blue-500"></span>
                                            {{ ucfirst(str_replace('_', ' ', $header)) }}
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preview_data as $index => $row)
                                <tr class="{{ $loop->odd ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-900' }} border-b border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors">
                                    <td class="px-4 py-4 font-bold text-gray-600 dark:text-gray-400 text-center">{{ $index + 1 }}</td>
                                    @foreach ($headers as $header)
                                        <td class="px-4 py-4 text-gray-700 dark:text-gray-200">
                                            <span class="inline-block px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-lg text-xs">
                                                {{ substr($row[$header] ?? '-', 0, 50) }}{{ strlen($row[$header] ?? '') > 50 ? '...' : '' }}
                                            </span>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mt-8">
                    <button wire:click="import" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed"
                        class="flex-1 flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                        @if($is_loading)
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Mengimport...</span>
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Confirm Import</span>
                        @endif
                    </button>
                    <button wire:click="resetForm"
                        class="px-8 py-4 bg-gray-600 dark:bg-gray-700 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200">
                        Reset
                    </button>
                </div>
            </div>
        @elseif ($csv_file && empty($preview_data) && !$error_message)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-12 border border-gray-100 dark:border-gray-700">
                <div class="flex flex-col items-center justify-center">
                    <div class="relative w-16 h-16 mb-4">
                        <svg class="animate-spin h-16 w-16 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold text-gray-600 dark:text-gray-300">Memproses file...</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Mohon tunggu sebentar</p>
                </div>
            </div>
        @else
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-12 border-2 border-dashed border-gray-300 dark:border-gray-600">
                <div class="flex flex-col items-center justify-center text-center">
                    <svg class="w-20 h-20 text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                    <p class="text-lg font-semibold text-gray-600 dark:text-gray-300">Pilih file CSV untuk memulai</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Atau klik tombol "Download Contoh CSV" untuk melihat format yang benar</p>
                </div>
            </div>
        @endif
    </div>
</div>

@script
<script>
    document.addEventListener('livewire:navigating', () => {
        // Optional: Add navigation handling
    });
</script>
@endscript
