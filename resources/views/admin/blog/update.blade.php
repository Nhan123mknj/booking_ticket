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
        <form method="POST" action="{{ route('update-blog-admin',['id'=>$blog->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Title</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $blog->title }}" name="title" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tóm tắt</label>
                <input type="text" class="form-control" id="basic-default" value="{{ $blog->abtract }}" name="abtract"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Banner blog</label>
                @if($blog->images)
                    <div>
                        <img src="{{ asset('source/website/images/blog/' . $blog->images) }}" alt="Current Banner" style="width: 150px; height: auto;">
                    </div>
                @endif
                <input type="file" class="form-control" id="basic-default" name="images" />
                <div class="form-text">Leave blank if you do not wish to change the banner.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tác giả</label>
                <input type="text" class="form-control" id="basic-default" value="{{ $blog->author }}" name="author"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Trạng thái gần đây</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="is_recent">
                    <option value="0" {{ $blog->is_recent == '0' ? 'selected' : '' }}>Kích hoạt</option>
                    <option value="1" {{ $blog->is_recent == '1' ? 'selected' : '' }}>Không kích hoạt</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Thứ tự</label>
                <input type="number" class="form-control" id="basic-default" value="{{ $blog->post_order }}" name="post_order"/>
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Nội dung</label>
              <textarea class="form-control" id="editor" name="contents">
                {{ $blog->contents }}
              </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit </button>
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

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),
        {
            plugins: [ 'ImageResize', 'ImageUpload' ],
            ckfinder:
            {
                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
            },
            image: {
                resizeOptions: [
                    {
                        name: 'resizeImage:50',
                        label: '50%',
                        value: '50'
                    },
                    {
                        name: 'resizeImage:100',
                        label: '100%',
                        value: '100'
                    },
                    {
                        name: 'resizeImage:200',
                        label: '200%',
                        value: '200'
                    }
                ],
                toolbar: [
                    'imageResize',
                    '|',
                    'imageStyle:alignLeft',
                    'imageStyle:alignCenter',
                    'imageStyle:alignRight'
                ]
            }
        })
        .catch( error => {
            console.error( error );
        });
</script>

@endsection