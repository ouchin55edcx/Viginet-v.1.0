<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = Auth::user();

            $posts = Post::with(['image', 'comments.user', 'user'])
                ->orderBy('created_at', 'desc')
                ->get();
            //dd($posts);
            // Map through the posts to add the save status for the authenticated user
            $postsWithSaveStatus = $posts->map(function ($post) use ($user) {
                $isSaved = $user->savedPosts()->where('post_id', $post->id)->exists();

                return [
                    'post' => $post,
                    'isSaved' => $isSaved,
                ];
            });

            $client = Client::with('image')->where('user_id', $user->id)->first();

            return view('community.index', compact('posts', 'postsWithSaveStatus', 'client'));
        }

        return redirect()->route('register.index');
    }

}
