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
                        <h2 class="mb-2">@yield('title')</h2>
                    </div>
                    <div class="row">

                        @if(!isset($seriesEdit->id))
                        {{-- create genre form --}}
                        <div class="col-md-12">
                            <form role="form" method="POST" action="{{ route('video.series.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text"
                                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                                                placeholder="Video Series Title" name="title" aria-label="text"
                                                value="{{ old('title') }}">
                                            @error('title')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <Textarea
                                                class="form-control form-control-lg @error('description') is-invalid @enderror"
                                                placeholder="Video Series description" name="description"
                                                aria-label="text" value="{{ old('description') }}"></Textarea>
                                            @error('description')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-info btn-lg w-100 mt-4 mb-0">Save</button>
                                    </div>
                            </form>
                        </div>
                        @else
                        {{-- update ratings form --}}
                        <div class="col-md-12">
                            <form role="form" method="POST" action="{{ route('video.series.update', $seriesEdit) }}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Video Series Title </label>
                                            <input type="text"
                                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                                                name="title" aria-label="text" value="{{ old('title', $seriesEdit->title) }}">
                                            @error('title')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <Textarea
                                                class="form-control form-control-lg @error('description') is-invalid @enderror"
                                                placeholder="Video Series description" name="description"
                                                aria-label="text" value="{{ old('description') }}">{{ $seriesEdit->description }}</Textarea>
                                            @error('description')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-lg bg-gradient-warning btn-lg w-100 mt-4 mb-0">Update</button>
                                </div>
                            </form>
                        </div>

                        @endif

                        {{-- display all ratings --}}
                        <div class="col-md-12">
                            <div class="table-responsive p-3">
                                @if($series->count())

                                <table class="table table-hover" width="100%">
                                    <tr>
                                        <th>s/n</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($series as $series)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::title($series->title) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('video.series.details', $series) }}" class="btn btn-info">View</a>
                                                <a href="{{ route('video.series.edit', $series) }}" class="btn btn-primary">Edit</a>
                                                <a onClick="return confirm('Are you sure ? ')" href="{{ route('video.series.delete', $series) }}" class="btn btn-danger">Delete</a>
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
