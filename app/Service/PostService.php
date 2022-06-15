<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($input)
    {
        try {
            DB::beginTransaction();
            $input['preview_image'] = Storage::disk('public')->put('/images', $input['preview_image']);
            if (isset($input['tag_ids'])) {
                $tagIds = $input['tag_ids'];
                unset($input['tag_ids']);
            }
            $post = Post::firstOrCreate($input);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($input, $post)
    {
        try {
            DB::beginTransaction();
            if (isset($input['preview_image'])) {
                $input['preview_image'] = Storage::disk('public')->put('/images', $input['preview_image']);
            }
            if (isset($input['tag_ids'])) {
                $tagIds = $input['tag_ids'];
                unset($input['tag_ids']);
            }
            $post->update($input);
            if (!empty($tagIds)) {
                $post->tags()->sync($tagIds);
            } else {
                $post->tags()->detach();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
