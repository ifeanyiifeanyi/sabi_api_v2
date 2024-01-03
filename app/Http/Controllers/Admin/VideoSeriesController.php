<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoSeries;
use Illuminate\Http\Request;

class VideoSeriesController extends Controller
{
    public function index(){
        $series = VideoSeries::orderBy("created_at","desc")->get();
        return view("admin.videoSeries.index", compact("series"));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|unique:video_series',
            'description' => 'nullable|string'
        ]);

        VideoSeries::create([
            'title'=> $request->input('title'),
            'description'=> $request->input('description')
        ]);
        return redirect()->route('video.series.view')->with('status'," New Video Series Created!");

    }

    public function edit($series){
        $seriesEdit = VideoSeries::findOrFail($series);
        $series = VideoSeries::orderBy("created_at","desc")->get();

        return view("admin.videoSeries.index", compact("seriesEdit", "series"));
    }

    public function update(Request $request, $series){
        $request->validate([
            'title' => 'required|string|unique:video_series',
            'description' => 'nullable|string'
        ]);

        VideoSeries::findOrFail($series)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        return redirect()->route('video.series.view')->with('status'," New Video Series Updated!");

    }

    public function destroy($series){
        $videoSeries = VideoSeries::findOrFail($series);
        // dd($videoSeries->videos());

        if($videoSeries->videos()->exists()){
            return redirect()->route('video.series.view')->with('error', 'Series is active, and cannot be deleted at the moment');
        }
        $videoSeries->delete();


        return redirect()->route('video.series.view')->with('status'," Video Series deleted!");

    }
    public function details($id){
        $videoSeries = VideoSeries::findOrFail($id);
        $seriesTitle = $videoSeries->title;
        $videoDetails = $videoSeries->videos;
        // dd($videoDetails);

        return view("admin.videoSeries.show", compact("videoDetails", "seriesTitle"));
    }
}
