<?php

use Illuminate\Database\Seeder;

use App\PermissionMeta;
use App\TemPermission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permission = new PermissionMeta();
        // foreach($permission->permissionMeta() as $key => $meta){
        //     foreach($permission->permissionAccessType() as $access => $value){
        //         PermissionMeta::create([
        //             'permission_meta' => $meta,
        //             'permission_key' => $key,
        //             'access_type' => $access,
        //         ]);
        //     }
        // }

        $permissions = [
            // <-- Admin Permission -->
            [
                'slug' => 'employee-read',
                'name' => 'Display employee infos',
            ],
            [
                'slug' => 'employee-create',
                'name' => 'Create new employee',
            ],
            [
                'slug' => 'employee-update',
                'name' => 'Update employee info',
            ],

            [
                'slug' => 'employee-attendance-read',
                'name' => 'Display attendance details',
            ],
            [
                'slug' => 'employee-attendance-create',
                'name' => 'Create/Modify attendances',
            ],

            [
                'slug' => 'employee-absence-read',
                'name' => 'Display absence details',
            ],
            [
                'slug' => 'employee-absence-create',
                'name' => 'Create/Modify attendances',
            ],

            [
                'slug' => 'employee-roles-read',
                'name' => 'Display role details',
            ],
            [
                'slug' => 'employee-roles-create',
                'name' => 'Create new role',
            ],
            [
                'slug' => 'employee-roles-update',
                'name' => 'Update/Edit role',
            ],
            [
                'slug' => 'employee-roles-delete',
                'name' => 'Delete role',
            ],

            [
                'slug' => 'department-read',
                'name' => 'Display department details',
            ],
            [
                'slug' => 'department-create',
                'name' => 'Create new department',
            ],
            [
                'slug' => 'department-update',
                'name' => 'Update/Edit department',
            ],
            [
                'slug' => 'department-delete',
                'name' => 'Delete department',
            ],

            [
                'slug' => 'company-read',
                'name' => 'Display company details',
            ],
            [
                'slug' => 'company-create',
                'name' => 'Create new company',
            ],
            [
                'slug' => 'company-update',
                'name' => 'Update/Edit company',
            ],
            [
                'slug' => 'company-delete',
                'name' => 'Delete company',
            ],

            [
                'slug' => 'office-read',
                'name' => 'Display office details',
            ],
            [
                'slug' => 'office-create',
                'name' => 'Create new office',
            ],
            [
                'slug' => 'office-update',
                'name' => 'Update/Edit office',
            ],
            [
                'slug' => 'office-delete',
                'name' => 'Delete office',
            ],

            [
                'slug' => 'holiday-calendar-read',
                'name' => 'Display holiday-calendar details',
            ],
            [
                'slug' => 'holiday-calendar-create',
                'name' => 'Create new holiday-calendar',
            ],
            [
                'slug' => 'holiday-calendar-update',
                'name' => 'Update/Edit holiday-calendar',
            ],
            [
                'slug' => 'holiday-calendar-delete',
                'name' => 'Delete holiday-calendar',
            ],
            
            [
                'slug' => 'compensation-read',
                'name' => 'Display compensation details',
            ],
            [
                'slug' => 'compensation-create',
                'name' => 'Create/Modify compensation details',
            ],

            [
                'slug' => 'mutuality-read',
                'name' => 'Display mutuality details',
            ],
            [
                'slug' => 'mutuality-create',
                'name' => 'Create mutuality',
            ],
            [
                'slug' => 'mutuality-update',
                'name' => 'Update mutuality',
            ],

            [
                'slug' => 'contribution-read',
                'name' => 'Display contribution details',
            ],
            [
                'slug' => 'contribution-create',
                'name' => 'Create contribution',
            ],
            [
                'slug' => 'contribution-update',
                'name' => 'Update contribution',
            ],

            [
                'slug' => 'salary-read',
                'name' => 'Display salary details',
            ],
            [
                'slug' => 'salary-create',
                'name' => 'Create salary',
            ],
            [
                'slug' => 'custom-field',
                'name' => 'Employee Info field settings',
            ],
            [
                'slug' => 'settings',
                'name' => 'Payroll settings',
            ],
            [
                'slug' => 'salary-payment-create',
                'name' => 'Payroll salary-payment-create',
            ],
           
        ];
        foreach ($permissions as $permission) {
            $check = 'check';
            $check = TemPermission::where('slug', $permission['slug'])->get();
            if ($check == '[]') {
                TemPermission::create($permission);
            }
        }
    }
}
