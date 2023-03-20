<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['Nguyễn Văn Nam', 'nam@gmail.com', bcrypt('12345678'), 'Hà Nội', '0912345678', '0'],
            ['Nguyễn Văn Hùng', 'hung@gmail.com', bcrypt('12345678'), 'Hà Nội', '0912345632', '0'],
            ['Phạm Văn Thái', 'thai@gmail.com', bcrypt('12345678'), 'Hà Nội', '0964345632', '0'],
            ['Bùi Tiến Hoàng', 'hoang@gmail.com', bcrypt('12345678'), 'Hà Nội', '0912345646', '0'],
            ['Phạm Lệ Thủy', 'thuy@gmail.com', bcrypt('12345678'), 'Hà Nội', '0964345646', '0'],
            ['Nguyễn Văn A', 'a@gmail.com', bcrypt('12345678'), 'Hà Nội', '0912345678', '0']
        ];

        foreach($users as $user) {
            User::create([
                'name' => $user[0],
                'email' => $user[1],
                'password' => $user[2],
                'address' => $user[3],
                'phone' => $user[4],
                'role' => $user[5]
            ]);
        }
    }
}
