<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Exception;

class CommentController extends Controller
{
    // Get all comments
    public function index()
    {
        try {
            $comments = Comment::with('post')->get();
            return response()->json($comments);
        } catch (Exception $e) {
            return response("<h1>Error fetching comments</h1><p>{$e->getMessage()}</p>", 500)
                ->header('Content-Type', 'text/html');
        }
    }

    // Create a new comment
    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'post_id' => 'required|integer|exists:posts,id',
                'comment_text' => 'required|string',
            ]);

            $comment = Comment::create($validated);
            return response()->json($comment, 201);
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

    // Show a single comment
    public function show($id)
    {
        try {
            $comment = Comment::with('post')->findOrFail($id);
            return response()->json($comment);
        } catch (Exception $e) {
            return response("<h1>Comment Not Found</h1><p>{$e->getMessage()}</p>", 404)
                ->header('Content-Type', 'text/html');
        }
    }

    // Update a comment
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'comment_text' => 'required|string',
            ]);

            $comment = Comment::findOrFail($id);
            $comment->update($validated);
            return response()->json($comment);
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

    // Delete a comment
    public function delete($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return response()->json(['message' => 'Comment deleted successfully']);
        } catch (Exception $e) {
            return response("<h1>Server Error</h1><p>{$e->getMessage()}</p>", 500)
                ->header('Content-Type', 'text/html');
        }
    }
}
