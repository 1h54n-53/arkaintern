@extends('layouts.app')

@section('body')

<body>
    <section class="gallery-title">
      <h1>Gallery</h1>
    </section>
    <div class="gallery">
        <div class="gallery-item">
            <img src="{{ url("assets/gallery/image-1.jpg") }}" alt="Image 1">
          </div>
          <div class="gallery-item">
            <img src="{{ url("assets/gallery/image-2.jpg") }}" alt="Image 2">
          </div>
          <div class="gallery-item">
            <img src="{{ url("assets/gallery/image-3.jpg") }}" alt="Image 3">
          </div>
          <div class="gallery-item">
            <img src="{{ url("assets/gallery/image-4.jpg") }}" alt="Image 4">
          </div>
          <div class="gallery-item">
            <img src="{{ url("assets/gallery/image-5.jpg") }}" alt="Image 5">
          </div>
          <div class="gallery-item">
            <img src="{{ url("assets/gallery/image-6.jpg") }}" alt="Image 6">
          </div>
          <div class="gallery-item">
            <img src="{{ url("assets/gallery/image-7.jpg") }}" alt="Image 7">
          </div>
    </div>
  </body>

@endsection