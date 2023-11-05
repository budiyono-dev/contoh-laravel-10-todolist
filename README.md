## Install

1. clone repository
2. masuk ke directory
3. install dependency dengan perintah `composer install`
4. edit file `.env`, sesuaikan dengan database yang dimiliki, jika belum ada silahkan buat terlebih dahulu
	```
		DB_DATABASE=nama-database
		DB_USERNAME=username
		DB_PASSWORD=password
	```
5. jalankan `php artisan migrate:fresh`
7. jalankan `php artisan serve`
8. buka browser ketikan `localhost:8000` 