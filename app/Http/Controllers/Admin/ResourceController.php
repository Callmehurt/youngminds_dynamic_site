<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('Backend/resources');
    }

    public function all_resources(){
        $resources = DB::table('resources')->orderBy('created_at', 'desc')->paginate(8);
        return view('Backend/all_resources')->with(['resources'=>$resources]);
    }

    public function store(Request $request){
        if(request()->hasFile('file')){
            request()->validate([

                'file' => 'required',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:resources'],
            'description' => ['required', 'string'],
        ]);

        $file = $request->file('file');
        $thumbnail = $request->file('thumbnail');
        $name = time().'.'. $file->getClientOriginalExtension();
        $extension = $file->getClientOriginalExtension();
        $file->move(public_path('Resources'), $name);
        $thumbnail->move(public_path('Thumbnails'), time().'.'. $thumbnail->getClientOriginalExtension());
        $resource = new Resource();
        $resource -> title = $request->input('title');
        $resource -> description = $request->input('description');
        $resource -> file = $name;
        $resource -> thumbnail = time().'.'. $thumbnail->getClientOriginalExtension();
        $resource -> type = $extension;
        $resource -> save();

        if($resource){
            return back()->with('success', "Success");
        };

    }


    public function destroy(Resource $resource){
        $resource->delete();
        if($resource){
            return back()->with('success', 'Removed');
        }
    }

    public function update(Request $request, $id)
    {
        if(request()->hasFile('file')){
            request()->validate([

                'file' => 'required',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        if(request()->hasFile('file')){
            $file = $request->file('file');
            $filename = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('Resources'), $filename);
            $detail = Resource::find($id);
            $detail->file = $filename;
            $detail->type = $file->getClientOriginalExtension();
            $detail->save();
        }

        if(request()->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $filename = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('Thumbnails'), $filename);
            $detail = Resource::find($id);
            $detail->thumbnail = $filename;
            $detail->save();
        }

        $update = Resource::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if($update){
            return back()->with('success', "Successfull");
        }
        if($detail){
            return back()->with('success', "Successfull");
        }

    }
}
