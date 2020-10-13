<?php
namespace Database\Seeders;

use App\Helpers\PermissionHelper;
use App\Helpers\RoleHelper;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $this->seedAdmin();
        $this->seedRoles();
    }

    private function seedAdmin()
    {
        Role::firstOrCreate([
            'name' => RoleHelper::ADMIN,
        ]);
    }

    private function seedRoles()
    {
        foreach ($this->roles() as $roleName => $abilities) {
            /** @var Role $role */
            $role = Role::firstOrCreate([
                'name' => $roleName,
            ]);

            foreach ($abilities as $ability) {
                $persmission = Permission::firstOrCreate([
                    'name' => $ability,
                ]);
            }

            $role->syncPermissions($abilities);
        }
    }

    private function roles() : array
    {
        return [
            RoleHelper::SUBSCRIBED => [
                PermissionHelper::GAMES_CREATE,
                PermissionHelper::MISSIONS_CREATE,
            ],
        ];
    }
}
