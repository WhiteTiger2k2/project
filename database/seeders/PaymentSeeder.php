<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            ['Thanh toán online qua cổng OnePay bằng thẻ ATM nội địa'],
            ['Thanh toán khi giao hàng (COD)'],
            ['Chuyển khoản qua ngân hàng'],
            ['Thanh toán online qua cổng OnePay bằng thẻ Visa/Master/JCB']
        ];

        foreach($paymentMethods as $paymentMethod) {
            Payment::create([
                'name' => $paymentMethod[0]
            ]);
        }
    }
}
