
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

- sesuaikan config database, Mail, dan supabase storage
  ```dotenv
    #database 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=literacy
    DB_USERNAME=root
    DB_PASSWORD=

    #Mail (reset password dan feedback)
    MAIL_MAILER=smtp
    MAIL_SCHEME=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=your-email@gmail.com
    MAIL_PASSWORD=your-app-password
    MAIL_FROM_ADDRESS=your-email@gmail.com
    MAIL_FROM_NAME=Literacy

    #Supabase Storage (upload image)
    SUPABASE_API_KEY=your-supabase-secret-key
    SUPABASE_UPLOAD_URL=https://your-project-id.supabase.co/storage/v1/object/your-bucket/your-file
    SUPABASE_PUBLIC_URL=https://your-project-id.supabase.co/storage/v1/object/public/your-bucket/
  ```

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

## Note
- oleh auth di App ini dibuat dari nol/native untuk method global user bawaan `auth()->user()` diganti jadi  `me()`

(klo ada error boleh kirim email raflijf7@gmail.com atau chat wa (kalau ada 😁😁😁))


