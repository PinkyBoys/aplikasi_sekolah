@extends('layouts.master')
@section('page_title', 'My Dashboard')

@section('content')
    <h2>Welcome.<br> This is your Dashboard {{ $user->profile->name, $role
     }}</h2>
    @endsection
