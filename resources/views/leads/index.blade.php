@extends('leads.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD</h2>
            </div><br/>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('leads.create') }}"> Crear nuevo lead</a>
            </div><br/>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Puntuación</th>
            <th width="280px">Acción</th>
        </tr>
        @foreach ($leads as $lead)
        <tr>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->email }}</td>
            <td>{{ $lead->phone }}</td>
            <td>{{ $lead->score }}</td>
            <td>
                <form action="{{ route('leads.destroy',$lead->id) }}" method="POST">
                    <a class="btn btn-secondary pull-right" style="margin-bottom: 1%" href="{{ route('leads.show',$lead->id) }}">Mostrar</a>
                    <a class="btn btn-secondary pull-right" style="margin-bottom: 1%" href="{{ route('leads.edit',$lead->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit pull-right" class="btn btn-danger" style="margin-bottom: 1%">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $leads->links() !!}
@endsection