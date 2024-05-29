

@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý liên hệ</h4>


      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">  </h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Chi tiết</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
              </tr>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $contact->perPage();
                    $currentPage = $contact->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;

                @endphp
                @foreach ($contact as $item)

                <tr>
                    <td>

                        <span class="fw-smail">{{ $i++ }}</span>
                      </td>
                      <td>{{ $item->Name }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ Str::limit($item->message,78) }}</td>
                      <td>
                          @if ($item->IsRead == 1)
                              <span class="badge bg-label-success">Đã đọc</span>
                          @else
                              <span class="badge bg-label-warning">Chưa đọc</span>
                          @endif
                      </td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('show-contact-admin',$item->id) }}">
                                <i class='bx bx-show'></i> Show
                              </a>
                            <a class="dropdown-item" href="{{ route('delete-contact-admin',$item->id) }}"
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
        {{ $contact->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

