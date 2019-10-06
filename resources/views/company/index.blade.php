@extends('layouts.blank')
@section('title')
    Companies
@endsection
@section('content')
    <div class="flex-center position-ref full-height"><br>
        @if (Route::has('login'))
            <div class="text-right">
                @auth
                    <a href="{{ url('/') }}" class="btn btn-outline-danger">Menu</a>
                    <a href="{{ url('/home') }}" class="btn btn-outline-secondary">Account</a>
                @endauth
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2>Companies
                    <div class="text"></div>
                </h2>
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
                                    <th scope="col">Employees</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
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
                                    <tr>
                                        <div class="alert alert-danger" role="alert">
                                            NO COMPANIES REGISTERED
                                        </div>
                                    </tr>
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