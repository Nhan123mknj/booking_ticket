

@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý lịch chiếu : {{ $movie->title }}</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-showtime-admin1',['movieId'=>$movie->id]) }}"><i class="bx bx-plus me-1"></i> Thêm mới lịch</a>
            </div>

        </div>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <div class="demo-inline-spacing">
        </div>
        <div style="
        padding: 20px;
    ">
            <h4 style="
            padding-bottom: 20px;
        ">Lịch chiếu :</h4>
            <h5 style="
            color: red;
            text-transform: uppercase;
            padding-bottom: 20px;
        "> PHIM {{ $movie->title }} </h5>
        <h5> Đạo diễn {{ $movie->director }} </h5>
        </div>
        <hr >
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Rạp</th>
                        <th>Ngày chiếu</th>
                        <th>Giờ chiếu</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                     $perPage = $showtimes->perPage();
                    $currentPage = $showtimes->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;
                @endphp
                    @foreach ($movie->showtimes as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->theater->name }}</td>
                            <td>{{ $item->Date_show }}</td>
                            <td>{{ $item->Time_show }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('edit-showtime-admin1',['id'=>$item->id]) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Sửa
                                        </a>
                                        <a class="dropdown-item" href="{{ route('delete-showtime-admin',['id'=>$item->id]) }}">
                                            <i class="bx bx-trash me-1"></i> Xóa
                                        </a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $showtimes->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

