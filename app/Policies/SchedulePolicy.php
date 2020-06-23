<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Schedule;

class SchedulePolicy extends Policy
{
    public function update(User $user, Schedule $schedule)
    {
        // return $schedule->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Schedule $schedule)
    {
        return true;
    }
}
