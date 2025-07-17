<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;

class MessagePolicy
{
    /**
     * Determine whether the user can view the list of messages.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('access messages');
    }

    /**
     * Determine whether the user can view a specific message.
     */
    public function view(User $user, Message $message): bool
    {
        return $user->can('show messages') && $message->user_id === $user->id;
    }

    /**
     * Determine whether the user can create a message.
     */
    public function create(User $user): bool
    {
        return $user->can('create messages');
    }

    /**
     * Determine whether the user can update a message.
     */
    public function update(User $user, Message $message): bool
    {
        return $user->can('edit messages') && $message->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete a message.
     */
    public function delete(User $user, Message $message): bool
    {
        return $user->can('delete messages') && $message->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore a deleted message.
     */
    public function restore(User $user, Message $message): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete a message.
     */
    public function forceDelete(User $user, Message $message): bool
    {
        return false;
    }
}
