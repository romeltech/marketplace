<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * User Roles
     * 1 superadmin
     * 2 administrator
     * 3 editor
     * 4 buyer
     * 5 reseller/supplier
     * 6 both: buy/supplier
     * 7 Delivery Boy
     */
    public function run()
    {
        $user = new \App\User([
            'name'     => 'Romel Indemne',
            'email'    => 'super@super.com',
            'password' => Hash::make('123456789'),
            'phone'    => '05012345678',
            'role'     => 1
        ]);
        $user->save();
        $user = new \App\User([
            'name'     => 'Admin Account',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'phone'    => '05012345678',
            'role'     => 2
        ]);
        $user->save();
        $user = new \App\User([
            'name'     => 'Editor Account',
            'email'    => 'editor@editor.com',
            'password' => Hash::make('123456789'),
            'phone'    => '05012345678',
            'role'     => 3
        ]);
        $user->save();
        $user = new \App\User([
            'name'     => 'Buyer Account',
            'email'    => 'buyer@buyer.com',
            'password' => Hash::make('123456789'),
            'phone'    => '05012345678',
            'role'     => 4
        ]);
        $user->save();
        $user = new \App\User([
            'name'     => 'Seller Account',
            'email'    => 'seller@seller.com',
            'password' => Hash::make('123456789'),
            'phone'    => '05012345678',
            'role'     => 5
        ]);
        $user->save();
        $user = new \App\User([
            'name'     => 'Both Account',
            'email'    => 'both@both.com',
            'password' => Hash::make('123456789'),
            'phone'    => '05012345678',
            'role'     => 6
        ]);
        $user->save();
        $user = new \App\User([
            'name'     => 'Delivery Account',
            'email'    => 'delivery@delivery.com',
            'password' => Hash::make('123456789'),
            'phone'    => '05012345678',
            'role'     => 7
        ]);
        $user->save();
    }
}
