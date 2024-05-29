@extends('admin.admin')
@section('content_Admin')
<div class="row">
    <div class="col-md-6"style="
    padding-top: 20px;
    margin: 0 auto;
">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Thêm lịch chiếu</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('add-showtime-admin1',['movieId'=>$movie->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default">Rạp</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="cinema">
                    @foreach ($cinema as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Chọn ngày chiếu</label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="" name="Date_show" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default">Chọn giờ chiếu</label>
                <input type="time" class="form-control" id="basic-default-fullname" placeholder="" name="Time_show" />
              </div>
            <button type="submit" class="btn btn-primary">Thêm lịch chiếu </button>
            <a style="
            margin-left: 20px;
        "class="btn btn-secondary" href="{{ route('showtime-admin',['movieId'=>$movie->id]) }}"> BACK</a></div>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        </div>
      </div>
    </div>

  </div>
@endsection

