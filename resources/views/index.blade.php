@extends('template')
@section('content')
  <div class="container-fluid">
    <div id="content" class="row" data-masonry='{"percentPosition": true }'>
      @foreach($images as $img)
      <div class="col-sm-6 col-md-4 col-lg-2 mb-4">
        <div class="card" id="{{ $img->ID_Image}}">
          <img class="imgEvent" id="{{ $img->ID_Image }}-img" src="/{{ $img->tst_name}}" />
          <div class="card-body">
            <h5 id="{{ $img->ID_Image }}-title" class="card-title">{{ $img->tst_Title }}</h5>
            @if($img->tst_author == Null)
            @else
            <p id="{{ $img->ID_Image }}-author" class="card-text card-author">Author: {{ $img->tst_author }}</p>
            @endif
            <p id="{{ $img->ID_Image }}-desc" class="card-text">{{ $img->tst_Description }}</p>
            <span id="{{ $img->ID_Image }}-counter" class="counter"><i id="{{ $img->ID_Image }}-add" class="fa-solid fa-heart favAdd"></i> {{ $img->tst_Counter }}</span>
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
