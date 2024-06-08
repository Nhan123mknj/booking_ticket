

@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý bài viết</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-blog-admin') }}"><i class="bx bx-plus me-1"></i> Thêm mới bài viết</a></div>
        </div>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header"> <form action="{{ route('search-blog') }}" method="POST" class="search-bar">
            @csrf
            <div class="search">
                <button type="submit" name="search_blog"><span class="search-icon material-symbols-outlined">search</span>
                </button>
                <input name="keyword_submit" type="search" class="search-input" placeholder="Type to Search...">
              </div>
          </form> </h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Title</th>

                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Tác giả</th>
                <th>Số comment</th>
                <th>Trạng thái</th>
                <th>Kích hoạt</th>
                <th>Chức năng</th>
              </tr>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $blog->perPage();
                    $currentPage = $blog->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;

                @endphp
                @foreach ($blog as $item)

                <tr>
                    <td>

                        <span class="fw-smail">{{ $i++ }}</span>
                      </td>
                      <td>{{ Str::limit($item->title, 20 ) }}</td>

                      <td>{{ Str::limit($item->depict, 5) }}</td>
                      <td><img style = "width: 100px;
                        height: auto;"src="{{ asset('source/website/images/blog/' . $item->images) }}" alt="movie_img" /></td>
                      <td>{{ $item->author }}</td>
                      <td>{{ $item->comments->count() }}</td>
                      <td>
                          @if ($item->is_active == 1)
                              <span class="badge bg-label-success">Đã kích hoạt</span>
                          @else
                              <span class="badge bg-label-warning">Chưa kích hoạt</span>
                          @endif
                      </td>
                      <td>
                          <a href="{{ route('toggle.active',$item->id) }}" class="btn btn-{{ $item->is_active ? 'danger' : 'success' }}" >
                              {{ $item->is_active ? 'Không kích hoạt' : 'Kích hoạt' }}
                          </a>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('show-detail-blog',$item->id) }}">
                                <i class="bx bx-show"></i> Show
                            </a>
                              <a class="dropdown-item" href="{{ route('edit-blog-admin',$item->link) }}">
                                  <i class="bx bx-edit-alt me-1"></i> Edit
                              </a>
                            <a class="dropdown-item" href="{{ route('delete-blog-admin',$item->id) }}"
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
        {{ $blog->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

