<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	public function update(User $currentUser, User $user)
	{
		return $currentUser->id === $user->id;
	}

	public function admin(User $currentUser, User $user)
	{
		return $currentUser->id === $user->id && $currentUser->is_admin;
	}

	// 只有管理员可以删除用户
	public function destroy(User $currentUser, User $user)
	{
		return $currentUser->is_admin && $currentUser->id !== $user->id;
	}

	// 只有管理员可以编辑文章
	public function edit(User $currentUser, User $user)
	{
		return $currentUser->is_admin && $currentUser->id !== $user->id;
	}

	// 只有管理员可以发布公告
	public function create(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    // 只有管理员可以审核信息
	public function check(User $currentUser, User $user)
	{
		return $currentUser->is_admin && $currentUser->id !== $user->id;
	}
}
