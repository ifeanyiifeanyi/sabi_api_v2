@extends('admin.layouts/adminlayout')


@section('title', 'Video Series')
@section('adminlayout')

<div class="container-fluid py-4" style="height:auto">

    <div class="row mt-4" style="height:100vh">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-2">{{ $seriesTitle }}</h4>
                    </div>
                    <div class="row">


                        {{-- display all ratings --}}
                        <div class="col-md-12">
                            <div class="table-responsive p-3">
                                @if($videoDetails->count())

                                    <table class="table table-hover" width="100%">
                                        <tr>
                                            <th>s/n</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($videoDetails as $series)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Str::title($series->title) }}</td>
                                            <td>{{ $series->status ? "Active" : "Draft" }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="" class="btn btn-info">Details</a>
                                                   
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </table>



                                @else

                                <p class="alert alert-info">No Video Series Available</p>
                                @endif
                            </div>
                        </div>
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