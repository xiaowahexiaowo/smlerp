<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
	{
        // 所有的策略~  只要是管理员  直接授权通过
	  if ($user->can('manage_users')) {
            return true;
        }
	}
}
