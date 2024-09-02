@extends('layout.master')

@section('content')

    @include('partial.success_alert')

    <h2>Article</h2>
    <a href="{{ route('article.create') }}" class="btn btn-primary">Buat Artikel Baru</a>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @forelse($articles as $a)
                    <tr>
                        <td>{{ $a->title }}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('article.destroy', $a->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Tidak ada Article yang dibuat oleh {{ Auth::user()->name }}</td>
                    </tr>
                @endforelse

            </tbody>
          </table>
    </div>
@endsection