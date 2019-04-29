@extends('layouts.app')
@section('content')
    <v-flex xs4>
        <app-sidebar>

        </app-sidebar>

    </v-flex>
    <v-flex>
        <task-view :item="{{ $task }}">
        </task-view>

    </v-flex>

@endsection