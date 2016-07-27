@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> ZonaTarifarias
            <a class="btn btn-success pull-right" href="{{ route('zona_tarifarias.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($zona_tarifarias->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ZONA</th>
                        <th>VALOR</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($zona_tarifarias as $zona_tarifarium)
                            <tr>
                                <td>{{$zona_tarifarium->id}}</td>
                                <td>{{$zona_tarifarium->zona}}</td>
                    <td>{{$zona_tarifarium->valor}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('zona_tarifarias.show', $zona_tarifarium->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('zona_tarifarias.edit', $zona_tarifarium->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('zona_tarifarias.destroy', $zona_tarifarium->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $zona_tarifarias->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection