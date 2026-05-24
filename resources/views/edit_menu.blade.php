<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - MBG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f4f7f6; }</style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden border border-slate-100">
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-100">
            <h2 class="text-xl font-bold text-slate-800">Edit Master Menu</h2>
            <p class="text-sm text-slate-500">Perbarui standar gizi menu</p>
        </div>
        <form action="{{ route('menu.update', $menu->id) }}" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Paket Menu</label>
                <input type="text" name="menu_package" value="{{ $menu->menu_package }}" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Kalori (Kkal)</label>
                    <input type="number" name="calories" value="{{ $menu->calories }}" required min="1" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Protein (g)</label>
                    <input type="number" step="0.1" name="protein" value="{{ $menu->protein }}" required min="0" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Indeks / Status Gizi</label>
                <input type="text" name="status_gizi" value="{{ $menu->status_gizi }}" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div class="pt-4 flex gap-3">
                <a href="{{ route('mbg.index') }}" class="w-full text-center px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-lg transition-all">Batal</a>
                <button type="submit" class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
