@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Staffs</h5>
                <form method="POST" action="{{ route('admin.store.staffs') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-outline mb-4 mt-4">
                        <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" />
                    </div>
                    @error('email')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-outline mb-4">
                        <input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') }}" />
                    </div>
                    @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control" placeholder="password" />
                    </div>
                    @error('password')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
