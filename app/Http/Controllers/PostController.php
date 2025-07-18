<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    // Get all posts with their comments
    public function get(){
        try {
            $posts = Post::with('comments')->get();
            return response()->json($posts);
        } catch (Exception $e) {
            return response("<h1>Error fetching posts</h1><p>{$e->getMessage()}</p>", 500)
                ->header('Content-Type', 'text/html');
        }
    }

    // Create a new post
    public function create(Request $request){
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string'
            ]);

            $post = Post::create($validated);
            return response()->json($post, 201);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            $errors = $ve->validator->errors()->all();
            $errorHtml = "<h1>Validation Error</h1><ul>";
            foreach ($errors as $error) {
                $errorHtml .= "<li>{$error}</li>";
            }
            $errorHtml .= "</ul>";

            return response($errorHtml, 422)->header('Content-Type', 'text/html');
        } catch (Exception $e) {
            return response("<h1>Server Error</h1><p>{$e->getMessage()}</p>", 500)
                ->header('Content-Type', 'text/html');
        }
    }
}
