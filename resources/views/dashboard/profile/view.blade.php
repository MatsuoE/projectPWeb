@extends('layout.dashboardmember')
@section('content')
    <p>Name     : {{ auth()->user()->name }}</p>
    <p>Email    : {{ auth()->user()->email }}</p>
@endsection