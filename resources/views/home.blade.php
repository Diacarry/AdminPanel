@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>WELCOME... You are logged in!</p>
                    <p>Choose a Language</p>
                    <form action="/" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <select class="form-control" name="lang" id="lang">
                                <option value="">Chosee a option</option>
                                <option value="en">English</option>
                                <option value="es">Español</option>
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-success">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
