<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('Backend.event_page');
    }

    public function manage_event(){
        $events =DB::table('events')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(8);
        return view('Backend/manage_event')->with(['events' => $events]);

    }

    public function store(Request $request)
    {
        if(request()->hasFile('event_image')){
            request()->validate([

                'event_image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:events'],
            'content' => ['required', 'string'],
            'event_date' => ['required', 'after:today'],
        ]);


        $image = $request->file('event_image');
        $name = time().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('Events'), $name);
        $event = new Event();
        $event -> title = $request->input('title');
        $event -> event_date = $request->input('event_date');
        $event -> content = $request->input('content');
        $event -> image = $name;
        $event -> event_time = $request->input('event_time');;
        $event -> user_id = Auth::user()->id;
        $event -> save();

        if($event){
            return back()->with('success', "Success");
        };
    }


    public function update(Request $request, $id)
    {
        if(request()->hasFile('event_image')){
            request()->validate([

                'event_image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'event_date' => ['required', 'after:today'],

        ]);

        if(request()->hasFile('event_image')){
            $image = $request->file('event_image');
            $filename = time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('Events'), $filename);
            $img = Event::find($id);
            $img->image = $filename;
            $img->save();
        }

        $update = Event::find($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'event_date' => $request->input('event_date'),
            'event_time' => $request->input('event_time'),
        ]);

        if($update){
            return back()->with('success', "Successfull");
        }
        if($img){
            return back()->with('success', "Successfull");
        }

    }


    public function destroy(Event $event){
        $event->delete();
        if ($event){
            return back()->with('success', "Removed");
        }
    }





}
