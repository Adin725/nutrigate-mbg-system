<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\MbgMenu;
use App\Models\MbgDistribution;
use Illuminate\Http\Request;

class MbgDistributionController extends Controller
{
    public function index()
    {
        $schools = School::all();
        $menus = MbgMenu::all();
        $distributions = MbgDistribution::with(['school', 'menu'])
            ->orderBy('delivery_date', 'desc')
            ->get();

        $totalBoxes = $distributions->sum('total_boxes_sent');
        $totalProtein = $distributions->reduce(function ($carry, $item) {
            return $carry + ($item->total_boxes_sent * $item->menu->protein);
        }, 0);
        $totalKecamatan = School::select('district')->distinct()->count();

        return view('mbg_dashboard', compact('schools', 'menus', 'distributions', 'totalBoxes', 'totalProtein', 'totalKecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'mbg_menu_id' => 'required|exists:mbg_menus,id',
            'delivery_date' => 'required|date',
        ]);

        $school = School::findOrFail($request->school_id);

        MbgDistribution::create([
            'school_id' => $school->id,
            'mbg_menu_id' => $request->mbg_menu_id,
            'delivery_date' => $request->delivery_date,
            'total_boxes_sent' => $school->total_students,
            'delivery_status' => 'Diproses',
        ]);

        return redirect()->route('mbg.index')->with('success', 'Distribusi berhasil dijadwalkan.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'delivery_status' => 'required|in:Diproses,Dikirim,Selesai',
        ]);

        $distribution = MbgDistribution::findOrFail($id);
        $distribution->update([
            'delivery_status' => $request->delivery_status
        ]);

        return redirect()->route('mbg.index')->with('success', 'Status distribusi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        MbgDistribution::findOrFail($id)->delete();
        return redirect()->route('mbg.index')->with('success', 'Riwayat distribusi berhasil dihapus.');
    }

    public function storeSchool(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'total_students' => 'required|integer|min:1',
            'district' => 'required|string|max:255',
        ]);

        School::create($request->only(['school_name', 'total_students', 'district']));
        return redirect()->route('mbg.index')->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    public function destroySchool($id)
    {
        School::findOrFail($id)->delete();
        return redirect()->route('mbg.index')->with('success', 'Data sekolah berhasil dihapus.');
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
            'menu_package' => 'required|string|max:255',
            'calories' => 'required|integer|min:1',
            'protein' => 'required|numeric|min:0',
            'status_gizi' => 'required|string|max:255',
        ]);

        MbgMenu::create($request->only(['menu_package', 'calories', 'protein', 'status_gizi']));
        return redirect()->route('mbg.index')->with('success', 'Paket menu berhasil ditambahkan.');
    }

    public function destroyMenu($id)
    {
        MbgMenu::findOrFail($id)->delete();
        return redirect()->route('mbg.index')->with('success', 'Paket menu berhasil dihapus.');
    }
}
