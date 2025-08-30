# Sistem Pengajuan Cuti, Lembur, dan Sakit - Laravel

Sistem ini dibuat menggunakan **Laravel** untuk memudahkan karyawan mengajukan cuti, lembur, dan sakit serta membantu admin dan superadmin mengelola pengajuan.

## Fitur

- Login multi-user (Karyawan, Admin, Superadmin)
- Dashboard berbeda sesuai role
- Pengajuan cuti, lembur, dan sakit
- Notifikasi status pengajuan
- Laporan dan histori pengajuan
- Filter berdasarkan periode dan jenis pengajuan

## Struktur Database

- `users` → data karyawan dan admin
- `roles` → jenis role (karyawan, admin, superadmin)
- `pengajuan` → catatan pengajuan cuti, lembur, dan sakit
- `notifikasi` → status pengajuan untuk user
- `log_aktivitas` → catatan aktivitas user di sistem

## Instalasi

1. Clone repository:

   ```bash
   git clone https://github.com/username/sistem-pengajuan.git
   cd sistem-pengajuan
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Setup environment:

```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan konfigurasi database pada file .env.

4. Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

5. Jalankan server:

```bash
php artisan serve
```
