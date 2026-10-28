tutor port forwading
*atur
    <!-- **literacy/.env
        = APP_URL=https://7339-2404-8000-1085-46b1-b1de-8155-ae3678.ngrok-free.app -->

    **literacy/app/providers/AppServiceProvider.php
        = {
            public function boot(): void
            {
                .....

                <!-- tambahke ini  -->
                if (app()->environment('local')) {
                    URL::forceScheme('https');
                }
            }
        }


*running  command
    - npm run build
    - php artisan opmimize:clear

*bukak ngrok
    - ngrok http 8000    