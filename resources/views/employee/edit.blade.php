@extends('layouts.blank')
@section('title')
    Edit Employee
@endsection
@section('content')
    <br>
    @if (Route::has('login'))
        <div class="text-right">
            @auth
                <a href="/companies/{{ $data->fk_companies }}" class="btn btn-outline-warning">@lang('files.partner')</a>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-danger">@lang('files.previous')</a>
                <a href="{{ url('/home') }}" class="btn btn-outline-secondary">@lang('files.account')</a>
            @endauth
        </div>
    @endif
    <h2>@lang('files.employeeTitleC')</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/employees/{{ $data->email }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">@lang('files.employeeFormLabelB')</label>
            <div class="col-sm-10">
                <h3>{{ $data->email }}</h3>
            </div>
        </div>
        <div class="form-group">
            <label for="firstName">@lang('files.employeeFormLabelA')</label>
            <select name="fk_companies" id="fk_companies" class="form-control">
                <option value="">@lang('files.selectEmpty')</option>
                @foreach($companies as $company)
                    <option value="{{ $company->email }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="firstName">@lang('files.employeeFormLabelC')</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Diego Andrés" value="{{ $data->firstName }}">
        </div>
        <div class="form-group">
            <label for="lastName">@lang('files.employeeFormLabelD')</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Carranza Rivera" value="{{ $data->lastName }}">
        </div>
        <div class="form-group">
            <label for="phone">@lang('files.employeeFormLabelE')</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="+57 3214916403" value="{{ $data->phone }}">
        </div>
        <button type="submit" class="btn btn-success">@lang('files.generalButtonUpdate')</button>
    </form>
@endsection