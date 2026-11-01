<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Http;

use App\Models\User;

#[Table('article')]
#[Fillable(['title', 'subtitle', 'content', 'img','slug', 'user_id'])]
#[Hidden(['deleted_at'])]
class Article extends Model
{
    use softDeletes;   

    protected function uploadToStorage($img) {
        $name = Str::uuid() . '.' . $img->extension();

        $response = Http::withHeaders([
            'apikey' => config('services.supabase.api_key'),
            'Content-Type' => $img->getMimeType(),
        ])
        ->withBody(
            $img->get(),
            $img->getMimeType()
        )
        ->post(
            config('services.supabase.upload_url').$name
        );

        $response->throw();

        return $response->json();
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function deleteArticle($slug) {
        $target = self::where('slug', $slug)->first();
        $target->delete();
        }
        
    public function updateArticle($slug, $title, $subtitle, $content, $img) {
        $target = self::where('slug', $slug)->first();
        $data = [];

        if ($img['new']) {
            // update gambar
            $new = $this->uploadToStorage($img['new']);
            $data['img'] = config('services.supabase.pablic_url').$new['Key'];
        } elseif ($img['remove']) {
            // hapus gambar
            $data['img'] = Null;
        }

        if ($target->title != $title) {
            $data['title'] = $title;
            $data['slug'] = Str::of($title)->slug('-').'-'.Str::random(20);
        } 
        if ($target->subtitle != $subtitle) {
            $data['subtitle'] = $subtitle;
        } 
        if ($target->content != $content) {
            $data['content'] = $content;
        } 

        $target->updateOrFail($data);
        $slugChange = ['slugChange' => isset($data['slug'])];
        if (isset($data['slug'])) {
            $slugChange['slug'] = $data['slug'];
        }
        return $slugChange;
    }


    public function publish($user_id, $title, $subtitle, $content, $img = null) {
        $slug = Str::of($title)->slug('-').'-'.Str::random(20);
        if ($img) {
            $upload = $this->uploadToStorage($img);
            $img = config('services.supabase.pablic_url').$upload['Key'];
        }
        self::create([
            'user_id' => $user_id,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
            'slug' => $slug,
            'img' => $img,
        ]);
        return $slug;
    }
}
