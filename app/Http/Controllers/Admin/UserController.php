<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register_page(){
        return view('auth/register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'designation' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back();
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if($user){
            return back()->with('success', "Success");
        }
    }

    public function all_users(){
        $users = User::where('id', '!=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(8);
        return view('Backend/users')->with(['users' => $users]);
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('success', 'Removed');
    }

}
