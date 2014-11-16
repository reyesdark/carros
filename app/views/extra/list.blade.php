@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Extras / Servicios</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
               <a href="{{ route('extra.create') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
            <div class="col-sm-offset-5 col-sm-6 hidden-lg">
                {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                    <div class="form-group input-group">
                        <span class="input-group-addon glyphicon glyphicon-search"> </span>
                            {{ Form::text('buscar', null, array('id' => 'buscar', 'placeholder' => 'Buscar', 'class' => 'form-control')) }}
                            {{ Form::hidden('tabla', 'Extra', array('id' => 'tabla')) }}
                    </div>
                    <div class="btn-group">
                        {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-default')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Extra</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>opciones</th>
                </tr>
                @foreach ($extra as $extras)
                    <tr>
                        <td>
                            <a href="{{ route('extra.show', array($extras->id)) }}">{{ $extras->extra }}</a>
                        </td>
                        <td>{{ $extras->descripcion }}</td>
                        <td>${{ $extras->precio }}</td>
                        <td>{{ $extras->ruta_imagen }}</td>
                        <td>
                            <a href="{{ route('extra.edit', array($extras->id)) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                            <a href="#" data-id="{{ $extras->id }}" data-form="#form-ext" data-content="Eliminar" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $extra->links() }}
        {{ Form::open(array('route' => array('extra.destroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-ext')) }}
        {{ Form::close() }}
    </div>
</div>
@stop