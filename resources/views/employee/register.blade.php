@extends('layouts.blank')
@section('title')
    Add Employee
@endsection
@section('content')
    <br>
    @if (Route::has('login'))
        <div class="text-right">
            @auth
                <a href="{{ route('employees.index') }}" class="btn btn-outline-danger">Employees</a>
                <a href="{{ url('/home') }}" class="btn btn-outline-secondary">Account</a>
            @endauth
        </div>
    @endif
    <h2>Form to add a new employee</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/employees" method="POST">
        @csrf
        <div class="form-group row">
            <label for="fk_companies" class="col-sm-2 col-form-label">Company</label>
            <div class="col-sm-10">
                <select name="fk_companies" id="fk_companies" class="form-control">
                    <option value="">Choose a option</option>
                    @foreach($data as $info)
                        <option value="{{ $info->email }}">{{ $info->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail User</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@company.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Diego Andrés" value="{{ old('firstName') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Carranza Rivera" value="{{ old('lastName') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="+57 3214916403" value="{{ old('phone') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection