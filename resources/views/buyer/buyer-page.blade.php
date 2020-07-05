@extends('layouts.dashboard')

@section('content')
{{-- this should be SPA --}}
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('buyer.dashboard') }}" style="text-decoration: none;">
                <div class="shadow-sm px-3 py-4 bg-white rounded">
                    <h6 class="text-uppercase mb-0">Dashboard</h6>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('buyer.orders') }}" style="text-decoration: none;">
                <div class="shadow-sm px-3 py-4 bg-white rounded d-flex justify-content-between">
                    <h6 class="text-uppercase mb-0">Orders</h6>
                    <span class="badge badge-primary badge-pill">14</span>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('buyer.inquiries') }}" style="text-decoration: none;">
                <div class="shadow-sm px-3 py-4 bg-white rounded">
                    <h6 class="text-uppercase mb-0">Inquiries</h6>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('buyer.messages') }}" style="text-decoration: none;">
                <div class="shadow-sm px-3 py-4 bg-white rounded d-flex justify-content-between">
                    <h6 class="text-uppercase mb-0">Messages</h6>
                    <span class="badge badge-primary badge-pill">9</span>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection