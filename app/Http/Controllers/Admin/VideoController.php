<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\rating;
use App\Models\Videos;
use App\Models\VideoFile;
use App\Models\categories;
use App\Models\VideoSeries;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\File;
use App\Models\ParentControl;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index()
    {
        // $videos = Videos::latest()->simplePaginate(2);
        $videos = DB::table('videos')
            ->join('categories', 'videos.category_id', '=', 'categories.id')
            ->join('genres', 'videos.genres_id', '=', 'genres.id')
            ->join('ratings', 'videos.rating_id', '=', 'ratings.id')
            ->join('parent_controls', 'videos.parent_control_id', '=', 'parent_controls.id')
            ->select('videos.*', 'genres.name AS genName', 'categories.name AS catName', 'ratings.name AS rateName', 'parent_controls.name as PcName')
            ->orderBy('id', 'desc')
            ->simplePaginate(5);;
        return view('admin.videosFolders.index', compact('videos'));
    }

    public function create()
    {
        $categories = categories::all();
        $genre = Genre::all();
        $ratings = rating::all();
        $parentControls = ParentControl::all();
        $videoSeries = VideoSeries::all();
        return view("admin.videosFolders.create", compact('videoSeries', 'categories', 'genre', 'ratings', 'parentControls'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title'                 => 'required|min:3|unique:videos|string',
            'category_id'           => 'required',
            'length'                => 'required',
            'genre_id'              => 'required',
            'rating_id'             => 'required',
            'parent_control_id'     => 'required',
            'short_description'     => 'required',
            'long_description'      => 'required',
            'video'                 => 'required|file|mimes:mp4,ogx,oga,ogv,ogg,webm|max:100000',
            'thumbnail'             => 'required|image|mimes:jpeg, png, jpg, webp|max:9048',
            'series_id'             => 'nullable',
            'is_series'             => 'nullable',
            'is_free'               => 'nullable',
            'subscription_required' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->messages()
            ]);
        }


        $videoUploads = new Videos();

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $ext = $video->getClientOriginalExtension();
            $videoFile = time() . "." . $ext;
            $video->move('uploads/videos/', $videoFile);

            if ($request->hasFile('thumbnail')) {
                $thumb = $request->file('thumbnail');
                $extension = $thumb->getClientOriginalExtension();
                $thumbFile = time() . "." . $extension;
                $thumb->move('uploads/thumbnails/', $thumbFile);
                $videoUploads->thumbnail = 'uploads/thumbnails/' . $thumbFile;
            }

            // Fill other attributes
            $videoUploads->title = $request->title;
            $videoUploads->slug = Str::slug($request->title);
            $videoUploads->category_id = $request->category_id;
            $videoUploads->length = $request->length;
            $videoUploads->genres_id = $request->genre_id;
            $videoUploads->rating_id = $request->rating_id;
            $videoUploads->parent_control_id = $request->parent_control_id;
            $videoUploads->short_description = $request->short_description;
            $videoUploads->long_description = $request->long_description;
            $videoUploads->series_id = $request->series_id;
            $videoUploads->status = $request->status ? 1 : 0;
            $videoUploads->is_series = $request->is_series ? 1 : 0;
            $videoUploads->subscription_required = $request->subscription_required ? 1 : 0;

            $videoUploads->save(); // Save video details

            $lastInsertedId = $videoUploads->id;
            $videoFileRecord = VideoFile::create([
                'video_id' => $lastInsertedId,
                'file_path' => 'uploads/videos/' . $videoFile,
            ]);

            if ($videoFileRecord) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                // If there's an issue with the video file record, you may want to handle it accordingly
                return response()->json([
                    'error' => 'Failed to save video file record.'
                ]);
            }
        }

        return response()->json([
            'error' => 'Video File Not Uploaded.'
        ]);


        //return redirect()->route("videos")->with("status", "Video Created");
        // return a response for js (success)
    }


    public function show($id)
    {
        $video = Videos::findOrFail($id);
        return view('admin.videosFolders.show', compact('video'));
    }


    public function edit($id)
    {
        $videoSeries = VideoSeries::all();
        $categories = categories::all();
        $genre = Genre::all();
        $ratings = rating::all();
        $parentControls = ParentControl::all();
        $video = Videos::findOrFail($id);
        return view('admin.videosFolders.edit', compact('video', 'categories', 'genre', 'ratings', 'parentControls', 'videoSeries'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'                 => 'required|min:3|string',
            'category_id'           => 'required',
            'length'                => 'required',
            'genre_id'              => 'required',
            'rating_id'             => 'required',
            'parent_control_id'     => 'required',
            'short_description'     => 'required',
            'long_description'      => 'required',
            'video'                 => 'nullable|file|mimes:mp4,ogx,oga,ogv,ogg,webm|max:100000',
            'thumbnail'             => 'nullable|image|mimes:jpeg, png, jpg, webp|max:9048',
            'series_id'             => 'nullable',
            'is_series'             => 'nullable',
            'is_free'               => 'nullable',
            'subscription_required' => 'nullable'
        ]);


        // return a json error message
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        // find the video to be updated
        $videoUploads = Videos::findOrFail($id);
        $oldVideoFile = null;


        if ($request->hasFile('thumbnail')) {
            // if new thumbnail was added delete the old one
            $old_thumbnail = $videoUploads->thumbnail;
            if (!empty($old_thumbnail) && file_exists(public_path($old_thumbnail))) {
                unlink(public_path($old_thumbnail));
            }

            $thumb = $request->file('thumbnail');
            $extension = $thumb->getClientOriginalExtension();
            $thumbFile = time() . "." . $extension;
            $thumb->move('uploads/thumbnails/', $thumbFile);
            $videoUploads->thumbnail = 'uploads/thumbnails/' . $thumbFile;
        }

        if ($request->hasFile('video')) {

            // if a new video was added, delete the old one
            $oldVideoFile = VideoFile::where('video_id', $videoUploads->id)->value('file_path');

            $old_video = $oldVideoFile;

            if (!empty($old_video) && file_exists(public_path($old_video))) {
                unlink(public_path($old_video));
            }
            $video = $request->file('video');
            $ext = $video->getClientOriginalExtension();
            $videoFile = time() . "." . $ext;
            $videoUploads->move('uploads/videos/', $videoFile);
        }

        $videoUploads->title    = $request->title;
        $videoUploads->slug     = Str::slug($request->title);
        $videoUploads->category_id = $request->category_id;
        $videoUploads->length      = $request->length;
        $videoUploads->genres_id          = $request->genre_id;
        $videoUploads->rating_id         = $request->rating_id;
        $videoUploads->parent_control_id = $request->parent_control_id;
        $videoUploads->short_description = $request->short_description;
        $videoUploads->long_description  = $request->long_description;
        $videoUploads->status            = $request->status ? 1 : 0;
        $videoUploads->series_id = $request->series_id ?? 0;
        $videoUploads->is_free = $request->is_free ? 1 : 0;
        $videoUploads->is_series = $request->is_series ? 1 : 0;
        $videoUploads->subscription_required = $request->subscription_required ? 1 : 0;
        $videoUploads->update();

        // Update or create the associated video file record only if a new video is uploaded
        if ($request->hasFile('video')) {
            VideoFile::updateOrCreate(
                ['video_id' => $videoUploads->id],
                ['file_path' => 'uploads/videos/' . $videoFile]
            );
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        $video = Videos::findOrFail($id);
        $videoFile = VideoFile::where('video_id', $video->id)->first();


        if (!empty($video->thumbnail) && file_exists(public_path($video->thumbnail))) {
            unlink(public_path($video->thumbnail));
        }
        if (!empty($videoFile->file_path) && file_exists(public_path($videoFile->File_path))) {
            unlink(public_path($videoFile->file_path));
        }


        if($video->delete()) {

            $videoFile->delete();
        }
        return redirect()->route("videos")->with("status", "Video and Associated Details Deleted!!");
    }

    public function draft($id)
    {
        $send_to_draft = Videos::find($id);
        $send_to_draft->status = 0;
        $send_to_draft->update();
        return redirect()->route("videos")->with("status", "Video status changed to draft");
    }
    public function activate($id)
    {
        $send_to_draft = Videos::find($id);
        $send_to_draft->status = 1;
        $send_to_draft->update();
        return redirect()->route("videos")->with("status", "Video status changed to Activate");
    }
}


#to restore
// $flight->restore();

// #to query trashed models
// Flight::withTrashed()
//         ->where('airline_id', 1)
//         ->restore();
// $flights = Flight::onlyTrashed()
//                 ->where('airline_id', 1)
//                 ->get();
