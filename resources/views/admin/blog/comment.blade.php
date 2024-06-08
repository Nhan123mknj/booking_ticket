

@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý Comments</h4>


      <!-- Basic Bootstrap Table -->
      <div class="card">
        {{-- <h5 class="card-header"> <form action="{{ route('search-comment') }}" method="POST" class="search-bar">
            @csrf
            <div class="search">
                <button type="submit" name="search_comments"><span class="search-icon material-symbols-outlined">search</span>
                </button>
                <input name="keyword_submit" type="search" class="search-input" placeholder="Type to Search...">
              </div>
          </form> </h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên tác giả</th>
                {{-- <th>Số điện thoại</th> --}}
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Chi tiết </th>
                <th>Trạng thái</th>
                <th>Kích hoạt</th>
                <th>Chức năng</th>
              </tr>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $comments->perPage();
                    $currentPage = $comments->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;

                @endphp
                @foreach ($comments as $item)

                <tr>
                    <td>

                        <span class="fw-smail">{{ $i++ }}</span>
                      </td>
                      <td>{{ $item->name }}</td>

                      {{-- <td>{{ $item->phone }}</td> --}}
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->created_date }}</td>
                      <td>{{ $item->detail }}</td>
                      <td>
                          @if ($item->is_active == 1)
                              <span class="badge bg-label-success">Đã kích hoạt</span>
                          @else
                              <span class="badge bg-label-warning">Chưa kích hoạt</span>
                          @endif
                      </td>
                      <td>
                          <a href="{{ route('toggle_comment.active',$item->comment_id ) }}" class="btn btn-{{ $item->is_active ? 'danger' : 'success' }}" >
                              {{ $item->is_active ? 'Không kích hoạt' : 'Kích hoạt' }}
                          </a>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">

                            <a class="dropdown-item" href="{{ route('delete-comment-admin',$item->comment_id) }}"
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
        {{ $comments->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>


@endsection

