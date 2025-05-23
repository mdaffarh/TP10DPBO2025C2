# TP10DPBO2025C2

## Janji
Saya Muhammad Daffa Rizmawan Harahap mengerjakan TP10 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Program
Program ini merupakan aplikasi sistem manajemen hotel sederhana yang dibangun menggunakan PHP dengan pola arsitektur MVVM (Model-View-ViewModel). Aplikasi ini memungkinkan pengelolaan data kamar hotel, tamu, dan reservasi dengan antarmuka web yang user-friendly.

## Konsep MVVM (Model-View-ViewModel)

### 1. Model
Model berfungsi sebagai representasi data dan logika bisnis aplikasi:
- **Room.php**: Mengelola data kamar hotel (id, number, type, price)
- **Guest.php**: Mengelola data tamu (id, name, phone)
- **Reservation.php**: Mengelola data reservasi (id, room_id, guest_id, check_in, check_out)

Model bertanggung jawab untuk:
- Operasi CRUD (Create, Read, Update, Delete)
- Validasi data
- Interaksi dengan database
- Implementasi logika bisnis

### 2. View
View adalah lapisan presentasi yang menampilkan data kepada pengguna:
- **Template files** (*.php): File HTML dengan embedded PHP untuk menampilkan data
- **guest_form.php**: Form untuk input/edit data tamu
- **guest_list.php**: Daftar tamu yang terdaftar
- **reservation_form.php**: Form untuk membuat/edit reservasi
- **reservation_list.php**: Daftar reservasi
- **room_form.php**: Form untuk input/edit data kamar
- **room_list.php**: Daftar kamar hotel
- **header.php & footer.php**: Template dasar untuk konsistensi tampilan

### 3. ViewModel
ViewModel bertindak sebagai perantara antara Model dan View:
- **GuestViewModel.php**: Mengelola logika presentasi untuk data tamu
- **ReservationViewModel.php**: Mengelola logika presentasi untuk data reservasi
- **RoomViewModel.php**: Mengelola logika presentasi untuk data kamar

ViewModel bertugas:
- Mengambil data dari Model
- Memformat data untuk ditampilkan di View
- Menangani input dari View dan meneruskannya ke Model
- Implementasi logika presentasi

## Relasi Database

### Struktur Database
Database terdiri atas 3 tabel utama dengan relasi sebagai berikut:

#### Tabel `rooms`
- **id** (int, Primary Key, Auto Increment): Identifikator unik kamar
- **number** (varchar(10)): Nomor kamar
- **type** (varchar(50)): Tipe kamar (Single, Double, Suite, dll.)
- **price** (decimal(10,2)): Harga kamar per malam

#### Tabel `guests`
- **id** (int, Primary Key, Auto Increment): Identifikator unik tamu
- **name** (varchar(100)): Nama lengkap tamu
- **phone** (varchar(20)): Nomor telepon tamu

#### Tabel `reservations`
- **id** (int, Primary Key, Auto Increment): Identifikator unik reservasi
- **room_id** (int, Foreign Key): Referensi ke tabel rooms
- **guest_id** (int, Foreign Key): Referensi ke tabel guests
- **check_in** (date): Tanggal check-in
- **check_out** (date): Tanggal check-out

### Relasi Antar Tabel
1. **One-to-Many**: `rooms` → `reservations`
   - Satu kamar dapat memiliki banyak reservasi (pada waktu berbeda)
   
2. **One-to-Many**: `guests` → `reservations`
   - Satu tamu dapat memiliki banyak reservasi

3. **Many-to-One**: `reservations` → `rooms`
   - Banyak reservasi dapat merujuk ke satu kamar
   
4. **Many-to-One**: `reservations` → `guests`
   - Banyak reservasi dapat merujuk ke satu tamu

## Desain Program

### Database
![Database Schema](https://github.com/user-attachments/assets/76c1e01e-d12b-49d5-ad31-3785f1ce6c6a)

### Struktur Folder
![Folder Structure](https://github.com/user-attachments/assets/f32d87b5-4128-4693-b34a-e7f2adee8e4c)

## Alur Program

### 1. Inisialisasi
- Aplikasi dimulai melalui `index.php`
- File konfigurasi `Database.php` memuat koneksi ke database
- Router menentukan halaman yang akan ditampilkan berdasarkan request

### 2. Pengelolaan Data Kamar
1. **Tambah Kamar**: User mengisi form → ViewModel memvalidasi → Model menyimpan ke database
2. **Lihat Daftar Kamar**: Model mengambil data → ViewModel memformat → View menampilkan
3. **Edit Kamar**: User memilih kamar → Form terisi data lama → Update melalui Model
4. **Hapus Kamar**: User konfirmasi → Model menghapus dari database

### 3. Pengelolaan Data Tamu
1. **Registrasi Tamu**: Input data tamu → Validasi → Simpan ke database
2. **Daftar Tamu**: Tampilkan semua tamu terdaftar
3. **Update Data Tamu**: Edit informasi tamu yang sudah ada
4. **Hapus Tamu**: Menghapus data tamu (dengan validasi reservasi aktif)

### 4. Pengelolaan Reservasi
1. **Buat Reservasi**: 
   - Pilih kamar yang tersedia
   - Pilih/daftarkan tamu
   - Tentukan tanggal check-in dan check-out
   - Validasi ketersediaan kamar
   - Simpan reservasi
2. **Lihat Reservasi**: Tampilkan daftar reservasi dengan detail kamar dan tamu
3. **Edit Reservasi**: Ubah tanggal atau pindah kamar (jika tersedia)
4. **Batalkan Reservasi**: Hapus reservasi dari sistem

### 5. Validasi dan Error Handling
- Validasi format data input
- Pengecekan ketersediaan kamar untuk tanggal tertentu
- Penanganan error database
- Konfirmasi sebelum penghapusan data

## Fitur Utama
- **Manajemen Kamar**: CRUD operations untuk data kamar hotel
- **Manajemen Tamu**: Registrasi dan pengelolaan data tamu
- **Sistem Reservasi**: Pembuatan dan pengelolaan reservasi
- **Validasi Ketersediaan**: Pengecekan konflik jadwal reservasi
- **Interface Responsif**: Tampilan yang mudah digunakan

## Teknologi yang Digunakan
- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Architecture Pattern**: MVVM (Model-View-ViewModel)

## Dokumentasi

### Room Management
https://github.com/user-attachments/assets/3ec5d056-5032-4063-8cdc-f29803ab7e07

### Guest Management
https://github.com/user-attachments/assets/fc035781-115a-47c6-abae-6cb755201d48

### Reservation Management
https://github.com/user-attachments/assets/07b320be-c2c1-466d-a79f-4b18b6a3fa81

## Cara Menjalankan
1. Clone repository ke local server (XAMPP/WAMP)
2. Import file database `db_tp10.sql` ke MySQL
3. Konfigurasi koneksi database di `config/Database.php`
4. Akses aplikasi melalui browser: `http://localhost/tp10dpbo2025c2`

## Kesimpulan
Aplikasi ini mendemonstrasikan implementasi pola MVVM dalam pengembangan web dengan PHP, menunjukkan pemisahan yang jelas antara logika data (Model), presentasi (View), dan logika presentasi (ViewModel). Struktur database yang terrelasi memungkinkan pengelolaan data hotel yang efisien dan konsisten.
