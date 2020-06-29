<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Schedule;

class SchedulePolicy extends Policy
{
    public function update(User $user, Schedule $schedule)
    {

        return $user->can('u_schedules');
    }

    public function destroy(User $user, Schedule $schedule)
    {
        return $user->can('d_schedules');
    }

        public function create(User $user, Schedule $schedule)
    {
        return $user->can('c_schedules');
    }

        public function index(User $user, Schedule $schedule)
    {
        return $user->can('r_schedules');
    }

}
