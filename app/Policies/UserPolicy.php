<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function accessAdminPanel(User $user)
    {
        return $this->isAdmin($user);
    }

    public function view(User $user, User $model)
    {
        return $this->isAdminOrSelf($user, $model);
    }

    public function update(User $user, User $model)
    {
        return $this->isAdminAndNotTargetingSuperAdmin($user, $model);
    }

    public function delete(User $user, User $model)
    {
        return $this->isSuperAdminAndNotTargetingSuperAdmin($user, $model);
    }

    protected function isAdminOrSelf(User $user, User $model)
    {
        return $user->hasAnyRole(['super_admin', 'admin']) || $user->id === $model->id;
    }

    protected function isAdmin(User $user)
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }

    protected function isAdminAndNotTargetingSuperAdmin(User $user, User $model)
    {
        return $this->isAdmin($user) && !$model->hasRole('super_admin');
    }

    protected function isSuperAdminAndNotTargetingSuperAdmin(User $user, User $model)
    {
        return $user->hasRole('super_admin') && !$model->hasRole('super_admin');
    }
}
