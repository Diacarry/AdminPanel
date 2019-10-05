@extends('layouts.blank')
@section('title')
    Add Company
@endsection
@section('content')
    <h2>Formulario para añadir una nueva empresa</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/companies" method="POST">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail Company</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@company.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name Company</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="example SAS" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">Website</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="{{ old('website') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Add logo to company</label>
            <input type="file" class="form-control-file" id="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection