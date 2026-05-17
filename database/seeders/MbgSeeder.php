<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\MbgMenu;
use App\Models\MbgDistribution;
use Carbon\Carbon;

class MbgSeeder extends Seeder
{
    public function run(): void
    {
        $districts = ['Baiturrahman', 'Kuta Alam', 'Meuraxa', 'Syiah Kuala', 'Lueng Bata', 'Ulee Kareng', 'Banda Raya', 'Jaya Baru', 'Kuta Raja'];
        
        // 20 dummy sekolah
        for ($i = 1; $i <= 20; $i++) {
            School::create([
                'school_name' => 'SD Negeri ' . $i . ' Banda Aceh',
                'total_students' => rand(150, 400),
                'district' => $districts[array_rand($districts)],
            ]);
        }

        // 20 dummy paket menu
        for ($i = 1; $i <= 20; $i++) {
            MbgMenu::create([
                'menu_package' => 'Paket Sehat ' . $i,
                'calories' => rand(400, 700),
                'protein' => rand(15, 30) + (rand(0, 9) / 10),
                'status_gizi' => 'Sangat Baik',
            ]);
        }

        // 20 dummy riwayat distribusi
        for ($i = 1; $i <= 20; $i++) {
            $school = School::inRandomOrder()->first();
            $menu = MbgMenu::inRandomOrder()->first();
            $daysAgo = rand(1, 20);
            MbgDistribution::create([
                'school_id' => $school->id,
                'mbg_menu_id' => $menu->id,
                'delivery_date' => Carbon::now()->subDays($daysAgo)->toDateString(),
                'total_boxes_sent' => $school->total_students,
                'delivery_status' => ['Selesai', 'Dikirim', 'Diproses'][rand(0, 2)],
            ]);
        }
    }
}
