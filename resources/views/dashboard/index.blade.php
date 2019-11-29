{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="row">
        <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $value }}</h3>

            <p>Saldo</p>
            </div>
            <div class="icon">
                <i class="fas fa-cash"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $valueWithdraw }}</h3>

            <p>Valor Sacado</p>
            </div>
            <div class="icon">
                <i class="fas fa-cash"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $valueDeposit }}</h3>

            <p>Valor Depositado</p>
            </div>
            <div class="icon">
                <i class="fas fa-cash"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop