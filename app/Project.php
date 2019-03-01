<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

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
