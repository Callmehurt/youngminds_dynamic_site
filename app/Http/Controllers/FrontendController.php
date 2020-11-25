<?php

namespace App\Http\Controllers;

use App\Model\Event;
use App\Model\News;
use App\Model\Post;
use App\Model\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function home_Page(){
        $headlineNews =  DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.*', 'users.name')->limit(1)->latest()->get();
        $latestNews = DB::table('news')->orderBy('created_at', 'asc')->limit(3)->get();

        $posts = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();

        $events = DB::table('events')->orderBy('created_at', 'desc')->limit(6)->get();
        return view('home_page')
            ->with(['headlineNews' => $headlineNews, 'latestNews' => $latestNews, 'posts' => $posts, 'events'=>$events]);
    }

    public function all_news(){
        $allNews = DB::table('news')->orderBy('created_at', 'desc')->paginate(12);
        return view('Frontend/all_news')->with(['allNews' => $allNews]);
    }

    public function all_posts(){
        $allPosts = DB::table('posts')->orderBy('created_at', 'desc')->paginate(12);
        return view('Frontend/all_posts')->with(['allPosts' => $allPosts]);
    }

    public function all_events(){
        $allEvents = DB::table('events')->orderBy('created_at', 'asc')->paginate(12);
        return view('Frontend/all_events')->with(['allEvents' => $allEvents]);
    }

    public function all_resources(){
        $books = DB::table('resources')->where('type','=', 'pdf')->orderBy('created_at', 'desc')->paginate(6);
        $videos = DB::table('resources')->where('type','!=', 'pdf')->orderBy('created_at', 'desc')->paginate(6);
        return view('Frontend/all_resources')->with(['books'=>$books, 'videos'=>$videos]);
    }


    public function single_news($id){
        $news = DB::table('news')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->where('news.id', '=', $id)
            ->select('news.*', 'users.name')->get();

        $trendingNews = News::where('id', '!=', $id)->limit(6)->get();

        return view('Frontend/single_news')->with(['news'=>$news, 'trendingNews'=>$trendingNews]);
    }

    public function single_post($id){
        $singlePost = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', '=', $id)
            ->select('posts.*', 'users.name')->get();
        $recentPost = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', '!=', $id)
            ->select('posts.*', 'users.name')
            ->orderBy('created_at', 'desc')
            ->limit(6)->get();
        return view('Frontend/single_post')->with(['singlePost'=>$singlePost, 'recentPost'=>$recentPost]);
    }

    public function single_event($id){
        $event = Event::find($id);
        return view('Frontend/single_event')->with(['event'=>$event]);
    }


    public function single_book($id){
        $book = Resource::find($id);
        return view('Frontend/single_resource_book')->with(['book'=>$book]);
    }

    public function download_book($id){
        $resource = Resource::find($id);
        return view('Frontend.book', compact('resource'));
    }


    public function single_video($id){
        $video = Resource::find($id);
        return view('Frontend/video')->with(['video' => $video]);
    }



}
