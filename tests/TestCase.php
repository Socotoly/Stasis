<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    public function signIn(){
        Auth::login($user = $this->create('App\User'));
        return $user;
    }
    
    public function create($model, $override = []){
        return factory($model)->create($override);
    }

    public function make($model, $override = []){
        return factory($model)->make($override);
    }
}
