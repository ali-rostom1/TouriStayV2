<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionController extends Controller
{
    public function addPermission(Request $request)
    {
        $permissions = [
            'view listings',
            'favorite listings',
            'view profile',
            'edit profile',
            'post listing',
            'edit listing',
            'delete listing',
            'view statistics',
        ];
        foreach($permissions as $permission)
        {
            Permission::create(["name"=>$permission]);
        }
    }
    public function addPermissionsToRoles()
    {
        $touristRole = Role::create(["name"=>"tourist"]);
        $touristPermissions = [
            "view listings",
            "favorite listings",
            "view profile",
            "edit profile",
        ];
        foreach($touristPermissions as $permission){
            $touristRole->givePermissionTo($permission);
        }
        $adminRole = Role::create(["name"=>"admin"]);
        $adminPermissions = [
            "delete listing",
            "view statistics",
        ];
        foreach($adminPermissions as $permission){
            $adminRole->givePermissionTo($permission);
        }
        $landlordRole = Role::create(["name"=>"landlord"]);
        $landlordPermissions = [
            "view listings",
            "view profile",
            "edit profile",
            "post listing",
            "edit listing",
            "delete listing",
        ];
        foreach($landlordPermissions as $permission){
            $landlordRole->givePermissionTo($permission);
        }
    }
}
