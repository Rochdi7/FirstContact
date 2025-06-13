<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('general.breadcrumbs.home'), route('admin.home'));
});

// Users
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('users.users'), route('admin.users.index'));
});

Breadcrumbs::for('user-create', function (BreadcrumbTrail $trail) {
    $trail->parent('user');
    $trail->push(__('users.create'), route('admin.users.create'));
});

Breadcrumbs::for('user-show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('user');
    $trail->push(__('users.show', ['name' => $user->name]), route('admin.users.show', $user->slug));
});

Breadcrumbs::for('user-edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('user-show', $user);
    $trail->push(__('users.edit'), route('admin.users.edit', $user->id));
});

// Profile
Breadcrumbs::for('profile-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('users.profile.manage_profile'), route('profile.edit'));
});

// Roles
Breadcrumbs::for('role', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('roles.roles'), route('admin.roles.index'));
});

Breadcrumbs::for('role-create', function (BreadcrumbTrail $trail) {
    $trail->parent('role');
    $trail->push(__('roles.create'), route('admin.roles.create'));
});

Breadcrumbs::for('role-show', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('role');
    $trail->push(__('roles.show', ['name' => $role->name]));
});

Breadcrumbs::for('role-edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('role-show', $role);
    $trail->push(__('roles.edit'), route('admin.roles.edit', $role->id));
});

// Permissions
Breadcrumbs::for('permission', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('breadcrumbs.permissions'), route('admin.permissions.index'));
});

Breadcrumbs::for('permission-create', function (BreadcrumbTrail $trail) {
    $trail->parent('permission');
    $trail->push(__('breadcrumbs.permission_create'), route('admin.permissions.create'));
});

Breadcrumbs::for('permission-show', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('permission');
    $trail->push(__('breadcrumbs.permission_show', ['name' => $permission->name]), route('admin.permissions.show', $permission->id));
});

Breadcrumbs::for('permission-edit', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('permission-show', $permission);
    $trail->push(__('breadcrumbs.permission_edit'), route('admin.permissions.edit', $permission->id));
});

// Countries
Breadcrumbs::for('country', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('countries.countries'), route('admin.countries.index'));
});

Breadcrumbs::for('country-create', function (BreadcrumbTrail $trail) {
    $trail->parent('country');
    $trail->push(__('countries.create'), route('admin.countries.create'));
});

Breadcrumbs::for('country-show', function (BreadcrumbTrail $trail, $country) {
    $trail->parent('country');
    $trail->push(__('countries.show', ['name' => $country->name]), route('admin.countries.show', $country->id));
});

Breadcrumbs::for('country-edit', function (BreadcrumbTrail $trail, $country) {
    $trail->parent('country-show', $country);
    $trail->push(__('countries.edit'), route('admin.countries.edit', $country->id));
});

// Currencies
Breadcrumbs::for('currency', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('currencies.currencies'), route('admin.currencies.index'));
});

Breadcrumbs::for('currency-create', function (BreadcrumbTrail $trail) {
    $trail->parent('currency');
    $trail->push(__('currencies.create'), route('admin.currencies.create'));
});

Breadcrumbs::for('currency-show', function (BreadcrumbTrail $trail, $currency) {
    $trail->parent('currency');
    $trail->push(__('currencies.show', ['name' => $currency->name]), route('admin.currencies.show', $currency->id));
});

Breadcrumbs::for('currency-edit', function (BreadcrumbTrail $trail, $currency) {
    $trail->parent('currency-show', $currency);
    $trail->push(__('currencies.edit'), route('admin.currencies.edit', $currency->id));
});


// Store Types
Breadcrumbs::for('store_type', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('store_types.store_types'), route('admin.store_types.index'));
});

Breadcrumbs::for('store_type-create', function (BreadcrumbTrail $trail) {
    $trail->parent('store_type');
    $trail->push(__('store_types.create'), route('admin.store_types.create'));
});

Breadcrumbs::for('store_type-show', function (BreadcrumbTrail $trail, $storeType) {
    $trail->parent('store_type');
    $trail->push(__('store_types.show', ['name' => $storeType->name]), route('admin.store_types.show', $storeType->id));
});

Breadcrumbs::for('store_type-edit', function (BreadcrumbTrail $trail, $storeType) {
    $trail->parent('store_type-show', $storeType);
    $trail->push(__('store_types.edit'), route('admin.store_types.edit', $storeType->id));
});

// Plans
Breadcrumbs::for('plan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('plans.title'), route('admin.plans.index'));
});

Breadcrumbs::for('plan-create', function (BreadcrumbTrail $trail) {
    $trail->parent('plan');
    $trail->push(__('plans.create'), route('admin.plans.create'));
});

// Remove this block since you don't want "show"
Breadcrumbs::for('plan-edit', function (BreadcrumbTrail $trail, $plan) {
    $trail->parent('plan');
    $trail->push(__('plans.edit'), route('admin.plans.edit', $plan->id));
});


// Contacts
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('contacts.title'), route('customer.contacts.index'));
});

Breadcrumbs::for('contacts-create', function (BreadcrumbTrail $trail) {
    $trail->parent('contacts');
    $trail->push(__('contacts.create'), route('customer.contacts.create'));
});

Breadcrumbs::for('contact-edit', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('contacts');
    $trail->push(__('contacts.edit'), route('customer.contacts.edit', $contact->id));
});


// Mail Providers
Breadcrumbs::for('mail_providers', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('mail_providers.title'), route('customer.mail_providers.index'));
});

Breadcrumbs::for('mail_providers-create', function ($trail) {
    $trail->parent('mail_providers');
    $trail->push(__('mail_providers.create'), route('customer.mail_providers.create'));
});


Breadcrumbs::for('mail_providers-edit', function (BreadcrumbTrail $trail, $mailProvider) {
    $trail->parent('mail_providers');
    $trail->push(__('mail_providers.edit'), route('customer.mail_providers.edit', $mailProvider->id));
});

// Templates
Breadcrumbs::for('template', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('templates.title'), route('admin.templates.index'));
});

Breadcrumbs::for('template-create', function (BreadcrumbTrail $trail) {
    $trail->parent('template');
    $trail->push(__('templates.create'), route('admin.templates.create'));
});

Breadcrumbs::for('template-edit', function (BreadcrumbTrail $trail, $template) {
    $trail->parent('template');
    $trail->push(__('templates.edit'), route('admin.templates.edit', $template->id));
});
