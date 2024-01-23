<?php

namespace App\Http\Controllers\Admin;

use App\Models\Videos;
use App\Models\VideoSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VideoSeriesController extends Controller
{
    public function index()
    {
        $series = VideoSeries::orderBy("created_at", "desc")->get();
        return view("admin.videoSeries.index", compact("series"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:video_series',
            'description' => 'nullable|string'
        ]);

        VideoSeries::create([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        return redirect()->route('video.series.view')->with('status', " New Video Series Created!");
    }

    public function edit($series)
    {
        $seriesEdit = VideoSeries::findOrFail($series);
        $series = VideoSeries::orderBy("created_at", "desc")->get();

        return view("admin.videoSeries.index", compact("seriesEdit", "series"));
    }

    public function update(Request $request, $series)
    {
        $request->validate([
            'title' => 'required|string|unique:video_series',
            'description' => 'nullable|string'
        ]);

        VideoSeries::findOrFail($series)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        return redirect()->route('video.series.view')->with('status', " New Video Series Updated!");
    }

    public function destroy($series)
    {
        $videoSeries = VideoSeries::findOrFail($series);
        // dd($videoSeries->videos());

        if ($videoSeries->videos()->exists()) {
            return redirect()->route('video.series.view')->with('error', 'Series is active, and cannot be deleted at the moment');
        }
        $videoSeries->delete();


        return redirect()->route('video.series.view')->with('status', " Video Series deleted!");
    }
    public function details($id)
    {
        $videoSeries = VideoSeries::findOrFail($id);
        $seriesTitle = $videoSeries->title;
        $videoDetails = $videoSeries->videos;
        // dd($videoDetails);

        return view("admin.videoSeries.show", compact("videoDetails", "seriesTitle"));
    }

    public function show($id)
    {

        $videoSeries = Videos::findOrFail($id);

        $video = DB::table('videos')
            ->join('video_series', 'videos.series_id', '=', 'video_series.id')
            ->where('video_series.id', $videoSeries->series_id)
            ->select('videos.*', 'video_series.title as series_title', 'videos.title as video_title')
            ->first();
            // dd($video);

        // The title of the video series
        // $videoTitle = $videoSeries->title;

        // dd($videoTitle, $videos);
        return view('admin.videoSeries.showSingle', compact("video"));
    }
}
