<?php

namespace App\Traits;


trait HasPath
{
    public $tableName;

    public function path()
    {
        $this->tableName = $this->getTable();

        return route($this->tableName . '.show', $this);
    }

    public function apiPath()
    {
        $this->tableName = $this->getTable();

        return route('api.' . $this->tableName .'.show', $this);
    }
}