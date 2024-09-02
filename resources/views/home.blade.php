@extends('layout.master')

@section('content')
    @if(!isset($user))

        @include('partial.error')

        <h2>Login</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="role" required>
                    <option selected>Login as</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <h2>Welcome, {{ $user->name }}</h2>
    @endif
@endsection