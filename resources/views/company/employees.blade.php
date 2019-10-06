@extends('layouts.blank')
@section('title')
    Employees
@endsection
@section('content')
    <br>
    @if (Route::has('login'))
        <div class="text-right">
            @auth
                <a href="{{ route('companies.index') }}" class="btn btn-outline-danger">Companies</a>
                <a href="{{ url('/home') }}" class="btn btn-outline-secondary">Account</a>
            @endauth
        </div>
    @endif

        <div class="card">
            <div class="card-header">
                <h2>{{ $company->name }}'s Employees list</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">E-mail</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
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
                            <tr>
                                <div class="alert alert-danger" role="alert">
                                    NO REGISTERED EMPLOYEES IN THE COMPANY
                                </div>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>

        
@endsection