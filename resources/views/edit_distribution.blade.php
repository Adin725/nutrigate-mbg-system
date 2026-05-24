<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Distribusi - MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f4f7f6; }</style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden border border-slate-100">
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-100">
            <h2 class="text-xl font-bold text-slate-800">Edit Jadwal Distribusi</h2>
            <p class="text-sm text-slate-500">Perbarui rincian logistik</p>
        </div>
        <form action="{{ route('mbg.update', $distribution->id) }}" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Sekolah Tujuan</label>
                <select name="school_id" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ $distribution->school_id == $school->id ? 'selected' : '' }}>
                            {{ $school->school_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Paket Menu Gizi</label>
                <select name="mbg_menu_id" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $distribution->mbg_menu_id == $menu->id ? 'selected' : '' }}>
                            {{ $menu->menu_package }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Distribusi</label>
                <input type="date" name="delivery_date" value="{{ $distribution->delivery_date }}" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Status Pengiriman</label>
                <select name="delivery_status" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    <option value="Diproses" {{ $distribution->delivery_status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Dikirim" {{ $distribution->delivery_status == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="Selesai" {{ $distribution->delivery_status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="pt-4 flex gap-3">
                <a href="{{ route('mbg.index') }}" class="w-full text-center px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-lg transition-all">Batal</a>
                <button type="submit" class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
