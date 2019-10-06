@extends('layouts.blank')
@section('title')
    Companies
@endsection
@section('content')
    <div class="flex-center position-ref full-height">
        
        <br><div class="card">
            <div class="card-header">
                <h2>Companies</h2>
            </div>
            <div class="card-body">
            <p><a href="companies/create" class="btn btn-success">Create new company</a></p>
                <div class="card">
                    <div class="card-header">
                        Companies List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">WebSite</th>
                                    <th scope="col">Empleados</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $info)
                                    <tr>
                                        <th>{{ $info->email }}</th>
                                        <td>{{ $info->name }}</td>
                                        <td>{{ $info->website }}</td>
                                        <td><a href="/companies/{{ $info->email }}" class="btn btn-success"></a></td>
                                        <td><a href="/companies/{{ $info->email }}/edit" class="btn btn-warning"></a></td>
                                        <td>
                                            <form action="/companies/{{ $info->email }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>NO HAY EMPLEADOS REGISTRADOS</tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection