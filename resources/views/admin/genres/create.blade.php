@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm thể loại</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('add-genres-admin1') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên thể loại</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="" name="name" />
            </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Mô tả thể loại</label>
                <textarea class="form-control" id="basic-default" name="description"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Thêm thể loại </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('genres-admin') }}"> BACK</a></div>
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
