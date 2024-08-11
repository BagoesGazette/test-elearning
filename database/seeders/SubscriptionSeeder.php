<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packagePrice = 69000;
        $adminFees = $packagePrice * 0.20;
        $netAmount = $packagePrice - $adminFees;
        $mentorShare = $netAmount / 2;

        Subscription::create([
            'user_id'    => 2,
            'amount'     => $packagePrice,
            'net_amount' => $mentorShare,
            'type'       => 1,
            'status'     => 1
        ]);
    }
}
