@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Chi tiết bài viết</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="" action="" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Title</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $blog->title }}" name="title" readonly/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tóm tắt</label>
                <input type="text" class="form-control" id="basic-default" value="{{ $blog->abtract }}" name="abtract"readonly/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Banner blog</label>
                @if($blog->images)
                    <div>
                        <img src="{{ asset('source/website/images/blog/' . $blog->images) }}" alt="Current Banner" style="width: 150px; height: auto;">
                    </div>
                @endif

            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tác giả</label>
                <input type="text" class="form-control" id="basic-default" value="{{ $blog->author }}" name="author" readonly/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Trạng thái gần đây</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="is_recent" disabled>
                    <option value="0" {{ $blog->is_recent == '0' ? 'selected' : '' }}>Kích hoạt</option>
                    <option value="1" {{ $blog->is_recent == '1' ? 'selected' : '' }}>Không kích hoạt</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Thứ tự</label>
                <input type="number" class="form-control" id="basic-default" value="{{ $blog->post_order }}" name="post_order" readonly/>
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Nội dung</label>
              <textarea class="form-control" id="editor" name="contents" disabled>
                {{ $blog->contents }}
              </textarea>
            </div>

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
            },

        })
        .catch( error => {
            console.error( error );
        });
</script>

@endsection
