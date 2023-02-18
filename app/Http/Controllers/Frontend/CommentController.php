<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //
    public function index(){
        $comments=Comment::all();
        $users=User::all();
        // dd($post);
        //  echo "<pre>",print_r($categories);exit;

        return view('frontend.post.comments',compact('comments','users'));
    }
    public function store(Request $request)
    {
        if(Auth::check()){
            $validator=Validator::make($request->all(),[
                                'comment_body'=>'required|string'
                            ]);
            if($validator->fails())
            {
                return redirect()->back()->with('message','Comment area is mandetory'); 
            }
            // $category=Category::where('slug',$request->$category_slug)->where('status','0')->first();
             $post=Post::where('slug',$request->post_slug)->where('status','0')->first();
            //  dd($post);
             if( $post)
             {
                Comment::create([
                        'post_id'=>$post->id,
                        'user_id'=>Auth::user()->id,
                        'comment_body'=>$request->comment_body,
                        // 'status'=>$request->status ==false ? 'approve':'pending',
                            
                    ]);

                    return redirect()->back()->with('message','commented Successfully');
             }
             else{
                return redirect()->back()->with('message','No such Post Found');
             }
            }
            else
            {
                return redirect('login')->with('message','Login first to comment');
            }
        }
        public function destroy(Request $request){
            if(Auth::check()){
             $comment=Comment::where('id',$request->comment_id)
             ->where('user_id',Auth::user()->id)
             ->first();
             $comment->delete();
             return response()->json([
                'status'=>200,
                'message'=>'comment deleted successfully'  
             ]);
            }
                else{
                    return response()->json([
                       'status'=>401,
                       'message'=>'login to delete this comment'  
                    ]);
                }
        }
        public function approve(Request $request, $comment_id){
          
            $comment=Comment::where('id',$comment_id)->first();
            if($comment->status==='pending'){
                $comment->status='approve';
                $comment->save();
                return redirect('comments')->with('message','comment approve successfully');
            }
            else{
                return redirect('comments')->with('message','comment already approve  '); 
            }

    }
}
     