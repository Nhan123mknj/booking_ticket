@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm rạp</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('add-cinema-admin1') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên rạp</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="" name="name" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tỉnh thành</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="tinhthanh">
                    @foreach ($tinhthanh as $item)
                    <option value="{{ $item->id }}">{{ $item->ten_tinh }}</option>
                    @endforeach

                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Địa chỉ</label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="" name="location" />
              </div>
            <button type="submit" class="btn btn-primary">Thêm rạp chiếu </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('cinema-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
