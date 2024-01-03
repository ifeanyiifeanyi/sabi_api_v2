@extends('admin.layouts/adminlayout')


@section('title', 'Video Details')


@section('adminlayout')

    <div class="container-fluid py-4" style="height:auto !important">

        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <p><a class="btn btn-outline-primary" href="{{ route('videos') }}"><i
                            class="fas fa-arrow-left"></i> Back</a></p>
                        <div class="d-flex justify-content-between">

                            <h2 class="mb-2"> {{ Str::title($video->title) }}</h2>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td>Title</td>
                                    <td>{{ Str::title($video->title) }}</td>
                                </tr>
                                <tr>
                                    <td>Series Title</td>
                                    <td>{{ $video->videoSeries->title ?? 'Single Video' }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ Str::title($video->category->name) }}</td>
                                </tr>
                                <tr>
                                    <td>Video Duration</td>
                                    <td>{{ Str::title($video->length) }}</td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td>{{ Str::title($video->genre->name) }}</td>
                                </tr>
                                <tr>
                                    <td>Ratings</td>
                                    <td>{{ Str::title($video->rating->name) }}</td>
                                </tr>
                                <tr>
                                    <td>Parential Control Rating</td>
                                    <td>{{ Str::title($video->parentControl->name) }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ Str::title($video->category->name) }}</td>
                                </tr>
                                <tr>
                                    <td>Video Status</td>
                                    <td>{{ Str::title($video->status == 1 ? 'Active' : 'Draft') }}</td>
                                </tr>
                                <tr>
                                    <td>Free</td>
                                    <td>{{ Str::title($video->is_free == 1 ? 'True' : 'False') }}</td>
                                </tr>
                                <tr>
                                    <td>Is Series</td>
                                    <td>
                                        {{ Str::title($video->is_series == 1 ? 'True' : 'False') }}
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <p>Short Description</p>
                                        {!! $video->short_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Long Description</p>
                                        {!! $video->long_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Thumbnail</p>
                                        <center>
                                        <img style="width: 100%" src="{{ asset($video->thumbnail) }}" class="img-50 img-fluid" alt="Thumbnail">
                                        </center>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <p>Video File</p>
                                            <div style="width: 100%">
                                                <video controls src="{{ asset($video->videoFile->first()->file_path) }}"></video>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
