@extends('layouts.blank')
@section('title')
    Employees
@endsection
@section('content')
    <div class="flex-center position-ref full-height"><br>
        @if (Route::has('login'))
            <div class="text-right">
                @auth
                    <a href="{{ url('/') }}" class="btn btn-outline-danger">@lang('files.menu')</a>
                    <a href="{{ url('/home') }}" class="btn btn-outline-secondary">@lang('files.account')</a>
                @endauth
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2>@lang('files.employeeTitleA')</h2>
            </div>
            <div class="card-body">
            <p><a href="{{ route('employees.create') }}" class="btn btn-success">@lang('files.employeeButtonCreate')</a></p>
                <div class="card">
                    <div class="card-header">
                        @lang('files.employeeTitleB')
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('files.tableEmail')</th>
                                    <th scope="col">@lang('files.tableFirstName')</th>
                                    <th scope="col">@lang('files.tableLastName')</th>
                                    <th scope="col">@lang('files.tablePhone')</th>
                                    <th scope="col">@lang('files.tableCompany')</th>
                                    <th scope="col">@lang('files.tableButtonEdit')</th>
                                    <th scope="col">@lang('files.tableButtonDelete')</th>
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
                                    <tr>
                                        <div class="alert alert-danger" role="alert">
                                            @lang('files.warningC')
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