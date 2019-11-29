{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h3>Depositar</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Depósito</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('deposit.store') }}">
                    {{ csrf_field() }}
                    {{ method_field("POST") }}
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="value">Valor</label>
                            <input type="number" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" id="value" name="value" placeholder="Valor" value="{{ old('value') }}">
                            <div class="help-block text-danger">{{ $errors->first('value') }}</div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop