@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm bài viết</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('add-blog-admin1') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Title</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="" name="title" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tóm tắt</label>
                <input type="text" class="form-control" id="basic-default" placeholder="" name="abtract"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Banner Blog</label>
                <input type="file" class="form-control" id="basic-default" placeholder="" name="images"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tác giả</label>
                <input type="text" class="form-control" id="basic-default" placeholder="" name="author"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Trạng thái gần đây</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="is_recent">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Không kích hoạt</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Thứ tự</label>
                <input type="number" class="form-control" id="basic-default" placeholder="" name="post_order"/>
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Nội dung</label>
              <textarea class="form-control" id="editor" name="contents"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm bài viết </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('blog-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
@section('custom-js')

<script src="{{asset('source\admin\assets\ckeditor5-build-classic\ckeditor.js')}}"></script>

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ),
        {
            ckfinder:
            {
                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
            }
        } )
            .catch( error => {
                console.error( error );
            } );
</script>

@endsection
