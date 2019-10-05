@extends('layouts.blank')
@section('title')
    Employees
@endsection
@section('content')
    <h2>Empleados registrados en la compañia {{ $company->name }}</h2>
    <table class="table">
            <thead>
                <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $info)
                    <tr>
                        <th>{{ $info->email }}</th>
                        <td>{{ $info->firstName }}</td>
                        <td>{{ $info->lastName }}</td>
                        <td>{{ $info->phone }}</td>
                        <td><a href="/" class="btn btn-warning"></a></td>
                        <td>
                            <form action="/" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>NO HAY DATA</tr>
                @endforelse
            </tbody>
        </table>
@endsection