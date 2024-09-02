@extends('layout.master')

@section('content')

    @include('partial.success_alert')

    <h2>User List</h2>
    <a href="{{ route('admin.create') }}?referrer=user" class="btn btn-primary">Tambah User</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @forelse($dataUser as $du)
                <tr>
                    <td>{{ $du->name }}</td>
                    <td>{{ $du->email }}</td>
                    <td>
                        <div class="btn-group">
                            <form action="{{ route('admin.destroy', $du->id) }}?referrer=user" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Tidak ada Admin</td>
                </tr>
            @endforelse
        </tbody>
      </table>

@endsection