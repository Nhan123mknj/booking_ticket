@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý người dùng</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-user-admin') }}"><i class="bx bx-plus me-1"></i> Thêm người dùng</a></div>
        </div>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">  </h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Khóa</th>
                <th>Trạng thái</th>
                <th>Quyền</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $user->perPage();
                    $currentPage = $user->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;
                @endphp
                @foreach ($user as $item)

                <tr>
                    <td>

                      <span class="fw-smail">{{ $i++ }}</span>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>

                        <a href="{{ route('toggle.lock',$item->id) }}" class="btn btn-{{ $item->is_locked ? 'success' : 'danger' }}" >
                            {{ $item->is_locked ? 'Mở Khóa' : 'Khóa' }}
                        </a>
                    </td>


                    <td>
                        @if ($item->is_actived == 1)
                            <span class="badge bg-label-success">Đã kích hoạt</span>
                        @else
                            <span class="badge bg-label-warning">Chưa kích hoạt</span>
                        @endif
                    </td>
                    @if ($item->role == 1)
                    <td>Admin</td>
                    @elseif($item->role == 2)
                    <td>Customer</td>
                    @else
                    <td>User</td>
                    @endif
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('edit-user-admin',$item->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                            <a class="dropdown-item" href="{{ route('enable.user',$item->id) }}">
                                <i class="fa-solid fa-user-{{ $item->is_actived ? 'xmark' : 'check' }}"></i> {{ $item->is_actived ? 'disable' : 'kích hoạt' }}

                            </a>
                          <a class="dropdown-item" href="{{ route('delete-user-admin',$item->id) }}"
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
        {{ $user->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

