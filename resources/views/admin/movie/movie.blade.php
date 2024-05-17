@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý phim</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-movie-admin') }}"><i class="bx bx-plus me-1"></i> Thêm mới phim</a></div>
        </div>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">  </h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên phim</th>
                <th>Thể loại</th>
                <th>Trạng thái</th>
                <th>Banner</th>
                <th>Đạo diễn</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $movies->perPage();
                    $currentPage = $movies->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;
                @endphp
                @foreach ($movies as $item)

                <tr>
                    <td>

                      <span class="fw-smail">{{ $i++ }}</span>
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @foreach($item->genres as $genre)
                        {{ $loop->first ? '' : ', ' }}{{ $genre->name }}
                        @endforeach
                    </td>
                    <td><span class="badge bg-label-primary me-1">{{ $item->status }}</span></td>
                    <td><img style = "width: 100px;
                        height: auto;"src="{{ asset('source/website/images/' . $item->banner_url) }}" alt="movie_img" /></td>
                    <td>{{ $item->director }}</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('edit-movie-admin', ['id' => $item->id]) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                          <a class="dropdown-item" href="{{ route('delete-movie-admin',['id'=>$item->id]) }}"
                            ><i class="bx bx-trash me-1"></i> Delete</a
                          >
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        {{ $movies->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

