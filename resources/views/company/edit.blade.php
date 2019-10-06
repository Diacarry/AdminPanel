@extends('layouts.blank')
@section('title')
    Edit Company
@endsection
@section('content')
    <h2>Formulario para editar datos de una empresa</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/companies/{{ $data->email }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail Company</label>
            <div class="col-sm-10">
                <h3>{{ $data->email }}</h3>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Name Company</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="example SAS" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="{{ $data->website }}">
        </div>

        <div class="form-group">
            <img src="{{ Storage::url($data->logo) }}" alt=""  width="100px">
            <label for="file">Add logo to company</label>
            <input type="file" class="form-control-file" id="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection