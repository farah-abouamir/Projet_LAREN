<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           
           'user-create',
           'user-edit',
           'user-delete',
           'commission-create',
           'commission-edit',
           'commission-delete',
           'commission-show',
           'demande-create',
           'demande-edit',
           'demande-delete',
           'demande-show',

        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}