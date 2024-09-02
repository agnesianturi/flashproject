@extends('layout.master')

@section('content')
    <h2>Tambah User</h2>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="role">
                <option selected>Role</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection