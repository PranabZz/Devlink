@extends('admin')
@section('content')
    <div class="container" style="max-width: 800px; max-height:800px; padding-top:40px;">
        <div class="row">
            <div class="col-md-6 mx-auto">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                @endif
                <form action="{{ route('register.auth') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="mb-3">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{ old('username') }}" />
                    </div>
                    <div class="mb-3">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <div class="mb-3">
                        <label>Password Confirmation<span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password_confirm" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Register</button>
                        <a class="btn btn-danger" href="{{ route('project.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    @endsection
