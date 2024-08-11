<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'          => 'LMS',
            'title'         => 'Optimalkan potensi karyawan Anda dengan Learning Management System (LMS)',
            'description'   => 'Berdasarkan tim Anda untuk mencapai kesuksesan dengan data yang akurat dan solusi pembelajaran yang terintegrasi. Transformasikan pengelolaan sumber daya manusia Anda dan hadirkan produktivitas yang unggul dengan LMS kami!.'
        ]);

        Category::create([
            'name'          => 'Featured',
            'title'         => 'Jelajahi Fitur Unggulan Kami',
            'description'   => 'Optimalkan potensi bisnis Anda dengan fitur-fitur canggih yang dirancang untuk meningkatkan kinerja tim Anda. Dari antarmuka yang intuitif hingga alat analitik yang kuat, setiap fitur dibuat untuk mempermudah alur kerja dan mendorong kesuksesan. Temukan bagaimana kemampuan unik platform kami dapat mentransformasi operasi Anda dan memberdayakan tim Anda untuk mencapai lebih banyak.'
        ]);

        Category::create([
            'name'          => 'Video Elearning + Webinar Lainnya',
            'title'         => 'Strategi Efektif Meningkatkan Keterampilan Tim Melalui Pembelajaran Online',
            'description'   => 'Pelajari bagaimana mengembangkan keterampilan tim Anda dengan pendekatan pembelajaran online yang interaktif dan efektif. Webinar ini mencakup strategi pengajaran terbaik, alat bantu digital, dan metode evaluasi untuk memastikan peningkatan kompetensi karyawan.'
        ]);

        Category::create([
            'name'          => 'Inquiry Elearning',
            'title'         => 'Permintaan Informasi tentang Solusi Pembelajaran E-Learning yang Disesuaikan',
            'description'   => 'Apakah Anda memiliki kebutuhan khusus untuk program e-learning di organisasi Anda? Hubungi kami untuk mendiskusikan solusi e-learning yang dapat disesuaikan dengan kebutuhan dan tujuan pembelajaran Anda. Tim kami siap membantu memberikan informasi lengkap dan rekomendasi terbaik untuk Anda.'
        ]);
    }
}
