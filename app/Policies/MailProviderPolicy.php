<?php

namespace App\Policies;

use App\Models\MailProvider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MailProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any mail providers.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view a specific mail provider.
     */
    public function view(User $user, MailProvider $mailProvider): bool
    {
        return $user->id === $mailProvider->user_id;
    }

    /**
     * Determine whether the user can create a mail provider.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update a mail provider.
     */
    public function update(User $user, MailProvider $mailProvider): bool
    {
        return $user->id === $mailProvider->user_id;
    }

    /**
     * Determine whether the user can delete a mail provider.
     */
    public function delete(User $user, MailProvider $mailProvider): bool
    {
        return $user->id === $mailProvider->user_id;
    }

    /**
     * Determine whether the user can restore a deleted mail provider.
     */
    public function restore(User $user, MailProvider $mailProvider): bool
    {
        return $user->id === $mailProvider->user_id;
    }

    /**
     * Determine whether the user can permanently delete a mail provider.
     */
    public function forceDelete(User $user, MailProvider $mailProvider): bool
    {
        return $user->id === $mailProvider->user_id;
    }
}
