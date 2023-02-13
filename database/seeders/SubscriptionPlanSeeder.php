<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlansModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionPlansModel::create([
            'name' => 'Free',
            'price' => 0,
            'currency' => 'bdt',
            'interval' => 'month',
        ]);
        SubscriptionPlansModel::create([
            'name' => 'Premium',
            'price' => 250,
            'currency' => 'bdt',
            'interval' => 'month',
        ]);
    }
}
