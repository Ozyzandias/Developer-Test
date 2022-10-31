@extends('template')
@section('content')
      <div class="form-login w-100 m-auto">
        <form action="{{ route('uploadmethod') }}" method="post" enctype="multipart/form-data">
          @csrf
          <h1 class="title-login">UPLOAD YOUR IMAGE</h1>
          @if (session('status') && session('status') == 'success')
            <div class="form-group">
              <label class="success_msg">Image Uploaded</label>
            </div>
          @endif
          <div class="groupinp">
            <p>UPLOAD IMAGE</p>
            <img id="previmg" class="prev" />
            <div id="inputfile">
              <input id="upfile" name="imginput" type="file" value="upload" onchange="fileInputRep(this)" />
            </div>
            <div id="btn-file" class="btn-file" name="img">CHOOSE FILE</div>
          </div>
          <div class="groupinp">
              <p>TITLE</p>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="IMAGE TITLE" value="{{ old('title') }}">
          </div>
          <div class="groupinp">
              <p>DESCRIPTION</p>
              <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="IMAGE DESCRIPTION" value="{{ old('description') }}">
          </div>
          <button class="w-100 btn btn-lg sub" type="submit">UPLOAD</button>
        </form>
      </div>
@stop
@section('customJS')
<script src="/assets/js/form.js"></script>
@stop
