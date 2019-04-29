<?php

namespace App;

use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, HasPermissions;

    public function list(){
        return $this->morphMany(TaskList::class, 'parent');
    }

    public function tasks(){
        return $this->lists()->with('tasks');
    }

    public function getTypeAttribute(){
        return class_basename(self::class);
    }
}
