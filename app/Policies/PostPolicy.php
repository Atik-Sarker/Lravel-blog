<?php

namespace App\Policies;

use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view the post.
     *
     * @param  \App\Admin $admin
     * @return mixed
     */
    public function view(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the Admin can create posts.
     *
     * @param  \App\Admin $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $this->getPermission($admin, 1);
    }

    /**
     * Determine whether the Admin can update the post.
     *
     * @param  \App\Admin $admin
     * @return mixed
     */
    public function update(Admin $admin)
    {
        return $this->getPermission($admin, 2);
    }


    public function delete(Admin $admin)
    {
        return $this->getPermission($admin, 3);
    }
    /**
     *
     */
    // tag
    public function tag(Admin $admin)
    {
        return $this->getPermission($admin, 8);
    }
    // Category
    public function category(Admin $admin)
    {
        return $this->getPermission($admin, 9);
    }
    // publisher
    public function publisher(Admin $admin)
    {
        return $this->getPermission($admin, 7);
    }




    /**
     * Determine whether the Admin can restore the post.
     *
     * @param  \App\Admin $admin
     * @return mixed
     */
    public function restore(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the post.
     *
     * @param  \App\Admin $admin
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
