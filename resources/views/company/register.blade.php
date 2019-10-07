@extends('layouts.blank')
@section('title')
    Add Company
@endsection
@section('content')
    @if (Route::has('login'))
        <div class="text-right">
            @auth
                <a href="{{ route('companies.index') }}" class="btn btn-outline-danger">@lang('files.menu')</a>
                <a href="{{ url('/home') }}" class="btn btn-outline-secondary">@lang('files.account')</a>
            @endauth
        </div>
    @endif
    <h2>@lang('files.companyTitleC')</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/companies" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">@lang('files.companyFormLabelA')</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@company.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">@lang('files.companyFormLabelB')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="example SAS" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-sm-2 col-form-label">@lang('files.companyFormLabelC')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="{{ old('website') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="logo">@lang('files.companyFormLabelD')</label>
            <input type="file" class="form-control-file" id="logo" name="logo">
        </div>
        <button type="submit" class="btn btn-primary">@lang('files.generalButtonRegister')</button>
    </form>
@endsection