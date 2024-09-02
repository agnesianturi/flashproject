@extends('layout.master')

@section('content')
    <h2>Detail</h2>

    <div class="d-flex flex-column justify-content-center align-items-start">
        <h5>{{ $detail->title }}</h5>
        <p>Kontributor : {{ $detail->kontributor }}</p>
        <p>{{ \Carbon\Carbon::parse($detail->created_at)->format('d M Y') }}</p>
        <img src="{{ asset('storage/fileLampiran/'.$detail->image) }}" class="mb-3" alt="">
        <p>{{ $detail->description }}</p>
    </div>

@endsection

