<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Role;
trait HasRoles
{
    // @return BelongsToMany
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    // @return strign $role
    // @return bool

    public function hasRole(string $role): bool
    {
        return $this->roles()->whereName($role)->exists() ? true : false;
    }

    // @return array $roles
    // @return bool
    public function hasRoles(array $roles): bool
    {
        return $this->roles()->whereIn('name', $roles)->exists() ? true : false;
    }

    // @return strign $permission
    // @return bool

    public function hasPermission(string $permission): bool
    {
        return $this->roles()
            ->whereHas('permissions', function($query) use ($permission) {
                $query->whereName($permission);
            })
            ->exists();
    }
}