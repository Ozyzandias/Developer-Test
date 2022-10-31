@extends('template')
@section('content')

  <div class="container-fluid">
    <h2 class="modtitle">IMAGE MODETARION</h1>
    <div id="content" class="row" data-masonry='{"percentPosition": true }'>
      @foreach($images as $img)
      <div class="col-sm-6 col-md-4 col-lg-2 mb-4">
        <div class="card" id="{{ $img->ID_Image}}">
          <img id="{{ $img->ID_Image }}-img" src="/{{ $img->tst_name}}" />
          <div class="card-body">
            <h5 id="{{ $img->ID_Image }}-title" class="card-title">{{ $img->tst_Title }}</h5>
            <p id="{{ $img->ID_Image }}-desc" class="card-text">{{ $img->tst_Description }}</p>
            <a href="/moderation/approve/{{ $img->ID_Image }}" class="btn allow" id="{{ $img->ID_Image }}">ALLOW</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@stop
@section('customJS')
<script src="/assets/js/main.js"></script>
@stop
