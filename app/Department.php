<?php

namespace App;

use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes, HasPermissions;

    protected $appends = ['type'];

    public function lists(){
        return $this->morphMany(TaskList::class, 'parent');
    }

    public function tasks(){
        return $this->lists()->with('tasks');
    }

    public function getTypeAttribute(){
        return class_basename(self::class);
    }
}
