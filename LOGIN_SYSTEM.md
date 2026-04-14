# Sistem Login Admin - SD N 3 Srikandang

## 📋 Ringkasan

Sistem login admin telah dibuat dan diperbaiki dengan fitur keamanan yang lengkap, termasuk validasi, otorisasi, dan proteksi route.

## 🔐 Fitur Utama

### 1. **Route Login**
- **URL Login**: `/login-admin`
- **URL Legacy**: `/admin/login` (otomatis redirect ke `/login-admin`)
- **Method GET**: Menampilkan halaman login
- **Method POST**: Memproses autentikasi

### 2. **Validasi & Otorisasi**

#### Validasi Input
```php
'email' => ['required', 'email'],
'password' => ['required', 'string'],
```

#### Otorisasi
- Hanya user dengan `is_admin = true` yang bisa login
- Session-based authentication
- Password di-hash menggunakan bcrypt
- Session regeneration setelah login untuk mencegah session fixation

### 3. **Proteksi Route**

#### Middleware: `AdminAuthenticated`
- Lokasi: `app/Http/Middleware/AdminAuthenticated.php`
- Semua route admin dilindungi kecuali `/login-admin`
- Otomatis redirect ke `/login-admin` jika belum login
- Verifikasi user masih ada dan masih admin di database

#### Route yang Dilindungi (harus login):
```
/admin                   → Dashboard
/admin/akun              → Account management
/admin/guru              → Teacher CRUD
/admin/program           → Program CRUD
/admin/prestasi          → Achievement CRUD
/admin/galeri            → Gallery management
```

#### Route Publik (tidak perlu login):
```
/login-admin             → Halaman login
/admin/login             → Redirect ke /login-admin
```

## 🎨 UI/UX Login

### Fitur Halaman Login
1. **Desain Modern**
   - Gradient background hijau (green-emerald)
   - Card dengan shadow dan rounded corners
   - Animasi smooth pada load dan hover

2. **User Experience**
   - Show/hide password toggle
   - Loading state saat submit
   - Error messages yang jelas
   - Auto-focus pada email field
   - Link kembali ke beranda

3. **Responsive**
   - Mobile-friendly
   - Works pada semua ukuran layar

## 🛡️ Keamanan

### 1. Rate Limiting
- **5 request per menit** untuk endpoint login
- Mencegah brute force attack
- Middleware: `throttle:5,1`

### 2. Session Security
- Session regeneration setelah login
- Session invalidation saat logout
- CSRF token protection
- Password hashing dengan bcrypt

### 3. Authorization
- Cek `is_admin` flag saat login
- Verifikasi user masih admin di middleware
- Session-based authentication (bukan cookie)

## 📝 Cara Menggunakan

### Untuk Admin
1. Buka browser dan akses: `http://localhost:8000/login-admin`
2. Masukkan email dan password admin
3. Klik "Masuk ke Dashboard"
4. Akan diarahkan ke dashboard admin

### Default Credentials (jika ada seeder)
```
Email: admin@sekolah.id
Password: (sesuai yang ada di database)
```

### Membuat Admin Baru
```php
// Menggunakan tinker
php artisan tinker

// Buat admin baru
$user = new \App\Models\User();
$user->name = 'Admin Sekolah';
$user->email = 'admin@sekolah.id';
$user->password = bcrypt('password123');
$user->is_admin = true;
$user->save();
```

## 🔄 Flow Login

```
User akses /login-admin
    ↓
Input email & password
    ↓
POST ke /login-admin
    ↓
Validasi input format
    ↓
Cek email ada & is_admin = true
    ↓
Cek password benar (Hash::check)
    ↓
Set session: admin_authenticated & admin_user_id
    ↓
Redirect ke /admin (dashboard)
```

## 🚫 Proteksi Akses

### Jika Belum Login
- Akses `/admin` → Redirect ke `/login-admin`
- Akses `/admin/guru` → Redirect ke `/login-admin`
- Akses route admin lainnya → Redirect ke `/login-admin`

### Jika Sudah Login
- Akses `/login-admin` → Redirect ke `/admin` (dashboard)
- Tidak perlu login ulang sampai session expired atau logout

### Logout
- POST ke `/admin/logout`
- Session dihapus
- Redirect ke `/login-admin`

## 📁 File Struktur

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Admin/
│   │       └── AuthController.php       # Logic autentikasi
│   └── Middleware/
│       └── AdminAuthenticated.php       # Proteksi route
├── Models/
│   └── User.php                         # User model
resources/
└── views/
    └── admin/
        └── login.blade.php              # Halaman login
routes/
└── web.php                              # Route definitions
```

## 🔍 Testing

### Test Akses Tanpa Login
```
1. Akses: http://localhost:8000/admin
2. Expected: Redirect ke /login-admin
```

### Test Login
```
1. Akses: http://localhost:8000/login-admin
2. Input email & password yang salah
3. Expected: Error message "Email atau password salah"
4. Input email & password yang benar
5. Expected: Redirect ke /admin
```

### Test Rate Limiting
```
1. Coba login dengan credentials salah > 5 kali dalam 1 menit
2. Expected: Too Many Requests error (429)
```

### Test Logout
```
1. Login dulu
2. POST ke /admin/logout
3. Expected: Redirect ke /login-admin
4. Coba akses /admin
5. Expected: Redirect ke /login-admin (karena sudah logout)
```

## ⚠️ Catatan Penting

1. **Jangan pernah** menyimpan password dalam plain text
2. **Selalu** gunakan `bcrypt()` atau `Hash::make()` untuk password
3. **Pastikan** `is_admin` flag diset `true` untuk user admin
4. **Session timeout** tergantung konfigurasi Laravel (default 120 menit)
5. **HTTPS** direkomendasikan untuk production

## 🐛 Troubleshooting

### Problem: Tidak bisa login
**Solusi:**
- Pastikan email dan password benar
- Pastikan user memiliki `is_admin = true`
- Cek log di `storage/logs/laravel.log`

### Problem: Redirect loop
**Solusi:**
- Clear cache: `php artisan cache:clear`
- Clear session: `php artisan session:flush`
- Clear config cache: `php artisan config:clear`

### Problem: Rate limit terlalu cepat
**Solusi:**
- Tunggu 1 menit
- Atau ubah throttle di `routes/web.php`

## 📞 Support

Jika ada masalah atau pertanyaan, hubungi developer yang menangani sistem ini.

---

**Terakhir diupdate**: April 2026
**Versi**: 1.0.0
