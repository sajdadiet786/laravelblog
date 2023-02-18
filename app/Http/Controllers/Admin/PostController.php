<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    //
    public function index(){
        $posts=Post::all();
        $categories=Category::all();
        // dd($post);
        //  echo "<pre>",print_r($categories);exit;

        return view('admin.post.index',compact('posts','categories'));
    }
    public function create(){
        // $category=Category::all();
        // dd($category);
        // $category=Category::where('status','0')->get();
        $categories=Category::all();

       

        // dd($categories);
        // die;
        return view('admin.post.create',compact('categories'));
    }
    public function store(PostFormRequest $request){
        // $data=$request->validated();
        // $post=new Post;
        // $categories=Category::find($id);
        $post=Post::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>\Str::slug($request->name),
            'status'=>$request->status ==true ? '0':'1',
            'created_by'=>Auth::user()->id,
            // $post->categories()->attach($categories),
        ]);
        // $post->slug=\Str::slug($request->name);  
        // $post->status=$request->status ==true ? '0':'1';
        // $post->created_by=Auth::user()->id;
        // $post->category_id=$data['category_id'];
        // $post->category_id=$data['category_id'];
        
        //    $post->categories->attach($categories); 
        // sync($roleIds);
        $post->categories()->sync($request->categories);
        // dd($post);
        //  $post->categories()->sync($request->categories);
       
        // $post->name=$data['name'];  
        // $post->description=$data['description']; 
        //  $post = $post->create();
        $post->save();
       
        return redirect('admin/post')->with('message','Post is Added Successfully'); 

    }
    public function edit($post_id){
        $categories=Category::all();
        $post=Post::find($post_id);
        return view('admin.post.edit',compact('post','categories'));

    }
    public function update(PostFormRequest $request,$post_id){
        $data=$request->validated();
        $post= Post::find($post_id);
        $post->categories()->sync($request->categories);
        $post->name=$data['name'];  
        // $post->slug = Str::slug($data['slug']);
        $post->slug=\Str::slug($request->name);  
        $post->description=$data['description']; 
        
        // $post->yt_iframe=$data['yt_iframe'];  
        // $post->title=$data['title']; 
        $post->status=$request->status ==true ? '0':'1';
        $post->created_by=Auth::user()->id;
        $post->update();
        return redirect('admin/post')->with('message','Post is Updated Successfully'); 

    }
    public function destroy($post_id){
        $post=Post::find($post_id);
        $post->delete();
            return redirect('admin/post')->with('message','Post Deleted Successfully'); 
        }
        

}

