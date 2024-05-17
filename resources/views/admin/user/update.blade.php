@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Cập nhật người dùng</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('update-user-admin',['id'=>$user->id])}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên người dùng</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $user->name }}" name="name" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Mật khẩu</label>
                <input type="password" class="form-control" id="basic-default" value="" name="password"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Quyền</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="role">
                    <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
                    <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Customer</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Số điện thoại</label>
                <input type="number" class="form-control" id="basic-default" value="{{ $user->phone}}" name="phone"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Ảnh người dùng</label>
                @if($user->images)
                    <div>
                        <img src="{{ asset('source/website/images/' . $user->images) }}" alt="Current Banner" style="width: 150px; height: auto;">
                    </div>
                @endif
                <input type="file" class="form-control" id="basic-default" name="images" />
                <div class="form-text">Leave blank if you do not wish to change the banner.</div>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('user-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection

