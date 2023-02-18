<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    //
    public function index(){
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request){
        if($request->hasfile('image')){
            $file=$request->file('image');
           
            $filename=time() . '-' .$file->getClientOriginalName();
        
            // Storage::disk('local')->put(('uploads/category/'),$filename);
            $uploaded= $file->move(public_path('uploads/category/'),$filename);
            // $category->image=$filename;
       
            // $category->save();
        } 
        Category::create([
            'name'=>$request->name,
            'slug'=>\Str::slug($request->name),
            'description'=>$request->description,
            //  'image'=>$request->filename,
            'image'=>$filename,
             'title'=>$request->title,
             'navbar_status'=>$request->navbar_status==true ? '1':'0',
             'status'=>$request->status ==true ? '0':'1',
             'created_by'=>Auth::user()->id,
             
             //     $category->navbar_status=$request->navbar_status==true ? '1':'0';
             //     $category->status=$request->status ==true ? '0':'1';
             //     $category->created_by=Auth::user()->id;
            
            
        ]);
        // $data=$request->validated();
    //     $category=new Category;
    //     $category->name=$data['name'];  
    //     $category->slug=\Str::slug($request->name);  
    //     $category->description=$data['description']; 
        // if($request->hasfile('image')){
        //     $file=$request->file('image');
           
        //     $filename=time() . '-' .$file->getClientOriginalName();
        
        //     // Storage::disk('local')->put(('uploads/category/'),$filename);
        //     $uploaded= $file->move(public_path('uploads/category/'),$filename);
        //     $category->image=$filename;
       
        //     // $category->save();
        // } 
      
    //     $category->title=$data['title']; 
    //     $category->navbar_status=$request->navbar_status==true ? '1':'0';
    //     $category->status=$request->status ==true ? '0':'1';
    //     $category->created_by=Auth::user()->id;
    //     $category->save();
        return redirect('admin/category')->with('message','Category is Added Successfully'); 

    }
    public function edit($category_id){
        $category=Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryFormRequest $request ,$category_id){
        $data=$request->validated();
        $category=Category::find($category_id);
        $category->name=$data['name'];  
        $category->slug=\Str::slug($request->name);  
        $category->description=$data['description']; 
        if($request->hasfile('image')){
            $destination='uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $filename=time() . '-' .$file->getClientOriginalName();
            $uploaded= $file->move(public_path('uploads/category/'),$filename);
            $category->image=$filename;

        } 
        // $category->image=$data['image'];  
        $category->title=$data['title'];
        $category->navbar_status=$request->navbar_status==true ? '1':'0';
        $category->status=$request->status ==true ? '0':'1';
        
        $category->created_by=Auth::user()->id;
        $category->save();
        return redirect('admin/category')->with('message','Category is Updated Successfully'); 

    }
    public function destroy(Request $request){
        $category=Category::find($request->category_delete_id);
        if($category){
            $destination='uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect('admin/category')->with('message','Category Deleted With its Posts Successfully'); 
        }
        else{
            return redirect('admin/category')->with('message','Category id Not Found Successfully'); 
        }
    }
}
