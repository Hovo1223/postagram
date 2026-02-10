<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Picture;
use App\Models\Post;
use App\Models\User;
use App\Models\Useravatar;
use App\Services\postagram\PostStoreService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public PostStoreService $postStoreService;

    public function __construct(PostStoreService $postStoreService)
    {
        $this->postStoreService = $postStoreService;
    }

    public function welcome()
    {
        $user = auth()->user();
        $posts = post::all();
        return view('welcome', compact('posts', 'user'));
    }

    public function index()
    {
        return view('post.index');
    }

    public function store(PostRequest $request)
    {
        $postData = $request->validated();

        return $this->postStoreService->savePost($postData);
    }

    public function avatar()
    {
        return view('avatar.index');
    }

    public function avatar_store(request $request)
    {
        $data = $request->validate([
            'picture' => 'nullable|max:2048',
        ]);

        $path_avatar = [];
        if ($request->hasFile('picture')) {
            foreach ($request->file('picture') as $image_avatar) {
                $path_avatar[] = $image_avatar->store('uploads', 'public');
            }
        }

        $user_avatar_create = Useravatar::create([]);
        $picture = Picture::create([
            'picture' => json_encode($path_avatar),
            'imageable_type' => Useravatar::class,
            'imageable_id' => $user_avatar_create->id,
        ]);

        $user_avatar_update = $user_avatar_create->update([
            'picture_id' => $picture->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back();
    }
}
