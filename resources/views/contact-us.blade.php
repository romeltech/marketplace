@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-dark font-weight-bold mb-3">Get in touch!</h1>
            <div class="card border-light shadow py-4 px-3">
                <div class="card-body">
                    <contact-form></contact-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection