<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //
    public function index(){
            $all_categories=Category::where('status','0')->get();
            
            $latest_posts=Post::where('status','0')->orderBy('created_at','DESC')->get()->take(2);

      
        return view('frontend.index',compact('all_categories','latest_posts'));
    }
    public function search(Request $request)
    {
        if($request->search)
        {
            $search=Category::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(5);
            $all_categories=Category::where('status','0')->get();
            $postsearch=Post::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(5);
            return view('frontend.post.search',compact('search','all_categories','postsearch'));

        }
        else
        {
return redirect()->back()->with('message','empty search');
        }

    }
   
    public function ViewCategoryPost(string $category_slug){
        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        // dd($category->posts);
              return view('frontend.post.index',compact('category'));
          
    } 
    
    public function ViewPost(string $slug){
        // echo "<pre>",print_r($slug);exit;
        $post = Post::where('slug', $slug)->first();
        $all_categories=Category::where('status','0')->get();
        $latest_posts=Post::where('status','0')->orderBy('created_at','DESC')->get()->take(2);
        return view('frontend.post.view', compact('post','all_categories','latest_posts'));
    }
}
    
