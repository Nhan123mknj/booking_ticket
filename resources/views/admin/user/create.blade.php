@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm Người Dùng</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('add-user-admin') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Email</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="" name="email" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Tên người dùng</label>
                <input type="text" class="form-control" id="basic-default" placeholder="" name="name"/>
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Mật khẩu</label>
              <input type="password" class="form-control" id="basic-default" placeholder="" name="password"/>
            </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Ảnh đại diện</label>
                <input type="file" class="form-control" id="basic-default" placeholder="" name="images" />
              </div>
            <button type="submit" class="btn btn-primary">Thêm người dùng </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('user-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
