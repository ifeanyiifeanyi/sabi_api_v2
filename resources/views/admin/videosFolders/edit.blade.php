@extends('admin.layouts/adminlayout')


@section('title', 'Edit Video')
@section('mystyles')
<style>
    .fa-cog,
    .l {
        font-size: 15px !important;
        color: #fff !important;
    }
</style>
@endsection
@section('adminlayout')

<div class="container-fluid py-4" style="height:auto !important">

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <p><a class="btn btn-outline-primary" href="{{ route('videos') }}"><i
                        class="fas fa-arrow-left"></i> Back To Video(s)</a></p>
                    <div class="d-flex justify-content-between">

                        <h2 class="mb-2">{{ ucwords($video->title) }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="" id="update_videos" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Video Title </label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('title') is-invalid @enderror"
                                        placeholder="Title" name="title" aria-label="text" value="{{ old('title', $video->title) }}">
                                    @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                <label>Select Video Category </label>
                                    <select
                                        class="form-control form-control-lg @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        <option>Select Category</option>
                                        @if(count($categories) > 0)

                                        @foreach ($categories as $category)
                                        <option {{ $video->category_id == $category->id ? "selected" : ""
                                            }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                        @else
                                        <option value="">Not Available</option>
                                        @endif
                                    </select>
                                    @error('category_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Duration In Number </label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('length') is-invalid @enderror"
                                        placeholder="Duration In Number" name="length" aria-label="text"
                                        value="{{ old('length', $video->length) }}">
                                    @error('length')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Select Genre </label>
                                    <select class="form-control form-control-lg @error('genre_id') is-invalid @enderror"
                                        placeholder="Genre" name="genre_id">
                                        <option value="">Video Genre</option>
                                        @if ($genre)
                                        @foreach ($genre as $genre_value)
                                        <option {{ $video->genres_id == $genre_value->id ? "selected" : "" }}
                                            value="{{ $genre_value->id }}">{{ ucwords($genre_value->name) }}</option>

                                        @endforeach
                                        @else
                                        <option>No genre available</option>
                                        @endif
                                    </select>
                                    @error('genre_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Select Video Rating </label>
                                    <select
                                        class="form-control form-control-lg @error('rating_id') is-invalid @enderror"
                                        placeholder="Rating" name="rating_id">
                                        <option value="">Select Video Rating</option>
                                        @if ($ratings)
                                        @foreach ($ratings as $rating)
                                        <option {{ $video->rating_id == $rating->id ? "selected" : "" }} value="{{
                                            $rating->id }}">{{ $rating->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">No Rating Available</option>
                                        @endif
                                    </select>
                                    @error('rating_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Video Parental Control </label>
                                    <select
                                        class="form-control form-control-lg @error('parent_control_id') is-invalid @enderror"
                                        placeholder="Parential Control" name="parent_control_id">
                                        <option value="">Parental Control</option>
                                        @if ($parentControls)
                                        @foreach ($parentControls as $pc)
                                        <option {{ $video->parent_control_id == $pc->id ? "selected" : "" }} value="{{
                                            $pc->id }}">{{ $pc->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">No parental Control</option>
                                        @endif
                                    </select>
                                    @error('parent_control_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="video">Add Video</label>
                                    <input type="file" onchange="changeVideo(event)"
                                        class="form-control form-control-lg @error('video') is-invalid @enderror" name="video" id="video" aria-label="text" value="{{ $video->video}}">
                                    @error('video')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Current Video </label><br>
                                <video id="videoFile" src="{{ asset($video->videoFile->first()->file_path) }}" width="150px" height="100px"
                                    controls></video>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="thumbnail">Add Thumbnail</label>
                                    <input type="file" onchange="changeImg(event)" class="thumbnail" class="form-control form-control-lg @error('thumbnail') is-invalid @enderror"
                                        placeholder="Thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
                                    @error('thumbnail')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Current Video Thumbnail </label><br>
                                <img id="imgFile" src="{{ asset($video->thumbnail) }}" width="150px" height="100px"
                                    alt="" class="fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                <label>Short Video Description </label>
                                    <textarea name="short_description" class="form-control form-control-lg @error('short_description') is-invalid @enderror">{{ $video->short_description }}</textarea>
                                    @error('short_description')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                <label>Long Video Description </label>
                                    <textarea name="long_description"  class="form-control form-control-lg @error('long_description') is-invalid @enderror">{{ $video->long_description }}</textarea>
                                    @error('long_description')
                                    <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <input {{ $video->status ? "checked" : "" }} @error('status') is-invalid
                                            @enderror type="checkbox" name="status"
                                            id="status"> <label for="status">Status</label>
                                            @error('status')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 mt-2">
                            <div class="col-md-4">
                                <div class="mb-3">
                                        <div class="mb-3 form-check form-switch">
                                            <input {{ $video->is_series == 1 ? "checked" : "" }} @error('is_series') is-invalid @enderror class="form-check-input"
                                                type="checkbox" id="flexSwitchCheckDefaultSeries" name="is_series">
                                                <label
                                                class="form-check-label"
                                                for="flexSwitchCheckDefaultSeries"><b>Is Series</b></label>
                                            @error('is_series')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="series_id" id="series_id" class="form-control">
                                    <option value="" selected disabled>Select Video Series</option>
                                    @if($videoSeries->count())
                                        @foreach($videoSeries as $vs)
                                            <option {{ $video->series_id == $vs->id ? 'selected' : '' }}
                                                value="{{ $vs->id }}">{{ Str::title($vs->title) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="col-md-4">
                                        <div class="mb-3 form-check form-switch">
                                            <input {{ $video->is_free == 1 ? "checked" : "" }} @error('is_free') is-invalid @enderror class="form-check-input"
                                                type="checkbox" id="flexSwitchCheckDefault" name="is_free">
                                                <label
                                                class="form-check-label"
                                                for="flexSwitchCheckDefault"><b>Is Free</b></label>
                                            @error('is_free')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                        <div class="mb-3 form-check form-switch">
                                            <input {{ $video->subscription_required == 1 ? "checked" : "" }} @error('subscription_required') is-invalid @enderror class="form-check-input"
                                                type="checkbox" id="flexSwitchCheckDefault" name="subscription_required">
                                                <label
                                                class="form-check-label"
                                                for="flexSwitchCheckDefault"><b>Require Subscription</b></label>
                                            @error('subscription_required')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                        </div>


                    </div>
                        <div class="text-center">

                            <button id="btn1" type="submit"
                                class="btn bg-gradient-warning w-100 mt-4 mb-0">Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
@section('videoScripts')
// if video is series or not this function is used to manage it
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var isSeriesCheckbox = document.getElementById('flexSwitchCheckDefaultSeries');
        var seriesSelect = document.getElementById('series_id');

        // Initial state
        seriesSelect.style.display = isSeriesCheckbox.checked ? 'block' : 'none';

        // Toggle visibility on checkbox change
        isSeriesCheckbox.addEventListener('change', function () {
            seriesSelect.style.display = isSeriesCheckbox.checked ? 'block' : 'none';
        });
    });
</script>

// handle if series i will be updated if series is not available in this update
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initially disable the series_id dropdown if is_series is not checked
        var isSeriesCheckbox = document.getElementById('flexSwitchCheckDefaultSeries');
        var seriesIdDropdown = document.getElementById('series_id');

        if (!isSeriesCheckbox.checked) {
            seriesIdDropdown.disabled = true;
        }

        // Enable/disable series_id dropdown based on checkbox state
        isSeriesCheckbox.addEventListener('change', function () {
            seriesIdDropdown.disabled = !this.checked;
        });
    });
</script>


<script>
    function changeImg(event){
        let imgFile = document.querySelector("#imgFile");
        if(true){
            imgFile.src = URL.createObjectURL(event.target.files[0])
        }
    }

    function changeVideo(event){
        let videoFile = document.querySelector("#videoFile");
        if(true){
            videoFile.src = URL.createObjectURL(event.target.files[0])
        }
    }
</script>

<script src="{{ asset('backend/assets/js/core/jquery.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $("#update_videos").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);

        $.ajax({
            url: "{{ route('update.videos', $video->id) }}",
            method: "POST",
            data: fd,
            cache:false,
            processData: false,
            contentType:false,
            beforeSend: function () {
                    $('#btn1').html('<i class="fas fa-cog fa-spin"></i> <span class="l">Loading</span>');
                    $('#btn1').attr("disabled", true);
            },

            success: function(res){
                console.log(res);
                let data = res.error;
                if (data) {
                    $('#btn1').html('Update');
                    $('#btn1').attr("disabled", false);
                    $.each(data, function( index, value ) {
                        toastr.error(value);
                    });
                    return false;
                }
                if (res.success) {
                    $('#update_videos').trigger("reset");
                    $('#btn1').html('Update');
                    $('#btn1').attr("disabled", false);
                    Swal.fire(
                        'Created',
                        'Content update was successful',
                        'success'
                    );
                    setTimeout(function () {
                        $('#update_videos').trigger("reset");
                        $('#btn1').html('Update');
                        $('#btn1').attr("disabled", false);
                        window.location.href="{{ route('videos') }}";
                    }, 5000);
                }

            },
            error: function (res, ajaxOptions, thrownError) {
                // Catch any other errors and display a general error message
                toastr.error(res.statusText);
                console.log(res, res.status)
                $('#btn1').html('Save');
                $('#btn1').attr("disabled", false);
            }
        })
        // .fail(function(xhr, status, error) {
        //     console.log("me me me me", error);

        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Oops...',
        //         text: xhr.statusText
        //     });
        //     $('#btn1').html('Update');
        //     $('#btn1').attr("disabled", false);

        // });
    })
</script>



@endsection
