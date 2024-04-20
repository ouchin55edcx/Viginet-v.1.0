<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
            'postId' => 'required|exists:posts,id', // Ensure postId exists in the 'posts' table
        ]);

        // Find the post by ID
        $post = Post::findOrFail($validatedData['postId']);

        // Create a new comment associated with the post
        $comment = new Comment();
        $comment->user_id = auth()->id(); // Use auth()->id() to get the authenticated user's ID
        $comment->post_id = $post->id;
        $comment->content = $validatedData['content']; // Use validated data directly
        $comment->save();

        // Redirect back to the post with a success message
        return redirect()->back()->with('success', 'Comment added successfully.');
    }}
