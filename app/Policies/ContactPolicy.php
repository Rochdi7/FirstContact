<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;

class ContactPolicy
{
    /**
     * Determine whether the user can view any contacts.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('access contacts');
    }

    /**
     * Determine whether the user can view a specific contact.
     */
    public function view(User $user, Contact $contact): bool
    {
        return $user->can('show contacts') && $contact->user_id === $user->id;
    }

    /**
     * Determine whether the user can create a new contact.
     */
    public function create(User $user): bool
    {
        return $user->can('create contacts');
    }

    /**
     * Determine whether the user can update the given contact.
     */
    public function update(User $user, Contact $contact): bool
    {
        return $user->can('edit contacts') && $contact->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the given contact.
     */
    public function delete(User $user, Contact $contact): bool
    {
        return $user->can('delete contacts') && $contact->user_id === $user->id;
    }

    /**
     * Optionally handle restore authorization (not used here).
     */
    public function restore(User $user, Contact $contact): bool
    {
        return false;
    }

    /**
     * Optionally handle force delete authorization (not used here).
     */
    public function forceDelete(User $user, Contact $contact): bool
    {
        return false;
    }
}
