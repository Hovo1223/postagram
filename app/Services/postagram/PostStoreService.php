<?php

namespace App\Services\postagram;

use App\Events\PublishEvent;
use App\Http\Controllers\Basecontroller;
use App\Http\Requests\PostRequest;
use App\Models\Picture;
use App\Models\Post;

class PostStoreService
{
    public function savePost(array $postData)
    {
        $post = Post::create([
            'title' => $postData['title'],
            'desc' => $postData['desc'],
            'user_id' => auth()->id(),
            'published_at' => $postData['published_at']
        ]);

        $paths = [];
        if (request()->hasFile('picture')) {
            foreach (request()->file('picture') as $file) {
                $paths[] = $file->store('uploads', 'public');
            }
        }

        if (!empty($paths)) {
            $picture =  Picture::create([
                'picture' => json_encode($paths),
                'imageable_type' => Post::class,
                'imageable_id' => $post->id,
                'img_alt' => $post->title,
            ]);
            $post->update([
                'picture_id' => $picture->id
            ]);

            PublishEvent::dispatch($post);
            return redirect()->back();
        }
    }
}
