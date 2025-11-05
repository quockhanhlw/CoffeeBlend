@extends('layouts.staff')

@section('content')

<div class="row">
        <div class="col">
                <div class="container">
		            @if(Session::has('success'))
			            <p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('success') }}</p>
		            @endif
	            </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Staffs</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($allStaffs as $staff)
                  <tr>
                    <th scope="row">{{ $staff->id }}</th>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                  </tr>
                @endforeach

                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection
