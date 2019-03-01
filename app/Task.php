<?php

namespace App;

use App\Traits\HasPath;
use App\Traits\Taggable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Taggable, HasPath;

    protected $fillable = ['user_id', 'title', 'description', 'task_list_id'];

    protected $appends = ['top_parent', 'type'];

    protected $dates = ['created_at', 'updated_at', 'start_date', 'due_date', 'completed_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignees()
    {
        return $this->belongsToMany(User::class)->wherePivot('type', 'Assignee');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class)->wherePivot('type', 'Follower');
    }

    public function list()
    {
        return $this->belongsTo(TaskList::class, 'task_list_id');
    }

    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    public function replies()
    {
        return $this->morphMany(Reply::class, 'subject');
    }

    public function markCompleted($date = null)
    {
        $this->completed_at = !$date == null ? Carbon::parse($date)->toDateTimeString() : Carbon::now()->toDateTimeString();
        $this->save();

        return $this;
    }

    public function markUncompleted()
    {
        $this->completed_at = null;
        $this->save();

        return $this;
    }

    public function isComplete()
    {
        return !! $this->completed_at;
    }

    public function getTopParentAttribute()
    {
        return $this->list->parent;
    }

    public function getTypeAttribute()
    {
        return class_basename(self::class);
    }
}
