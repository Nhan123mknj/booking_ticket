

@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý ghế</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-seat') }}"><i class="bx bx-plus me-1"></i> Thêm mới ghế</a>
            </div>

        </div>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <div class="demo-inline-spacing">
            <div class="btn-group" id="dropdown-icon-demo" style="padding-left: 20px;">
              <button style="background-color: #696cff" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bx bx-menu"></i> Rạp
              </button>

            <ul class="dropdown-menu">
                @foreach ($cinemas as $cinema)
                <li>
                    <a href="{{ route('seat-cinema', $cinema->id) }}" class="dropdown-item d-flex align-items-center">
                        <i class="bx bx-chevron-right scaleX-n1-rtl"></i> {{ $cinema->name }}
                    </a>
                </li>
            @endforeach
            </ul>
            </div>
          </div>
        <h5 class="card-header">  </h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>

                        <th>Tên ghế</th>
                        <th>Trạng thái</th>
                        <th>Giá</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                    $perPage = $seats->perPage();
                    $currentPage = $seats->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;
                @endphp
                    @foreach ($seats as $seat)
                        <tr>
                            <td>{{ $i++ }}</td>

                            <td>Ghế {{ $seat->number }}</td>
                            <td>{{ $seat->status == 0 ? 'Trống' : 'Đã đặt' }}</td>
                            <td>{{ $seat->price }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('edit-seats-admin',['id'=>$seat->id]) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Sửa
                                        </a>
                                        <a class="dropdown-item" href="{{ route('delete-seat-admin',['id'=>$seat->id]) }}">
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
        {{ $seats->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

