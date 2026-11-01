<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Article;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Client\ConnectionException;

use Flux\Flux;

class Update extends Component
{
    use WithFileUploads;

    public $title = '';
    public $subtitle = '';
    public $content = '';

    public $newImg = null;
    public $removeImg = false;
    public $oldImg = '';

    public $slug = '';
    public function mount($slug) {
        $target = Article::where('slug', $slug)->firstOrFail();
        if ($target->user->id != me()->id) {
            return $this->redirect('/');
        }

        $this->title = $target->title;
        $this->subtitle = $target->subtitle;
        $this->content = $target->content;
        $this->oldImg = $target->img;
        $this->slug = $slug;
    }

    protected function rules() {
        return [
            'title' => ['required', 'max:50'],
            'subtitle' => ['required', 'max:150'],
            'content' => ['required'],
            'newImg' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    protected function messages()
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul maksimal 50 karakter.',

            'subtitle.required' => 'Subtitle wajib diisi.',
            'subtitle.max' => 'Subtitle maksimal 150 karakter.',

            'content.required' => 'Konten wajib diisi.',

            'newImg.image' => 'File harus berupa gambar.',
            'newImg.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'newImg.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }



    public function updateArticle() {
        // dump($this->newImg);
        // dump($this->removeImg);
       try {
            $this->validate();
        } catch (ValidationException $e) {
            return Flux::toast(
                text: $e->validator->errors()->first(),
                heading: 'Validasi gagal',
                variant: 'danger'
            );
        } 


        $article = new Article;
        try {
            $update = $article->updateArticle(
                slug: $this->slug,
                title: $this->title,
                subtitle: $this->subtitle,
                content: $this->content,
                img: [
                    'new' => $this->newImg,
                    'remove' => $this->removeImg,
                ],
            );
        } catch (ConnectionException $e) {
             return Flux::toast(
                text: 'Gagal menghubungkan ke cloud, Pastikan Internet aktif',
                heading: 'Koneksi Error',
                variant: 'danger'
            );
        } catch (\Throwable $e) {
            report($e);
            return Flux::toast(
                text: 'Terjadi kesalahan saat mempublikasikan artikel.',
                heading: 'Error',
                variant: 'danger'
            );
        }


        if (!$update['slugChange']) {
            return;
        }
        return $this->redirect("/update/{$update['slug']}", navigate:true);

    }

    public function render()
    {
        return view('livewire.pages.main.update');
    }
}
