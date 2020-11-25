<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Backend/news_page');
    }

    public function manage_news(){
        $news =DB::table('news')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(8);
        return view('Backend/manage_news')->with(['news' => $news]);

    }

    public function all_news(){
        $news = DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->orderBy('news.id', 'desc')->paginate(8);
        return view('Backend/all_news')->with(['news' => $news]);
    }

    public function store(Request $request)
    {
        if(request()->hasFile('news_image')){
            request()->validate([

                'news_image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:news'],
            'content' => ['required', 'string'],
            'topic' => ['required', 'string']
        ]);


        $image = $request->file('news_image');
        $name = time().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('News'), $name);
        $news = new News();
        $news -> title = $request->input('title');
        $news -> content = $request->input('content');
        $news -> topic = $request->input('topic');
        $news -> image = $name;
        $news -> user_id = Auth::user()->id;
        $news -> save();

        if($news){
            return back()->with('success', "Success");
        };
    }


    public function update(Request $request, $id)
    {
        if(request()->hasFile('news_image')){
            request()->validate([

                'news_image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'topic' => ['required', 'string'],
        ]);

        if(request()->hasFile('news_image')){
            $image = $request->file('news_image');
            $filename = time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('News'), $filename);
            $img = News::find($id);
            $img->image = $filename;
            $img->save();
        }

        $update = News::find($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'topic' => $request->input('topic'),
        ]);

        if($update){
            return back()->with('success', "Successfull");
        }
        if($img){
            return back()->with('success', "Successfull");
        }

    }



    public function destroy(News $news){
        $news->delete();
        if ($news){
            return back()->with('success', "Removed");
        }
    }




}
