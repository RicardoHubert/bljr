<?php

use App\skpi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkpiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("id_ID");

        for ($i = 0; $i < 3000; $i++) {
            $no_urut = skpi::where("nomor_urut", "<>", 0)->max("nomor_urut");
            $no_terakhir = ($no_urut == null ? 999 : $no_urut) + 1;
            DB::table("skpi")->insert([
                "nomor_urut" => str_repeat(0, 4 - strlen($no_terakhir)) . $no_terakhir,
                "user_id" => "4",
                "jenis_dokumen" => "seminar",
                "ormawa_id" => "1",
                "tanggal_dokumen" => "2020-10-01",
                "tahun" => 2020,
                "judul_sertifikat" => $faker->realText(50, 2),
                "status" => $faker->numberBetween(0,1),
                "file_skpi" => "sertifikat/1000_CSD-STF_XII_2020.jpg",
                "created_at" => "2020-10-06 14:07:53",
                "updated_at" => "2020-11-09 16:55:17",
                "penyelenggara" => $faker->company(),
                "approvedby" => 6
            ]);
        }
    }
}
