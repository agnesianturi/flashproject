@extends('layout.master')

@section('content')
    @include('partial.success_alert')

    <h2>Admin List</h2>
    <a href="{{ route('admin.create') }}?referrer=admin" class="btn btn-primary">Tambah Admin</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @forelse($dataAdmin as $da)
                <tr>
                    <td>{{ $da->name }}</td>
                    <td>{{ $da->email }}</td>
                    <td>
                        <div class="btn-group">
                            <form action="{{ route('admin.destroy', $da->id) }}?referrer=admin" method="POST">
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