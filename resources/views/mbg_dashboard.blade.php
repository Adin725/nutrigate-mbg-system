<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Logistik Makan Bergizi Gratis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7f6;
            color: #0f172a;
        }

        [x-cloak] {
            display: none !important;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            border-radius: 1rem;
        }

        .premium-input {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .premium-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            background: #ffffff;
        }

        .btn-primary {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2), 0 2px 4px -2px rgba(37, 99, 235, 0.2);
            transition: all 0.2s ease;
            font-weight: 600;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 8px -1px rgba(37, 99, 235, 0.3), 0 4px 6px -2px rgba(37, 99, 235, 0.2);
        }

        .btn-danger {
            background: #fee2e2;
            color: #dc2626;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .status-diproses {
            background: #fef9c3;
            color: #854d0e;
        }

        .status-dikirim {
            background: #e0f2fe;
            color: #075985;
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .pulse-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .pulse-diproses {
            background-color: #eab308;
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .pulse-dikirim {
            background-color: #0ea5e9;
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .pulse-selesai {
            background-color: #22c55e;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .4;
            }
        }

        .bg-gradient-sidebar {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }
    </style>
</head>

<body class="antialiased h-screen flex flex-col md:flex-row overflow-hidden"
    x-data="{ currentTab: 'dashboard', showDistModal: false, showSchoolModal: false, showMenuModal: false }">
    <aside
        class="w-full md:w-64 bg-gradient-sidebar border-r border-slate-200 flex flex-col h-auto md:h-full flex-shrink-0 relative z-20 shadow-[4px_0_24px_rgba(0,0,0,0.02)]">
        <div class="h-20 flex items-center px-6 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div
                    class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center text-white shadow-md shadow-blue-600/20">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900">NutriGate</span>
            </div>
        </div>
        <div class="p-4 flex-1 overflow-y-auto">
            <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
            <nav class="space-y-1">
                <button @click="currentTab = 'dashboard'"
                    :class="currentTab === 'dashboard' ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'"
                    class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"
                        :class="currentTab === 'dashboard' ? 'text-blue-600' : 'text-slate-400'"></i> Dashboard
                </button>
                <button @click="currentTab = 'sekolah'"
                    :class="currentTab === 'sekolah' ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'"
                    class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all">
                    <i data-lucide="school" class="w-5 h-5"
                        :class="currentTab === 'sekolah' ? 'text-blue-600' : 'text-slate-400'"></i> Data Sekolah
                </button>
                <button @click="currentTab = 'menu'"
                    :class="currentTab === 'menu' ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'"
                    class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all">
                    <i data-lucide="beef" class="w-5 h-5"
                        :class="currentTab === 'menu' ? 'text-blue-600' : 'text-slate-400'"></i> Menu
                </button>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-200 bg-white">
            <div class="flex items-center gap-3 px-2">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Admin+Pusat&background=eff6ff&color=1d4ed8&bold=true"
                        class="w-10 h-10 rounded-full border border-slate-200" alt="Admin">
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full">
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-slate-900">Rijaluddin Abdul Ghani</span>
                    <span class="text-xs text-slate-500">CEO MBG</span>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header
            class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 px-6 md:px-10 flex items-center justify-between z-10 sticky top-0">
            <div>
                <h2 class="text-lg font-bold text-slate-800"
                    x-text="currentTab === 'dashboard' ? 'Overview Logistik' : (currentTab === 'sekolah' ? 'Manajemen Sekolah' : 'Master Data Menu')">
                </h2>
                <p class="text-xs text-slate-500 font-medium">Sistem Informasi Makan Bergizi Gratis</p>
            </div>
            <div class="flex items-center gap-4">
                <button
                    class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-full transition-colors relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span
                        class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
            </div>
        </header>

        <div class="absolute top-24 right-6 z-50 w-80 space-y-3">
            @if(session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                    x-transition.duration.300ms
                    class="glass-panel p-4 border-l-4 border-l-green-500 flex items-start gap-3 shadow-lg">
                    <div class="bg-green-100 p-1.5 rounded-full text-green-600 mt-0.5">
                        <i data-lucide="check" class="w-4 h-4"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-sm text-slate-900">Berhasil</h3>
                        <p class="text-xs text-slate-600 mt-0.5">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-slate-400 hover:text-slate-600"><i data-lucide="x"
                            class="w-4 h-4"></i></button>
                </div>
            @endif
            @if($errors->any())
                <div x-data="{ show: true }" x-show="show" x-transition
                    class="glass-panel p-4 border-l-4 border-l-red-500 flex items-start gap-3 shadow-lg">
                    <div class="bg-red-100 p-1.5 rounded-full text-red-600 mt-0.5">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-sm text-slate-900">Validasi Gagal</h3>
                        <ul class="text-xs text-slate-600 mt-1 list-disc ml-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button @click="show = false" class="text-slate-400 hover:text-slate-600"><i data-lucide="x"
                            class="w-4 h-4"></i></button>
                </div>
            @endif
        </div>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 relative">

            <!--DASHBOARD DISTRIBUSI-->
            <div x-show="currentTab === 'dashboard'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="max-w-[1400px] mx-auto space-y-6">

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <p class="text-sm text-slate-500">Ringkasan operasional logistik gizi nasional hari ini.</p>
                    <button @click="showDistModal = true"
                        class="btn-primary px-5 py-2.5 text-sm flex items-center justify-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i> Buat Jadwal Baru
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50"></div>
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                <i data-lucide="package" class="w-5 h-5"></i>
                            </div>
                            <p class="text-sm font-semibold text-slate-500">Total Box Disalurkan</p>
                        </div>
                        <h3 class="text-3xl font-bold text-slate-900">{{ number_format($totalBoxes, 0, ',', '.') }}</h3>
                    </div>

                    <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-50 rounded-full opacity-50"></div>
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                <i data-lucide="leaf" class="w-5 h-5"></i>
                            </div>
                            <p class="text-sm font-semibold text-slate-500">Total Protein (Target)</p>
                        </div>
                        <h3 class="text-3xl font-bold text-slate-900">{{ number_format($totalProtein, 1, ',', '.') }}
                            <span class="text-base text-slate-500 font-medium">g</span>
                        </h3>
                    </div>

                    <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50 rounded-full opacity-50"></div>
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                <i data-lucide="map" class="w-5 h-5"></i>
                            </div>
                            <p class="text-sm font-semibold text-slate-500">Cakupan Wilayah</p>
                        </div>
                        <h3 class="text-3xl font-bold text-slate-900">{{ $totalKecamatan }} <span
                                class="text-base text-slate-500 font-medium">Kecamatan</span></h3>
                    </div>

                    <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-50 rounded-full opacity-50"></div>
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                            </div>
                            <p class="text-sm font-semibold text-slate-500">Sedang Diproses</p>
                        </div>
                        <h3 class="text-3xl font-bold text-slate-900">
                            {{ $distributions->where('delivery_status', 'Diproses')->count() }} <span
                                class="text-base text-slate-500 font-medium">Jadwal</span>
                        </h3>
                    </div>
                </div>

                <!-- Table & Chart Area -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- Table Logistik -->
                    <div class="glass-panel overflow-hidden flex flex-col bg-white lg:col-span-2">
                        <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row items-start md:items-center justify-between bg-white gap-4">
                            <h2 class="text-base font-bold text-slate-800">Tracking Logistik Berjalan</h2>
                            
                            <!-- FORM PENCARIAN (where & find) -->
                            <form action="{{ route('mbg.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                                <input type="text" name="school" placeholder="Cari nama sekolah..." value="{{ request('school') }}" class="premium-input px-3 py-1.5 text-sm w-full sm:w-48" autocomplete="off">
                                <input type="number" name="dist_id" placeholder="Cari ID Dist..." value="{{ request('dist_id') }}" class="premium-input px-3 py-1.5 text-sm w-full sm:w-32" autocomplete="off" title="Pencarian spesifik menggunakan find()">
                                <button type="submit" class="btn-primary px-4 py-1.5 text-sm whitespace-nowrap"><i data-lucide="search" class="w-4 h-4 inline-block mr-1"></i> Cari</button>
                                @if(request('school') || request('dist_id'))
                                    <a href="{{ route('mbg.index') }}" class="btn-danger px-4 py-1.5 text-sm rounded-lg flex items-center justify-center whitespace-nowrap" title="Reset">Reset</a>
                                @endif
                            </form>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left whitespace-nowrap">
                                <thead
                                    class="bg-slate-50 border-b border-slate-100 text-slate-500 text-xs font-semibold uppercase tracking-wider">
                                    <tr>
                                        <th class="px-6 py-4">Timeline</th>
                                        <th class="px-6 py-4">Tujuan Sekolah</th>
                                        <th class="px-6 py-4">Menu & Gizi</th>
                                        <th class="px-6 py-4 text-center">Volume (Box)</th>
                                        <th class="px-6 py-4">Status Logistik</th>
                                        <th class="px-6 py-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 bg-white">
                                    @forelse($distributions as $dist)
                                        <tr class="hover:bg-slate-50 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-semibold text-slate-900">
                                                    {{ \Carbon\Carbon::parse($dist->delivery_date)->format('d M Y') }}
                                                </div>
                                                <div class="text-xs text-slate-500">Target Hari Ini</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-bold text-slate-900">
                                                    {{ $dist->school->school_name }}
                                                </div>
                                                <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1">
                                                    <i data-lucide="map-pin" class="w-3 h-3"></i> Kec.
                                                    {{ $dist->school->district }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-semibold text-slate-800">
                                                    {{ $dist->menu->menu_package }}
                                                </div>
                                                <div class="flex items-center gap-2 mt-1.5">
                                                    <span
                                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                                        <i data-lucide="flame" class="w-3 h-3"></i>
                                                        {{ $dist->menu->calories }} Kkal
                                                    </span>
                                                    <span
                                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                        <i data-lucide="beef" class="w-3 h-3"></i>
                                                        {{ $dist->menu->protein }}g Pro
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span
                                                    class="text-base font-bold text-slate-900">{{ $dist->total_boxes_sent }}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div x-data="{ open: false }" class="relative inline-block w-full">
                                                    @php
                                                        $statusClass = match ($dist->delivery_status) {
                                                            'Selesai' => 'status-selesai',
                                                            'Dikirim' => 'status-dikirim',
                                                            default => 'status-diproses'
                                                        };
                                                        $pulseClass = match ($dist->delivery_status) {
                                                            'Selesai' => 'pulse-selesai',
                                                            'Dikirim' => 'pulse-dikirim',
                                                            default => 'pulse-diproses'
                                                        };
                                                    @endphp
                                                    <button @click="open = !open" @click.outside="open = false"
                                                        class="status-badge {{ $statusClass }} w-full justify-between hover:opacity-80 transition-opacity">
                                                        <span class="flex items-center gap-1.5"><span
                                                                class="pulse-dot {{ $pulseClass }}"></span>
                                                            {{ $dist->delivery_status }}</span>
                                                        <i data-lucide="chevron-down" class="w-3 h-3"></i>
                                                    </button>

                                                    <div x-show="open" x-transition.opacity.duration.200ms x-cloak
                                                        class="absolute left-0 mt-2 w-full min-w-[130px] bg-white border border-slate-100 shadow-xl rounded-lg py-1 z-20">
                                                        <form action="{{ route('mbg.updateStatus', $dist->id) }}"
                                                            method="POST" class="flex flex-col">
                                                            @csrf @method('PATCH')
                                                            <button type="submit" name="delivery_status" value="Diproses"
                                                                class="px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 text-left w-full flex items-center gap-2">
                                                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                                                Diproses
                                                            </button>
                                                            <button type="submit" name="delivery_status" value="Dikirim"
                                                                class="px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 text-left w-full flex items-center gap-2">
                                                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                                Dikirim
                                                            </button>
                                                            <button type="submit" name="delivery_status" value="Selesai"
                                                                class="px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 text-left w-full flex items-center gap-2">
                                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                                Selesai
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="{{ route('mbg.edit', $dist->id) }}" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit Jadwal">
                                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                                    </a>
                                                    <form action="{{ route('mbg.destroy', $dist->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin membatalkan dan menghapus jadwal ini?');">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn-danger p-2 rounded-lg"
                                                            title="Hapus Jadwal">
                                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center justify-center text-slate-400">
                                                    <i data-lucide="inbox" class="w-10 h-10 mb-3 opacity-50"></i>
                                                    <p class="text-sm font-medium">Belum ada data jadwal distribusi aktif.
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="glass-panel p-5 lg:col-span-1 flex flex-col">
                        <h2 class="text-base font-bold text-slate-800 mb-4">Statistik Logistik</h2>
                        <div class="flex-1 min-h-[250px] relative w-full flex items-center justify-center">
                            <canvas id="logisticsChart"></canvas>
                        </div>
                        <div class="mt-6 space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-500 flex items-center gap-2"><span
                                        class="w-2 h-2 rounded-full bg-yellow-400"></span> Diproses</span>
                                <span
                                    class="font-bold text-slate-900">{{ $distributions->where('delivery_status', 'Diproses')->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-500 flex items-center gap-2"><span
                                        class="w-2 h-2 rounded-full bg-blue-400"></span> Dalam Pengiriman</span>
                                <span
                                    class="font-bold text-slate-900">{{ $distributions->where('delivery_status', 'Dikirim')->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-500 flex items-center gap-2"><span
                                        class="w-2 h-2 rounded-full bg-green-400"></span> Tiba & Selesai</span>
                                <span
                                    class="font-bold text-slate-900">{{ $distributions->where('delivery_status', 'Selesai')->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA SEKOLAH -->
            <div x-show="currentTab === 'sekolah'" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="max-w-[1200px] mx-auto space-y-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">Data Institusi Sekolah</h1>
                        <p class="text-sm text-slate-500">Kelola master data penerima manfaat program.</p>
                    </div>
                    <button @click="showSchoolModal = true"
                        class="btn-primary px-5 py-2.5 text-sm flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i> Registrasi Sekolah
                    </button>
                </div>
                <div class="glass-panel bg-white overflow-hidden">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead
                            class="bg-slate-50 border-b border-slate-100 text-slate-500 text-xs font-semibold uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Nama Sekolah</th>
                                <th class="px-6 py-4">Kecamatan Wilayah</th>
                                <th class="px-6 py-4 text-center">Jumlah Siswa (Kapasitas Box)</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @foreach($schools as $school)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-slate-900 text-sm">{{ $school->school_name }}</div>
                                        <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1">ID:
                                            SCH-{{ str_pad($school->id, 4, '0', STR_PAD_LEFT) }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-xs font-medium">
                                            <i data-lucide="map" class="w-3 h-3"></i> {{ $school->district }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-lg font-bold text-slate-900">{{ $school->total_students }} <span
                                                class="text-xs font-medium text-slate-500 uppercase">Siswa</span></span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('school.edit', $school->id) }}" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit Data">
                                                <i data-lucide="edit" class="w-4 h-4"></i>
                                            </a>
                                            <form action="{{ route('school.destroy', $school->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus data sekolah ini secara permanen?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-danger p-2 rounded-lg" title="Hapus">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- MENU -->
            <div x-show="currentTab === 'menu'" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="max-w-[1200px] mx-auto space-y-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">Master Data Menu Gizi</h1>
                        <p class="text-sm text-slate-500">Kelola standar nutrisi harian yang disertifikasi Kemenkes.</p>
                    </div>
                    <button @click="showMenuModal = true"
                        class="btn-primary px-5 py-2.5 text-sm flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i> Tambah Menu Baru
                    </button>
                </div>
                <div class="glass-panel bg-white overflow-hidden">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead
                            class="bg-slate-50 border-b border-slate-100 text-slate-500 text-xs font-semibold uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Paket Menu Tersertifikasi</th>
                                <th class="px-6 py-4">Total Kalori</th>
                                <th class="px-6 py-4">Total Protein</th>
                                <th class="px-6 py-4">Indeks Gizi</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @foreach($menus as $menu)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-slate-900 text-sm">{{ $menu->menu_package }}</div>
                                        <div class="text-xs text-slate-500 mt-0.5">Sertifikasi Halal & Standar Nutrisi</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-1.5 bg-slate-200 rounded-full overflow-hidden">
                                                <div class="h-full bg-amber-500 rounded-full"
                                                    style="width: {{ min(($menu->calories / 1000) * 100, 100) }}%"></div>
                                            </div>
                                            <span class="font-bold text-amber-600 text-sm">{{ $menu->calories }} Kkal</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-1.5 bg-slate-200 rounded-full overflow-hidden">
                                                <div class="h-full bg-emerald-500 rounded-full"
                                                    style="width: {{ min(($menu->protein / 50) * 100, 100) }}%"></div>
                                            </div>
                                            <span class="font-bold text-emerald-600 text-sm">{{ $menu->protein }} g</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                            {{ $menu->status_gizi }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit Menu">
                                                <i data-lucide="edit" class="w-4 h-4"></i>
                                            </a>
                                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus master menu ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-danger p-2 rounded-lg">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div x-show="showDistModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6">
            <div x-show="showDistModal" x-transition.opacity.duration.300ms
                class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="showDistModal = false"></div>
            <div x-show="showDistModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative glass-panel w-full max-w-md bg-white shadow-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div>
                        <h3 class="font-bold text-slate-900">Jadwalkan Distribusi</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Buat pengiriman logistik baru</p>
                    </div>
                    <button @click="showDistModal = false"
                        class="text-slate-400 hover:text-slate-600 hover:bg-slate-200 p-1.5 rounded-lg transition-colors"><i
                            data-lucide="x" class="w-5 h-5"></i></button>
                </div>
                <form action="{{ route('mbg.store') }}" method="POST" class="p-6 space-y-5">
                    @csrf
                    <div>
                        <label class="block font-semibold text-sm text-slate-700 mb-1.5">Sekolah Tujuan</label>
                        <select name="school_id" required
                            class="w-full px-4 py-2.5 premium-input text-sm text-slate-800">
                            <option value="" disabled selected>-- Pilih Institusi --</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->school_name }} ({{ $school->total_students }}
                                    Siswa)</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-sm text-slate-700 mb-1.5">Paket Menu Gizi</label>
                        <select name="mbg_menu_id" required
                            class="w-full px-4 py-2.5 premium-input text-sm text-slate-800">
                            <option value="" disabled selected>-- Pilih Standar Menu --</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->menu_package }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-sm text-slate-700 mb-1.5">Tanggal Distribusi</label>
                        <input type="date" name="delivery_date" required
                            class="w-full px-4 py-2.5 premium-input text-sm text-slate-800" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="pt-2 flex gap-3">
                        <button type="button" @click="showDistModal = false"
                            class="px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg w-full transition-colors">Batal</button>
                        <button type="submit"
                            class="btn-primary px-5 py-2.5 text-sm font-semibold w-full flex items-center justify-center gap-2"><i
                                data-lucide="send" class="w-4 h-4"></i> Proses Jadwal</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Sekolah -->
        <div x-show="showSchoolModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div x-show="showSchoolModal" x-transition.opacity.duration.300ms
                class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="showSchoolModal = false"></div>
            <div x-show="showSchoolModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                class="relative glass-panel w-full max-w-md bg-white shadow-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div>
                        <h3 class="font-bold text-slate-900">Registrasi Sekolah</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Tambah data penerima manfaat</p>
                    </div>
                    <button @click="showSchoolModal = false"
                        class="text-slate-400 hover:text-slate-600 hover:bg-slate-200 p-1.5 rounded-lg transition-colors"><i
                            data-lucide="x" class="w-5 h-5"></i></button>
                </div>
                <form action="{{ route('school.store') }}" method="POST" class="p-6 space-y-5">
                    @csrf
                    <div>
                        <label class="block font-semibold text-sm text-slate-700 mb-1.5">Nama Institusi</label>
                        <input type="text" name="school_name" required class="w-full px-4 py-2.5 premium-input text-sm"
                            placeholder="Contoh: SD Negeri 1 Nusantara">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold text-sm text-slate-700 mb-1.5">Kapasitas Siswa</label>
                            <input type="number" name="total_students" required min="1"
                                class="w-full px-4 py-2.5 premium-input text-sm" placeholder="150">
                        </div>
                        <div>
                            <label class="block font-semibold text-sm text-slate-700 mb-1.5">Kecamatan</label>
                            <input type="text" name="district" required class="w-full px-4 py-2.5 premium-input text-sm"
                                placeholder="Kebayoran">
                        </div>
                    </div>
                    <div class="pt-2 flex gap-3">
                        <button type="button" @click="showSchoolModal = false"
                            class="px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg w-full transition-colors">Batal</button>
                        <button type="submit" class="btn-primary px-5 py-2.5 text-sm font-semibold w-full">Simpan
                            Data</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Menu -->
        <div x-show="showMenuModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div x-show="showMenuModal" x-transition.opacity.duration.300ms
                class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="showMenuModal = false"></div>
            <div x-show="showMenuModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                class="relative glass-panel w-full max-w-md bg-white shadow-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div>
                        <h3 class="font-bold text-slate-900">Menu Baru</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Input standar gizi tersertifikasi</p>
                    </div>
                    <button @click="showMenuModal = false"
                        class="text-slate-400 hover:text-slate-600 hover:bg-slate-200 p-1.5 rounded-lg transition-colors"><i
                            data-lucide="x" class="w-5 h-5"></i></button>
                </div>
                <form action="{{ route('menu.store') }}" method="POST" class="p-6 space-y-5">
                    @csrf
                    <div>
                        <label class="block font-semibold text-sm text-slate-700 mb-1.5">Nama Paket Menu</label>
                        <input type="text" name="menu_package" required class="w-full px-4 py-2.5 premium-input text-sm"
                            placeholder="Paket Daging Sayur Bening">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold text-sm text-slate-700 mb-1.5">Kalori (Kkal)</label>
                            <input type="number" name="calories" required min="1"
                                class="w-full px-4 py-2.5 premium-input text-sm" placeholder="500">
                        </div>
                        <div>
                            <label class="block font-semibold text-sm text-slate-700 mb-1.5">Protein (g)</label>
                            <input type="number" step="0.1" name="protein" required min="0"
                                class="w-full px-4 py-2.5 premium-input text-sm" placeholder="25.5">
                        </div>
                    </div>
                    <div>
                        <label class="block font-semibold text-sm text-slate-700 mb-1.5">Indeks / Status Gizi</label>
                        <input type="text" name="status_gizi" required class="w-full px-4 py-2.5 premium-input text-sm"
                            placeholder="Sangat Baik" value="Sangat Baik">
                    </div>
                    <div class="pt-2 flex gap-3">
                        <button type="button" @click="showMenuModal = false"
                            class="px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg w-full transition-colors">Batal</button>
                        <button type="submit" class="btn-primary px-5 py-2.5 text-sm font-semibold w-full">Simpan
                            Standar</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script>
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('logisticsChart');
            if (ctx) {
                const diproses = {{ $distributions->where('delivery_status', 'Diproses')->count() }};
                const dikirim = {{ $distributions->where('delivery_status', 'Dikirim')->count() }};
                const selesai = {{ $distributions->where('delivery_status', 'Selesai')->count() }};

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Diproses', 'Dikirim', 'Selesai'],
                        datasets: [{
                            data: [diproses, dikirim, selesai],
                            backgroundColor: [
                                '#facc15',
                                '#60a5fa',
                                '#4ade80'
                            ],
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '75%',
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed !== null) {
                                            label += context.parsed + ' Jadwal';
                                        }
                                        return label;
                                    }
                                },
                                backgroundColor: 'rgba(15, 23, 42, 0.9)',
                                titleFont: { family: "'Plus Jakarta Sans', sans-serif", size: 13 },
                                bodyFont: { family: "'Plus Jakarta Sans', sans-serif", size: 12 },
                                padding: 12,
                                cornerRadius: 8,
                                displayColors: true
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>