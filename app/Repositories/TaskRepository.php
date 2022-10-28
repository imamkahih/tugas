<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Task;

class TaskRepository
{
  public function forUser(User $User)
  {
    return Task::where('user_id', $User->id)->orderBy('created_at', 'asc')->get();
  }
}
