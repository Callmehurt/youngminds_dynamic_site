<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Backend/posts_page');
    }


    public function manage_post(){
        $posts =DB::table('posts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(8);
        return view('Backend/manage_post_page')->with(['posts' => $posts]);

    }

    public function all_post(){
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->orderBy('posts.id', 'desc')->paginate(8);
        return view('Backend/all_posts')->with(['posts' => $posts]);
    }


    public function store(Request $request)
    {
        if(request()->hasFile('post_image')){
            request()->validate([

                'post_image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:posts'],
            'content' => ['required', 'string'],
        ]);


        $image = $request->file('post_image');
        $name = time().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('Posts'), $name);
        $post = new Post();
        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        $post -> image = $name;
        $post -> user_id = Auth::user()->id;
        $post -> save();

        if($post){
            return back()->with('success', "Success");
        };
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        if(request()->hasFile('post_image')){
            request()->validate([

                'post_image' => 'required|image|mimes:jpeg,jpg|max:5048',

            ]);
        }

        $this -> validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        if(request()->hasFile('post_image')){
            $image = $request->file('post_image');
            $filename = time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('Posts'), $filename);
            $img = Post::find($id);
            $img->image = $filename;
            $img->save();
        }

        $update = Post::find($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        if($update){
            return back()->with('success', "Successfull");
        }
        if($img){
            return back()->with('success', "Successfull");
        }

    }


    public function destroy(Post $post)
    {
        $post->delete();
        if ($post){
            return back()->with('success', "Removed");
        }
    }
}
