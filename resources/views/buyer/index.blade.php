@extends('layouts.dashboard')

@section('content')
{{-- this should be SPA --}}
<router-view :user="{{ Auth::user() }}"></router-view>
@endsection