@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> ZonaTarifarias / Edit #{{$zona_tarifarium->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('zona_tarifarias.update', $zona_tarifarium->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('zona')) has-error @endif">
                       <label for="zona-field">Zona</label>
                    <input type="text" id="zona-field" name="zona" class="form-control" value="{{ is_null(old("zona")) ? $zona_tarifarium->zona : old("zona") }}"/>
                       @if($errors->has("zona"))
                        <span class="help-block">{{ $errors->first("zona") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('valor')) has-error @endif">
                       <label for="valor-field">Valor</label>
                    <input type="text" id="valor-field" name="valor" class="form-control" value="{{ is_null(old("valor")) ? $zona_tarifarium->valor : old("valor") }}"/>
                       @if($errors->has("valor"))
                        <span class="help-block">{{ $errors->first("valor") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('zona_tarifarias.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
