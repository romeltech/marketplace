@extends('layouts.dashboard')

@section('content')
{{-- this should be SPA --}}
<div class="container">
    <router-view :user="{{ Auth::user() }}"></router-view>
</div>
@endsection