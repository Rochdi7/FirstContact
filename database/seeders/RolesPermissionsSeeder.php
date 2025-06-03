<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //START  ########### Admin ##############
        // CREATE ADMIN USER
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Devaga',
            'approved' => 1,
            'email' => 'admin@devaga.com',
            'password' => Hash::make('1234')
        ]);

        // Create 'Admin' Role
        $role_admin = Role::create(['name' => 'Admin', 'description' => 'Admin']);

        // Define Permissions for Admin
        $admin_permissions = [
            'edit my_profile',
            'create users', 'edit users', 'show users', 'delete users', 'access users',
            'create roles', 'edit roles', 'show roles', 'delete roles', 'access roles',
            'create permissions', 'edit permissions', 'show permissions', 'delete permissions', 'access permissions',
            'access settings',
            'create countries', 'edit countries', 'show countries', 'delete countries', 'access countries',
            'create currencies', 'edit currencies', 'show currencies', 'delete currencies', 'access currencies',
            'create store_types', 'edit store_types', 'show store_types', 'delete store_types', 'access store_types',
            'create plans', 'edit plans', 'show plans', 'delete plans', 'access plans',
            'create contacts', 'edit contacts', 'show contacts', 'delete contacts', 'access contacts'
        ];

        // Create Permissions and Assign to 'Admin' Role
        foreach ($admin_permissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_admin->givePermissionTo($perm);
        }

        // Assign 'Admin' Role to Admin User
        $admin->assignRole($role_admin);
        //END  ########### Admin ##############


        //START  ########### Account Manager ##############
        // CREATE ACCOUNT MANAGER
        $account_manager = User::create([
            'first_name' => 'Account',
            'last_name' => 'Manager',
            'email' => 'AccountManager@devaga.com',
            'approved' => 1,
            'password' => Hash::make('password')
        ]);

        // Create 'Account Manager' Role
        $role_account_manager = Role::create([
            'name' => 'Account Manager',
            'description' => 'Account Manager'
        ]);

        // Define Permissions for Account Manager
        $permissions_account_manager = [
            'edit my_profile',
            'create users', 'edit users', 'show users', 'delete users', 'access users',
            'create contacts', 'edit contacts', 'access contacts'
        ];

        // Create Permissions and Assign to 'Account Manager' Role
        foreach ($permissions_account_manager as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_account_manager->givePermissionTo($perm);
        }

        // Assign 'Manager Company' Role to Account Manager
        $account_manager->assignRole($role_account_manager);
        //END  ########### Account Manager ##############


        // START  ########### Customer Support ##############

        // CREATE CUSTOMER SUPPORT USER
        $customer_support = User::create([
            'first_name' => 'Customer',
            'last_name' => 'Support',
            'email' => 'CustomerSupport@devaga.com',
            'approved' => 1,
            'password' => Hash::make('password')
        ]);

        // Create 'Customer Support' Role
        $role_customer_support = Role::create([
            'name' => 'Customer Support',
            'description' => 'Handles user support requests and technical issues.'
        ]);

        // Define Permissions for Customer Support
        $permissions_customer_support = [
            'edit my_profile',
            'show contacts', 'access contacts'
        ];

        // Create Permissions and Assign to 'Customer Support' Role
        foreach ($permissions_customer_support as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_customer_support->givePermissionTo($perm);
        }

        // Assign 'Customer Support' Role to User
        $customer_support->assignRole($role_customer_support);

        // END  ########### Customer Support ##############


        // START  ########### CUSTOMER ##############

        // CREATE MANAGER USER
        $store_manager = User::create([
            'first_name' => 'Customer',
            'last_name' => 'Customer',
            'email' => 'Customer@devaga.com',
            'approved' => 1,
            'password' => Hash::make('password')
        ]);

        // Create 'Store Manager' Role
        $role_store_manager = Role::create([
            'name' => 'Customer ',
            'description' => 'Customer'
        ]);

        // Define Permissions for Store Manager
        $permissions_store_manager = [
            'edit my_profile',
        ];

        // Create Permissions and Assign to 'Store Manager' Role
        foreach ($permissions_store_manager as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_store_manager->givePermissionTo($perm);
        }

        // Assign 'Store Manager' Role to User
        $store_manager->assignRole($role_store_manager);

        // END  ########### Store Manager ##############

        // Output a message for confirmation
        $this->command->info('Users, Roles, and Permissions have been created successfully!');
    }
}
