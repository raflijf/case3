
# LITERACY
Tugas case 3 dasar komputer dan pemrograman | Teknik Elektro 

## Fitur 
- Authentication Login dan Register (Native session auth)
- CRUD
- Softdelete (restore, delete permanent)
- Upload image ke cloud 
- Schedule Quotes (kata-kata hari ini)

## Tech Stack
- [Laravel 13](https://laravel.com/docs)
- [Livewire 4](https://livewire.laravel.com/docs)
- [Tailwind CSS 4.3 ](https://tailwindcss.com/docs)
- [Alpine.js ](https://alpinejs.dev/start-here)
- [Supabase Storage](https://supabase.com/docs/guides/storage)
- [Flux UI 2](https://fluxui.dev/docs)

## Requirement
- [PHP 8.5](https://www.php.net/manual/en/)
- [Composer](https://getcomposer.org/doc/)
- [Node.js](https://nodejs.org/docs/)
- [NPM](https://docs.npmjs.com/)
- [MySQL](https://dev.mysql.com/doc/) / Atau database lainnya 

## Limitasi
- UI/UX masih perlu ditingkatkan.
- Belum tersedia fitur reset password.
- Query database masih cukup banyak sehingga performa aplikasi bisa menurun ketika traffic meningkat.
(maklum deket deadline njir wkwkwkwkw)

## Instalasi
- Clone repo
    ```git clone https://github.com/raflijf/case3.git```
- Masuk ke direktori 
- install dependensi
    ```npm install```
    ```composer install```
- copy .env.example -> .env
- sesuaikan server database
- Buat App key
    ```php artisan key:generate```
- run migrate
- run app dan vite
    ```npm run dev```
    ```php artisan serve```
- run shedule (opsional)(untuk set quotes today)
    ```php artisan schedule:work```

## Port forwading 
- [ngrok](https://ngrok.com/) atau lainnya (tapi sesuaikan sendiri)
- Tambah kode berikut ke app\Providers\AppServiceProvider.php
    ``` 
        public function boot(): void
        {
            <!-- ...... -->
            if (app()->environment('local')) {
                URL::forceScheme('https');
            }
            <!-- ...... -->
        }
    ```
- di dir case3/ run :
    `npm run build`
    `php artisan serve`
- ngrok run : 
    `ngrok http 8000`
- copy forwarding
    `https://4e49-2400-9800-531-9821-1df2-c074-e56e-c200.ngrok-free.app`
- paste ke browser

(klo ada error atur sendiri aja 😁😁😁 )


