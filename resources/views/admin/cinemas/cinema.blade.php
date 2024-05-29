

@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý rạp</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-cinema-admin') }}"><i class="bx bx-plus me-1"></i> Thêm mới rạp</a></div>
        </div>


      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">  </h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên rạp</th>
                <th>Tỉnh</th>
                <th>Địa chỉ</th>
                <th>Chức năng</th>
              </tr>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $cinema->perPage();
                    $currentPage = $cinema->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;

                @endphp
                @foreach ($cinema as $item)

                <tr>
                    <td>

                        <span class="fw-smail">{{ $i++ }}</span>
                      </td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->tinhThanh->ten_tinh }}</td>
                      <td>{{ $item->location }}</td>

                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">

                              <a class="dropdown-item" href="{{ route('edit-cinema-admin',$item->id) }}">
                                <i class='bx bx-edit-alt me-1'></i> Cập nhật
                              </a>
                            <a class="dropdown-item" href="{{ route('delete-cinema-admin',$item->id) }}"
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
        {{ $cinema->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

