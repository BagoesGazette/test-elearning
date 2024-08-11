<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create([
            'category_id'   => 1,
            'title'         => 'Issued Certificate',
            'description'   => 'Berikan kemudahan dalam mengatur dan mendistribusikan sertifikat kepada setiap karyawan.'
        ]);

        SubCategory::create([
            'category_id'   => 1,
            'title'         => 'On boarding',
            'description'   => 'Memastikan setiap karyawan siap memberikan kontribusi maksimal sejak hari pertama mereka bergabung.'
        ]);
    }
}
