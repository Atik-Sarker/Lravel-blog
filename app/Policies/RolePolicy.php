<?php

namespace App\Policies;

use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view the role.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the Admin can create roles.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $this->getPermission($admin, 4);
    }

    /**
     * Determine whether the Admin can update the role.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(Admin $admin)
    {
        return $this->getPermission($admin, 5);
    }

    /**
     * Determine whether the Admin can delete the role.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(Admin $admin)
    {
        return $this->getPermission($admin, 6);
    }

    /**
     * Determine whether the Admin can restore the role.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Role  $role
     * @return mixed
     */
    public function restore(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the role.
     *
     * @param  \App\Admin  $admin
     * @param  \App\Role  $role
     * @return mixed
     */
    public function forceDelete(Admin $admin)
    {
        //
    }

    protected function getPermission($admin, $p_id)
    {
        foreach($admin->roles as $role){
            foreach($role->permissions as $permission){
                if ($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false ;
    }
}
