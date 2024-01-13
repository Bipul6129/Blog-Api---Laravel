<?php

namespace App\Http\Controllers;

use App\Exceptions\BlogException;
use App\Models\Blog;
use Exception;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    public function validateBlog(Request $req){
        $validatedData = $req->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'category_id'=>'required|exists:blog_category,id'
        ]);
        return $validatedData;

        
    }

    public function getAllBlogs(){
        $blogs = Blog::with('blog_category')->get();
        if($blogs->isEmpty()){
            throw BlogException::blogNotFound();
        }
        return $blogs;
    }

    public function findBlogById($id=0){
        $blog = Blog::with('blog_category')->find($id);
        if(!$blog){
            throw BlogException::blogNotFound();
        }
        return $blog;
    }

    public function postBlog(Request $req){
        try{
            $validBlog=$this->validateBlog($req);
            $blog = Blog::create([
                'title'=>$validBlog['title'],
                'description'=>$validBlog['description'],
                'category_id'=>$validBlog['category_id']
            ]);
            return response()->json($blog, 201);

        }catch(ValidationException $ex){
            return response()->json([
                'error' => $ex->errors(),
                'message' => 'Validation failed',
            ], 422);
        }catch(Exception $ex){
            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function updateBlog(Request $req){
        try{
            $blog = Blog::find($req->input('id'));
            if(!$blog){
                throw BlogException::blogNotFound();
            }
            $validBlog=$this->validateBlog($req);
            $blog->update([
                'title'=>$validBlog['title'],
                'description'=>$validBlog['description'],
                'category_id'=>$validBlog['category_id']
            ]);
            return response()->json([
                'message' => 'Blog updated successfully',
                'blog' => $blog,
            ]);

        }catch(ValidationException $ex){
            return response()->json([
                'error' => $ex->errors(),
                'message' => 'Validation failed',
            ], 422);
        }
        catch(Exception $ex){
            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

}
