@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm phim</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update-movie-admin',['id'=>$movie->id])}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên phim</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $movie->title }}" name="title" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Đạo diễn</label>
                <input type="text" class="form-control" id="basic-default" value="{{ $movie->director }}" name="director"/>
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Thể loại</label>
              <select class="form-select" id="exampleFormControlSelect1" name="genres[]" multiple aria-label="Select genre">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @if(in_array($genre->id, $movie->genres->pluck('id')->toArray())) selected @endif>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Thời gian</label>
                <input type="number" class="form-control" id="basic-default" value="{{ $movie->duration }}" name="time"/>
              </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default">Trạng thái</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
                        <option value="nowshowing" {{ $movie->status == 'nowshowing' ? 'selected' : '' }}>Now Showing</option>
                        <option value="upcoming" {{ $movie->status == 'upcoming' ? 'selected' : '' }}>Up Coming</option>
                    </select>
                </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Ngày phát hành</label>
                <input type="date" class="form-control" id="basic-default" value="{{ $movie->release_date }}" name="release_date"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Banner</label>
                @if($movie->banner_url)
                    <div>
                        <img src="{{ asset('source/website/images/' . $movie->banner_url) }}" alt="Current Banner" style="width: 150px; height: auto;">
                    </div>
                @endif
                <input type="file" class="form-control" id="basic-default" name="banner_url" />
                <div class="form-text">Leave blank if you do not wish to change the banner.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Banner Slide</label>
                @if($movie->banner_doc)
                    <div>
                        <img src="{{ asset('source/website/images/' . $movie->banner_doc) }}" alt="Current Banner" style="width: 150px; height: auto;">
                    </div>
                @endif
                <input type="file" class="form-control" id="basic-default" name="banner_url" />
                <div class="form-text">Leave blank if you do not wish to change the banner.</div>
            </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Sao</label>
                <input type="number" class="form-control" id="basic-default" value="{{ $movie->Star }} name="Star"/>
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Chi tiết</label>
              <textarea class="form-control" id="editor" name="description">
                {{ $movie->description }}
              </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('movie-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
@section('custom-js')
{{-- <script src="{{asset('source\ckeditor\ckeditor.js')}}"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
<script src="{{asset('source\admin\assets\ckeditor5-build-classic\ckeditor.js')}}"></script>


<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>

@endsection
