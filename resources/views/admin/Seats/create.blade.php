@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm ghế</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('add-post-admin1') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên ghế</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="" name="name" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Rạp</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="cinema">
                    @foreach ($cinemas as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default">Trạng thái</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
                        <option value="0">Trống</option>
                        <option value="1">Đã đặt</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Giá</label>
                <input type="number" class="form-control" id="basic-default-fullname" placeholder="" name="price" />
              </div>
            <button type="submit" class="btn btn-primary">Thêm ghế </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('seat-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection

