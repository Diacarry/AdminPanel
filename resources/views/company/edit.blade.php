@extends('layouts.blank')
@section('title')
    Edit Company
@endsection
@section('content')
    <br>
        @if (Route::has('login'))
            <div class="text-right">
                @auth
                    <a href="{{ route('companies.index') }}" class="btn btn-outline-danger">@lang('files.previous')Companies</a>
                    <a href="{{ url('/home') }}" class="btn btn-outline-secondary">@lang('files.accont')Account</a>
                @endauth
            </div>
        @endif
    <h2>@lang('files.companyTitleE')</h2>
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
            <label for="email" class="col-sm-2 col-form-label">@lang('files.companyFormLabelA')</label>
            <div class="col-sm-10">
                <h3>{{ $data->email }}</h3>
            </div>
        </div>
        <div class="form-group">
            <label for="name">@lang('files.companyFormLabelB')</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="example SAS" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="website">@lang('files.companyFormLabelC')</label>
            <input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="{{ $data->website }}">
        </div>

        <div class="form-group">
            <img src="{{ Storage::url($data->logo) }}" alt=""  width="100px">
            <label for="file">@lang('files.companyFormLabelD')</label>
            <input type="file" class="form-control-file" id="file" name="file">
        </div>
        <button type="submit" class="btn btn-success">@lang('files.generalButtonUpdate')</button>
    </form>
@endsection