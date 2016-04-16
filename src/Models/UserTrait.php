<?php

namespace Zezont4\ACL\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

trait UserTrait
{
	use SoftDeletes;
	use SearchFormHelperTrait;
	use FlashMessageAfterSavingTrait;

	/**
	 * Check if the logged in user has a permission
	 *
	 * @param  String permission Slug of a permission (i.e: manage-user)
	 * @return Boolean true if has permission, otherwise false
	 */
	public function allowedTo($permission = null)
	{
		return (!is_null($permission) && $this->hasPermission($permission) || $this->hasRole('admin'));
	}

	/**
	 * Check if the logged in user has a role
	 *
	 * @param $role_slug String role Slug  (i.e: manage)
	 * @return bool
	 */
	public function hasRole($role_slug)
	{

		foreach ($this->roles as $role) {
			if ($role->role_slug == $role_slug || $role->role_slug == 'admin') return true;
		}
		return false;
	}

	/**
	 * Check if the permission matches with any permission user has
	 *
	 * @param  String permission slug of a permission
	 * @return Boolean true if permission exists, otherwise false
	 */
	protected function hasPermission($perm)
	{
		$permissions = $this->getAllPermissions();

		$permissionArray = is_array($perm) ? $perm : [$perm];

		return count(array_intersect($permissions, $permissionArray));
	}

	/**
	 * Check if the logged in user owns the user that he is going to edit
	 *
	 * @param $user
	 * @return bool
	 */
	public function owns($user)
	{
		return auth()->user()->hasRole('admin') || auth()->user()->id == $user->id;
	}

	/**
	 * Get all permission slugs from all permissions of all roles
	 *
	 * @return Array of permission slugs
	 */
	protected function getAllPermissions()
	{

		$permissions = $this->roles->load('permissions')->pluck('permissions')->toArray();

		return array_map('strtolower', array_unique(array_flatten(array_map(function ($permission) {

			return array_pluck($permission, 'permission_slug');

		}, $permissions))));
	}


	/**
	 * Many-To-Many Relationship Method for accessing the User->roles
	 *
	 * @return QueryBuilder Object
	 */
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}
}