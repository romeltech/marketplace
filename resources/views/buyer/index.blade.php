@extends('layouts.dashboard')

@section('content')
<router-view :user="{{ Auth::user() }}"></router-view>
@endsection