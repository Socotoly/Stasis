@extends('layouts.app')
@section('content')
    <app-sidebar>

    </app-sidebar>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="flex-fill">
                {{--<task-view :item="{{ $task }}">--}}
                {{--</task-view>--}}
            </div>
        </div>
    </main>
@endsection