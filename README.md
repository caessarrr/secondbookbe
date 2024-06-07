# Konsep Aplikasi Marketplace SecondBook (MVP)

## 1. Deskripsi Umum
Aplikasi marketplace ini adalah platform online di mana berbagai pemilik toko dapat mendaftar dan menjual buku kepada pelanggan. Admin memiliki kontrol penuh untuk mengelola pengguna, produk, dan transaksi.

## 2. Peran Pengguna
### 1. Admin
- Mengelola pengguna (pemilik toko dan pelanggan)
- Mengelola produk
- Mengelola kategori buku
- Mengelola transaksi dan laporan penjualan
- Memoderasi konten yang masuk

### 2. Pemilik Toko
- Mendaftar dan mengelola akun
- Menambah, mengedit, dan menghapus produk (buku)
- Mengelola stok produk
- Melihat dan mengelola pesanan dari pelanggan
- Melihat laporan penjualan toko mereka
- Melihat penghasilan dan melakukan penarikan dana

### 3. Pelanggan
- Mendaftar dan mengelola akun
- Melihat dan mencari produk (buku)
- Menambahkan produk ke keranjang belanja
- Melakukan checkout dan pembayaran
- Melihat riwayat pembelian dan status pesanan

## 3. Fitur Utama
### 1. Registrasi dan Autentikasi
- Sistem registrasi dan login untuk admin, pemilik toko, dan pelanggan
- Reset password

### 2. Manajemen Produk
- Admin dan pemilik toko dapat menambah, mengedit, dan menghapus produk
- Fitur upload gambar produk
- Kategori produk

### 3. Manajemen Pengguna
- Admin dapat melihat, mengedit, dan menghapus akun pengguna
- Pemilik toko dan pelanggan dapat mengelola profil mereka

### 4. Transaksi
- Pelanggan dapat menambah produk ke keranjang dan melakukan checkout
- Sistem pembayaran (misalnya integrasi dengan payment gateway)
- Konfirmasi pesanan dan pemberitahuan status

### 5. Dashboard
- Admin memiliki dashboard untuk melihat statistik pengguna, produk, dan penjualan
- Pemilik toko memiliki dashboard untuk melihat statistik penjualan dan penghasilan toko mereka
- Fitur penarikan dana bagi pemilik toko

### 6. Search dan Filter
- Pelanggan dapat mencari produk berdasarkan nama, kategori, atau filter lainnya

### 7. Notifikasi
- Notifikasi email untuk konfirmasi pendaftaran, pemesanan, dan update status pesanan

### 8. Review dan Rating
- Pelanggan dapat memberikan review dan rating pada produk yang dibeli

## 4. Struktur Database (HighLevel)
### 1. Users
- id, name, email, password, profile_details, created_at, updated_at

### 2. Roles
- id, role_name (admin, store owner, customer), description

### 3. User_Roles
- user_id (foreign key to Users), role_id (foreign key to Roles)

### 4. Stores
- id, user_id (foreign key to Users), store_name, store_details

### 5. Products
- id, store_id (foreign key to Stores), name, description, price, stock, category_id (foreign key to Categories), images

### 6. Categories
- id, name

### 7. Orders
- id, user_id (foreign key to Users), total_amount, status, created_at, updated_at

### 8. Order_Items
- id, order_id (foreign key to Orders), product_id (foreign key to Products), quantity, price

### 9. Reviews
- id, product_id (foreign key to Products), user_id (foreign key to Users), rating, comment, created_at

### 10. Withdrawals
- id, store_id (foreign key to Stores), amount, status, created_at, updated_at

### 11. Earnings
- id, store_id (foreign key to Stores), total_earnings, available_for_withdrawal, pending_withdrawal, created_at, updated_at

## 5. User Flow
### 1. Admin
- Login ke dashboard admin
- Melihat statistik pengguna dan transaksi
- Mengelola pengguna (menambah, mengedit, menghapus)
- Mengelola produk dan kategori
- Mengelola laporan penjualan
- Menyetujui atau menolak permintaan penarikan dana dari pemilik toko

### 2. Pemilik Toko
- Registrasi dan login
- Membuat dan mengelola toko mereka
- Menambah dan mengelola produk
- Melihat dan mengelola pesanan masuk
- Melihat laporan penjualan dan penghasilan toko mereka
- Mengajukan permintaan penarikan dana

### 3. Pelanggan
- Registrasi dan login
- Menjelajah dan mencari produk
- Menambah produk ke keranjang
- Melakukan checkout dan pembayaran
- Melihat riwayat pembelian dan status pesanan

## 6. Teknologi yang Digunakan
- Backend: Laravel
- Frontend: Next.js
- Database: MySQL/PostgreSQL
- Autentikasi: Laravel Passport/Sanctum
- Payment Gateway: Stripe, Midtrans, atau lainnya
- Perhitungan Ongkir: Raja Ongkir
- Deployment: AWS, DigitalOcean, atau layanan cloud lainnya

## Penutup
Dengan konsep ini, aplikasi marketplace mencakup fitur tambahan yang memungkinkan pelanggan untuk melakukan checkout, serta pemilik toko untuk melihat penghasilan dan melakukan penarikan dana. Struktur database yang diperbarui memastikan bahwa semua informasi terkait peran pengguna, produk, transaksi, dan penarikan dana dikelola dengan baik. Fokus pada MVP tetap dipertahankan untuk memastikan fitur inti berfungsi dengan baik dan siap untuk diuji di pasar.
