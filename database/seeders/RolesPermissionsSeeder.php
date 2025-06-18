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
    public function run(): void
    {
        //START  ########### Admin ##############
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Devaga',
            'approved' => 1,
            'email' => 'admin@devaga.com',
            'password' => Hash::make('1234')
        ]);

        $role_admin = Role::create(['name' => 'Admin', 'description' => 'Admin']);

        $admin_permissions = [
            'edit my_profile',

            // Users
            'create users', 'edit users', 'show users', 'delete users', 'access users',

            // Roles
            'create roles', 'edit roles', 'show roles', 'delete roles', 'access roles',

            // Permissions
            'create permissions', 'edit permissions', 'show permissions', 'delete permissions', 'access permissions',

            // Settings
            'access settings',

            // Countries
            'create countries', 'edit countries', 'show countries', 'delete countries', 'access countries',

            // Currencies
            'create currencies', 'edit currencies', 'show currencies', 'delete currencies', 'access currencies',

            // Store Types
            'create store_types', 'edit store_types', 'show store_types', 'delete store_types', 'access store_types',

            // Plans
            'create plans', 'edit plans', 'show plans', 'delete plans', 'access plans',

            // Contacts
            'create contacts', 'edit contacts', 'show contacts', 'delete contacts', 'access contacts',

            // Templates
            'create templates', 'edit templates', 'show templates', 'delete templates', 'access templates',

            // Message Templates (NEW MODULE)
            'create message_templates', 'edit message_templates', 'show message_templates', 'delete message_templates', 'access message_templates',
        ];

        foreach ($admin_permissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_admin->givePermissionTo($perm);
        }

        $admin->assignRole($role_admin);
        //END  ########### Admin ##############


        //START  ########### Account Manager ##############
        $account_manager = User::create([
            'first_name' => 'Account',
            'last_name' => 'Manager',
            'email' => 'AccountManager@devaga.com',
            'approved' => 1,
            'password' => Hash::make('password')
        ]);

        $role_account_manager = Role::create([
            'name' => 'Account Manager',
            'description' => 'Account Manager'
        ]);

        $permissions_account_manager = [
            'edit my_profile',
            'create users', 'edit users', 'show users', 'delete users', 'access users',
            'create contacts', 'edit contacts', 'access contacts'
        ];

        foreach ($permissions_account_manager as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_account_manager->givePermissionTo($perm);
        }

        $account_manager->assignRole($role_account_manager);
        //END  ########### Account Manager ##############


        // START  ########### Customer Support ##############

        $customer_support = User::create([
            'first_name' => 'Customer',
            'last_name' => 'Support',
            'email' => 'CustomerSupport@devaga.com',
            'approved' => 1,
            'password' => Hash::make('password')
        ]);

        $role_customer_support = Role::create([
            'name' => 'Customer Support',
            'description' => 'Handles user support requests and technical issues.'
        ]);

        $permissions_customer_support = [
            'edit my_profile',
        ];

        foreach ($permissions_customer_support as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_customer_support->givePermissionTo($perm);
        }

        $customer_support->assignRole($role_customer_support);

        // END  ########### Customer Support ##############


        // START  ########### CUSTOMER ##############

        $store_manager = User::create([
            'first_name' => 'Customer',
            'last_name' => 'Customer',
            'email' => 'Customer@devaga.com',
            'approved' => 1,
            'password' => Hash::make('password')
        ]);

        $role_store_manager = Role::create([
            'name' => 'Customer ',
            'description' => 'Customer'
        ]);

        $permissions_store_manager = [
            'edit my_profile',
            'create contacts', 'edit contacts', 'show contacts', 'delete contacts', 'access contacts',
            'create mail_providers', 'edit mail_providers', 'show mail_providers', 'delete mail_providers', 'access mail_providers'
        ];

        foreach ($permissions_store_manager as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $role_store_manager->givePermissionTo($perm);
        }

        $store_manager->assignRole($role_store_manager);

        // END  ########### Store Manager ##############

        $this->command->info('Users, Roles, and Permissions have been created successfully!');
    }
}
