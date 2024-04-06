@extends('layouts.app')

@section('header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row row-cards">
        <div class="col-md-12">
            @livewire('dashboard')
        </div>
    </div>
@endsection
