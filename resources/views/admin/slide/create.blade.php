@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm Slide</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('add-slide-admin') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default">Ảnh slide</label>
                <input type="file" class="form-control" id="basic-default" placeholder="" name="Image_Slide" />
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Thứ tự</label>
              <input type="number" class="form-control" id="basic-default-fullname" placeholder="" name="Order_slide" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Trạng thái</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="IsActive">
                        <option value="1">Is Active</option>
                        <option value="0">No Active</option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Thêm slide </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('slide-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
