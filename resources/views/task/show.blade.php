@extends('layouts.app')
@section('content')
    <app-sidebar>

    </app-sidebar>

    <task-view :item="{{ $task }}">
    </task-view>

@endsection