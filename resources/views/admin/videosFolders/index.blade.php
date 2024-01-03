@extends('admin.layouts/adminlayout')


@section('title', 'All Videos')
@section('adminlayout')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<div class="container" style="height:auto !important">

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                    <div class="d-flex justify-content-between">

                        <h2 class="mb-2">All Vidoes</h2>
                        <p style="float: right"><a class="btn btn-outline-primary"
                        href="{{ route("create.videos") }}"><i class="fas fa-plus"></i> New Video</a>
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive"
                        style="height: auto !important;overflow-y:hidden !important;padding-bottom: 20px !important">
                        <table id="myTable" class="table table-hover">
                            <thead class="">
                                <tr>
                                    <th style="width:auto !important">s/n</th>
                                    <th style="width:auto !important">Title</th>
                                    <th style="width:auto !important">Status</th>
                                    <th style="width:auto !important">Action</th>
                                </tr>
                            </thead>
                            @if($videos)
                            <tbody>
                                @foreach ($videos as $video)

                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>
                                        <p>{{ Str::title($video->title) }}</p>

                                        <div class="btn-group">
                                            <a title="view {{ ucwords($video->slug) }}"
                                            href="{{ route("show.videos", $video->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($video->status)
                                            <a href="{{ route("draft.videos", $video->id) }}" class="btn
                                                btn-dark btn-sm">
                                               Draft
                                            </a>
                                            @else
                                            <a href="{{ route("activate.videos", $video->id) }}" class="btn
                                                btn-success btn-sm">
                                                Activate
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($video->status )
                                        <span class="btn btn-success">Active</span>
                                        @else
                                        <span class="btn btn-info">Draft</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                                <a title="Edit" href="{{ route("edit.videos", $video->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a onclick="return confirm('Are you sure')" 
                                                    href="{{ route("destroy.videos", $video->id) }}" 
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            @else

                            <p class="lead">This is awkward, try again later</p>
                            @endif
                        </table>
                        @if ($videos->hasPages())
                        <div class="pagination-wrapper text-dark">
                            {{ $videos->links() }}
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


@endsection
@section('scripts')
<script src="{{ asset('backend/assets/js/core/jquery.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
    $(function(){
        $(document).on('click', '#delete', function(e){
          e.preventDefault();
          var link = $(this).data("id");
          console.log({link});

          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              if($("#delete").submit()){
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            }
          })
        })

      })
</script>



@endsection
