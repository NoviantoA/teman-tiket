<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use Carbon\Carbon;


class role_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Role Seeders
        $roleRecords = [
          [
            'role_id' => 1,
            'role_name' => 'Super Admin',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'role_id' => 2,
            'role_name' => 'Admin',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'role_id' => 3,
            'role_name' => 'Mitra',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'role_id' => 4,
            'role_name' => 'User',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          ];
          Roles::insert($roleRecords);
    }
}
