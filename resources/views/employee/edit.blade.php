@extends('layouts.blank')
@section('title')
    Edit Employee
@endsection
@section('content')
    <h2>Formulario para editar datos de un empleado</h2>
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
            <label for="email" class="col-sm-2 col-form-label">E-mail Employee</label>
            <div class="col-sm-10">
                <h3>{{ $data->email }}</h3>
            </div>
        </div>
        <div class="form-group">
            <select name="fk_companies" id="fk_companies" class="form-control">
                <option value="">Elija una Opción</option>
                @foreach($companies as $company)
                    <option value="{{ $company->email }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Diego Andrés" value="{{ $data->firstName }}">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Carranza Rivera" value="{{ $data->lastName }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="+57 3214916403" value="{{ $data->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection