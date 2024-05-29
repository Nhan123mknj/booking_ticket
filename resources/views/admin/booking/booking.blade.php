

@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý booking</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-booking-admin') }}"><i class="bx bx-plus me-1"></i> Thêm mới booking</a></div>
        </div>


      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">  </h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên người đặt</th>
                <th>Email</th>
                <th>Phim chiếu</th>
                <th>Lịch chiếu</th>
                <th>Rạp chiếu</th>
                <th>Ghế chiếu</th>
                <th>Thời gian book</th>
                <th>Chức năng</th>
              </tr>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $booking->perPage();
                    $currentPage = $booking->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;

                @endphp
                @foreach ($booking as $item)

                <tr>
                    <td>

                        <span class="fw-smail">{{ $i++ }}</span>
                      </td>
                      <td>{{ $item->user->name }}</td>
                      <td>{{ $item->user->email }}</td>
                      <td>{{ $item->showtime->movie->title }}</td>
                      <td>{{ $item->showtime->Time_Show }}</td>
                      <td>{{ $item->showtime->theater->name }}</td>
                      <td>{{ $item->seat->number }}</td>
                      <td>{{ $item->booking_time }}</td>

                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">

                              <a class="dropdown-item" href="{{ route('edit-booking-admin',$item->id) }}">
                                <i class='bx bx-edit-alt me-1'></i> Cập nhật
                              </a>
                            <a class="dropdown-item" href="{{ route('delete-booking-admin',$item->id) }}"
                              ><i class="bx bx-trash me-1"></i> Xóa</a
                            >
                          </div>
                        </div>
                      </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        {{ $booking->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

