<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Flux\FLux;
use Illuminate\Http\Client\ConnectionException;

class Create extends Component
{
    use WithFileUploads;
    
    public $title = '';
    public $subtitle = '';
    public $content = '';
    public $img = '';
    
    protected function rules() {
        return [
            'title' => ['required', 'max:50'],
            'subtitle' => ['required', 'max:150'],
            'content' => ['required'],
            'img' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
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

            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'img.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }

    public function publishArticle() {
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

            $slug = $article->publish(
                user_id:me()->id,
                title: $this->title,
                subtitle: $this->subtitle,
                content: $this->content,
                img: $this->img,
            );
            return $this->redirect("/article/$slug", navigate: true);
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
    }

    public function render()
    {
        return view('livewire.pages.main.create');
    }
}
