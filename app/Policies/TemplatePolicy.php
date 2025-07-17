<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Template;

class TemplatePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('access templates')
            || $user->can('access customer_templates');
    }

    public function view(User $user, Template $template): bool
    {
        return $user->can('show templates')
            || $user->can('access customer_templates');
    }

    public function create(User $user): bool
    {
        return $user->can('create templates')
            || $user->can('access customer_templates');
    }

    public function update(User $user, Template $template): bool
    {
        return $user->can('edit templates')
            || $user->can('access customer_templates');
    }

    public function delete(User $user, Template $template): bool
    {
        return $user->can('delete templates')
            || $user->can('access customer_templates');
    }

    public function restore(User $user, Template $template): bool
    {
        return false;
    }

    public function forceDelete(User $user, Template $template): bool
    {
        return false;
    }
}
