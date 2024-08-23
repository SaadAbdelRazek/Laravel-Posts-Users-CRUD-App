<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class TestController extends Controller
{
    public function printGreat(){
        return view('index');
    }
    public function index(){
        $getPosts = Post::all();
        return view('index', compact('getPosts'));
    }
    public function show($postId)
    {
        $getSinglePost = Post::find($postId);
        $id = $getSinglePost->user_id;
        $getSingleUser= User::find($id);
        if(is_null($getSinglePost)){
            return to_route('index');
        }
       return view('show', compact('getSinglePost','getSingleUser'));
    }
    public function create(){
        $selectUser=User::all();
        return view('create',compact('selectUser'));
    }
    public function store(){
        $request = request()->all();
        $request=request()->validate([
            'title'=>['required','min:4'],
            'desc'=>['required','min:5'],
            'creator'=>['required','exists:users,id'],
        ]);
        $title=request()->title;
        $desc=request()->desc;
        $creator=request()->creator;
       // dd($request,$title,$desc,$creator);

       # @dd($request);

        //first way
//        $post=new Post();
//        $post->title="$title";
//        $post->description="$desc";
//        $post->save();

        //second way
        Post::create([
            'title'=>$title,
            'description'=>$desc,
            'user_id'=>$creator,
        ]);
        return to_route('index');
    }
    public function edit($postId){
        $postData=Post::findorfail($postId);
        $users=User::all();
        return view('edit', compact('postData','users'));
    }
    public function update($postId){
        $data=request()->all();
        $id=request()->id;
        $title=request()->title;
        $desc=request()->desc;
        $creator=request()->creator;
        $singlePost=Post::find($postId);
        $request=request()->validate([
            'title'=>['required','min:4'],
            'desc'=>['required','min:5'],
            'creator'=>['required','exists:users,id'],
        ]);
        $singlePost->update([
            'title'=>$title,
            'description'=>$desc,
            'user_id'=>$creator,
        ]);
        return to_route('index');
    }

    public function destroy($postId){
        $post=Post::find($postId);
        $post->delete();
        return to_route('index');
    }
}
