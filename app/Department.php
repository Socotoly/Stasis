<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
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
