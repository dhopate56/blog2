<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
Use illuminate\Support\Facades\Auth;

class Admincontroller extends Controller
{
    public function index(){
        if(Auth::id()){
            $post=Post::where('post_status', '=', 'active')->get();
$usertype=Auth()->user()->usertype;
if($usertype == 'user'){
    return view('home.homepage', compact('post'));
} else if($usertype == 'admin'){
    return view('admin.index');
}else{
    return redirect()->back();
}
        }
    }
    public function add_post(){
        return view('admin.add_post');
    }
    public function  post_page(Request $request){
        $user=Auth()->user();
        $name=$user->name;
        $userid=$user->id;
        $post=new Post;

        $post->post_status='active';
        $usertype=$user->usertype;
        $post->name=$name;
        $post->userid=$userid;
        $post->usertype=$usertype;

        $post->title=$request->title;
        $post->description=$request->description;
        $image=$request->image;
        $imagename=time().'.'. $image->getClientOriginalExtension();
        $request->image->move('postimage', $imagename);
        $post->image=$imagename;
        $post->save();
        return redirect()->back()->with('message', 'post added successfully');
        }
        public function show_post(){
            $post=Post::all();
            return view('admin.show_post', compact('post'));
        }
        public function delete_post($id){
            $post=Post::find($id);
            $post->delete();
            return redirect()->back()->with('message', 'post deleted');
        }
        public function edit_post($id){
            $post=Post::find($id);
            return view('admin.edit_post', compact('post'));
        }
        public function update_post(Request $request, $id){
            $post=Post::find($id);
            $post->title=$request->title;
            $post->description=$request->description;
            $image=$request->image;
           if($image){
            $imagename= time(). '.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image=$imagename;
           }
            $post->save();
            return redirect()->back()->with('message2','post updated');
        }
        public function homepage(){
            $post=Post::where('post_status', '=', 'active')->get();
            return view('home.homepage', compact('post'));
        }
        public function create_post(){
            return view('home.create_post');
        }
        public function create_post_store(Request $request){
            $user=Auth()->user();
        $name=$user->name;
        $userid=$user->id;
        $post=new Post;

        $post->post_status='pending';
        $usertype=$user->usertype;
        $post->name=$name;
        $post->userid=$userid;
        $post->usertype=$usertype;

        $post->title=$request->title;
        $post->description=$request->description;
        $image=$request->image;
        $imagename=time().'.'. $image->getClientOriginalExtension();
        $request->image->move('postimage', $imagename);
        $post->image=$imagename;
        $post->save();
        return redirect()->back()->with('message', 'post added successfully');
        }
        public function my_posts(){
            $user=Auth()->user();
        $name=$user->name;
        $userid=$user->id;
            $post=Post::where('userid', '=', $userid)->get();
            return view('home.my_posts', compact('post'));
        }
        public function user_edit_post($id){
            $post=Post::find($id);
            return view('home.user_edit_post', compact('post'));
        }
        public function accept_post($id){
            $post=Post::find($id);
            $post->post_status='active';
            $post->save();
            return redirect()->back()->with('message', 'post accepted');
        }
        public function reject_post($id){
            $post=Post::find($id);
            $post->post_status='pending';
            $post->save();
            return redirect()->back()->with('message', 'post status changed to pending');
        }
}
