@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Chi tiết liên hệ</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form  action="" enctype="multipart/form-data">

            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên</label>
              <input type="text" class="form-control" id="basic-default-fullname" value="{{ $contact->Name }}" name="title"readonly />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Email</label>
                <input type="text" class="form-control" id="basic-default-fullname" value="{{ $contact->email }}" name="title"readonly />
              </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default">Thời gian tạo</label>
                <input type="text   " class="form-control" id="basic-default" value="{{ $contact->Created_Date }}" name="time" readonly/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Chi tiết</label>
                <textarea class="form-control" name="description" readonly rows="10">{{ $contact->message }}</textarea>
            </div>

            <a style="margin-left: 20px;"class="btn btn-secondary" href="{{ route('contact-admin') }}"> BACK</a></div>
        </form>
        </div>
      </div>
    </div>

  </div>
@endsection
