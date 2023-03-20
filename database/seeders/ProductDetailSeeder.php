<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productDetails = [
            [1, 'Trắng', 'L'],
            [2, 'Xanh', 'L'],
            [3, 'Xanh', 'L'],
            [4, 'Đen', 'L'],
            [5, 'Xanh', 'L'],
            [6, 'Xanh', 'L'],
            [7, 'Xanh', 'L'],
            [8, 'Xanh', 'L'],
            [9, 'Đen', 'L'],
            [10, 'Đen', 'L'],

            [11, 'Trắng', 'L'],
            [12, 'Xanh', 'L'],
            [13, 'Xanh', 'L'],
            [14, 'Đen', 'L'],
            [15, 'Xanh', 'L'],
            [16, 'Xanh', 'L'],
            [17, 'Xanh', 'L'],
            [18, 'Xanh', 'L'],
            [19, 'Đen', 'L'],
            [20, 'Đen', 'L'],

            [21, 'Trắng', 'L'],
            [22, 'Xanh', 'L'],
            [23, 'Xanh', 'L'],
            [24, 'Đen', 'L'],
            [25, 'Xanh', 'L'],
            [26, 'Xanh', 'L'],
            [27, 'Xanh', 'L'],
            [28, 'Xanh', 'L'],
            [29, 'Đen', 'L'],
            [30, 'Đen', 'L'],

            [31, 'Trắng', 'L'],
            [32, 'Xanh', 'L'],
            [33, 'Xanh', 'L'],
            [34, 'Đen', 'L'],
            [35, 'Xanh', 'L'],
            [36, 'Xanh', 'L'],
            [37, 'Xanh', 'L'],
            [38, 'Xanh', 'L'],
            [39, 'Đen', 'L'],
            [40, 'Đen', 'L'],

            [41, 'Trắng', 'L'],
            [42, 'Xanh', 'L'],
            [43, 'Xanh', 'L'],
            [44, 'Đen', 'L'],
            [45, 'Xanh', 'L'],
            [46, 'Xanh', 'L'],
            [47, 'Xanh', 'L'],
            [48, 'Xanh', 'L'],
            [49, 'Đen', 'L'],
            [50, 'Đen', 'L'],

            [51, 'Trắng', 'L'],
            [52, 'Xanh', 'L'],
            [53, 'Xanh', 'L'],
            [54, 'Đen', 'L'],
            [55, 'Xanh', 'L'],
        ];
        foreach($productDetails as $productDetail) {
            ProductDetail::create([
                'product_id' => $productDetail[0],
                'color' => $productDetail[1],
                'size' => $productDetail[2]
            ]);
        }
    }
}
