@extends('layouts.blank')
@section('title')
    Employees
@endsection
@section('content')
    <div class="flex-center position-ref full-height">
        
        <br><div class="card">
            <div class="card-header">
                <h2>Employees</h2>
            </div>
            <div class="card-body">
            <p><a href="companies/create" class="btn btn-success">Create new employee</a></p>
                <div class="card">
                    <div class="card-header">
                        Employees List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $info)
                                    <tr>
                                        <th>{{ $info->email }}</th>
                                        <td>{{ $info->firstName }}</td>
                                        <td>{{ $info->lastName }}</td>
                                        <td>{{ $info->phone }}</td>
                                        <td>{{ $info->company }}</td>
                                        <td><a href="/employees/{{ $info->email }}/edit" class="btn btn-warning"></a></td>
                                        <td>
                                            <form action="/employees/{{ $info->email }}" method="post">
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
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $data->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection