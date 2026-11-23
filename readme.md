
# LITERACY
Tugas case 3 dasar komputer dan pemrograman | Teknik Elektro 

Terinspirasi dari [Medium](https://medium.com/)

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
- UI/UX masih perlu ditingkatkan
- Query database masih cukup banyak sehingga performa aplikasi bisa menurun ketika traffic meningkat.
(maklum deket deadline njir wkwkwkwkw)

## Instalasi

- Clone repo

  ```
    git clone https://github.com/raflijf/case3.git
  ```

- Masuk ke direktori case3/

- install dependensi

  ```
    npm install
    composer install
  ```

- copy .env.example -> .env

- sesuaikan config database

- Buat App key

  ```
    php artisan key:generate
  ```

- run migrate
    ``` 
        php artisan migrate
    ```

- run app dan vite

  ```
    npm run dev
    php artisan serve
  ```

- run shedule (opsional)(untuk set quotes today)

  ```
    php artisan schedule:work
  ```

## Why supabase storage?
oleh di dalam case itu tertulis "port forwading" jadi saya pakai cloud agar tidak memenuhi memory  device saya ketika orang lain mengakses web itu untuk mengupload gambar, 

(klo ada error boleh kirim email raflijf7@gmail.com atau chat wa (kalau ada 😁😁😁))


