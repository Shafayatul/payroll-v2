<?php

use Illuminate\Database\Seeder;

use App\PermissionMeta;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new PermissionMeta();
        foreach($permission->permissionMeta() as $key => $meta){
            foreach($permission->permissionAccessType() as $access => $value){
                PermissionMeta::create([
                    'permission_meta' => $meta,
                    'permission_key' => $key,
                    'access_type' => $access,
                ]);
            }
        }
    }
}
