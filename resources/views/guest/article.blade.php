@extends('layout.master')

@section('content')
    <h2>Article</h2>
    <div class="row">
        @forelse($articles as $a)
            <div class="col-4">
                <h5>{{ $a->title }}</h5>
                <a href="{{ route('article.show', $a->id) }}" class="btn btn-primary">Detail</a>
            </div>
        @empty
            <h5>Tidak ada artikel</h5>
        @endforelse
    </div>
@endsection