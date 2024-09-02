@extends('layout.master')

@section('content')
    @include('partial.danger_alert')

    <h2>Buat Artikel Baru</h2>
    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">News Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">

          @error('title')
          <div class="invalid-feedback" role="alert">
            {{ $message }}
          </div>
          @enderror

        </div>

        <div class="mb-3">
            <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" name="category">
                <option selected>Category</option>
                <option value="1" {{ old('category') == '1' ? 'selected' : '' }} >Regional</option>
                <option value="2"{{ old('category') == '2' ? 'selected' : '' }}>Law and Social</option>
                <option value="3"{{ old('category') == '3' ? 'selected' : '' }}>Entertainment</option>
                <option value="4" {{ old('category') == '4' ? 'selected' : ''}} >Technology</option>
            </select>

            @error('category')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo">

            @error('photo')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="news" class="form-label">News</label>
            <textarea class="form-control @error('news') is-invalid @enderror" id="news" rows="3" name="news">{{ old('news') }}</textarea>

            @error('news')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
@endsection