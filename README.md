# 👟 Tokogue — Toko Online Sneakers

**Tokogue** adalah aplikasi web toko online yang menjual berbagai macam sneakers dengan sistem pembayaran online menggunakan **Midtrans Payment Gateway**.

---

## 🎯 Fitur

✅ Daftar produk sneakers lengkap dengan detail & foto  
✅ Keranjang belanja  
✅ Checkout dengan integrasi **Midtrans**  
✅ Login & register pengguna  
✅ Riwayat pesanan & status pembayaran  
✅ Dashboard admin untuk mengelola produk & pesanan

---

## 🛠️ Teknologi

- [Laravel](https://laravel.com/) — PHP Framework untuk backend
- [MySQL/MariaDB](https://www.mysql.com/) — Database
- [Tailwind](https://tailwindcss.com/) — Styling frontend
- [Midtrans](https://midtrans.com/) — Payment Gateway
- [Composer](https://getcomposer.org/) — PHP dependency manager
- [npm](https://www.npmjs.com/) — Frontend assets

---

## 📋 Cara Install & Jalankan
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

### 1️⃣ Clone repository
```bash
git clone https://github.com/Ariffadillahh/TokoGue.git
cd TokoGue
