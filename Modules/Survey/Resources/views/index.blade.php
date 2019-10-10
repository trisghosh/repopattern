@extends('survey::layouts.master')

@section('content')
    <h1>Hello World </h1>

    <p>
        This view is loaded from module: {!! config('survey.name') !!}
    </p>

    @foreach($users as $user)
    	{{img($user->avatar,$user->options)}}
    @endforeach
@stop
