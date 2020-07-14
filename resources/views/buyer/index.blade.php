@extends('layouts.dashboard')

@section('content')
<router-view :user="{{ Auth::user() }}" :user-role="'{{Auth::user()->userRole()}}'"></router-view>
@endsection