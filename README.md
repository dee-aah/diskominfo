
### Kerja Praktek di Diskominfo Kota Tasikmalaya
**Project Web Profil DPPKBP3A Kota Tasikmalaya**

**Kelompok**</br>
Dede Ahmad Maolana : 10222065</br>
Febry Widiana : 10222078</br>
Maulia Astuti Suryaningrum : 10222052</br>

**Cara Run Proyek laravel**

Jalan Kan docker lalu buka terminal
```
docker compose up -d --build
```
lalu  masuk ke container
```
docker exec -it laravel_app bash
```
```
php artisan key:generate
```
```
php artisan migrate
```
**Akses Web di Browser**
- Laravel App: http://localhost:8080
- phpMyAdmin: http://localhost:8081
