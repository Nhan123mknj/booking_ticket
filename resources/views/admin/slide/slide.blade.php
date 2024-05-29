@extends('admin.admin')
@section('content_Admin')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="display: flex;justify-content: space-between;">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light"> </span> Quản lý slide</h4>
            <div style="margin: 10px;">
                <a class="btn btn-primary" href="{{ route('add-slide-admin') }}"><i class="bx bx-plus me-1"></i> Thêm mới slide</a></div>
        </div>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">  </h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Ảnh Slide</th>
                <th>Thứ tự</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $perPage = $slides->perPage();
                    $currentPage = $slides->currentPage();
                    $i = ($currentPage - 1) * $perPage + 1;
                @endphp
                @foreach ($slides as $item)

                <tr>
                    <td>
                      <span class="fw-smail">{{ $i++ }}</span>
                    </td>
                    <td><img style = "width: 100px;
                        height: auto;"src="{{ asset('source/website/images/slide/' . $item->Image_Slide) }}" alt="movie_img" />
                        </td>

                    <td>{{ $item->Order_slide }}</td>
                    @if ( $item->IsActive ==1 )
                        <td><span class="badge bg-label-primary me-1">Đã Active</span></td>
                    @else
                        <td><span class="badge bg-label-primary me-1">Chưa Active</span></td>
                    @endif
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('edit-slide-admin', ['id' => $item->id]) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                          <a class="dropdown-item" href="{{ route('delete-slide-admin',['id'=>$item->id]) }}"
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
        {{ $slides->links('vendor.pagination.admin') }}
      </div>
      <!--/ Basic Bootstrap Table -->


      <!--/ Responsive Table -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

@endsection

