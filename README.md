# 🎟️ E-Ticket Plus

E-Ticket Plus adalah sebuah platform aplikasi web modern end-to-end yang menjembatani penyelenggara acara (promotor/admin) dengan pembeli tiket (customer). Platform ini tidak hanya sekadar menjual tiket, tetapi mengelola seluruh siklus hidup acara: mulai dari publikasi acara, sistem pembayaran terintegrasi berbasis QRIS, hingga validasi tiket fisik di lokasi acara (check-in) menggunakan teknologi QR Code.

## 🌟 Masalah yang Diselesaikan
- Penjualan tiket manual yang rentan pemalsuan (diatasi dengan QR Code unik).
- Pengecekan mutasi bank yang membingungkan (diatasi dengan fitur Konfirmasi Pembayaran dan unggah bukti transfer).
- Sulitnya mengelola pengembalian dana (diatasi dengan fitur Request Refund terpusat).

---

## 💻 Teknologi yang Digunakan (Tech Stack)
- **Backend:** **Laravel** (Framework PHP modern) yang menangani logika sistem, keamanan (middleware), routing, dan koneksi ke database.
- **Database:** **MySQL** terhubung menggunakan sistem migrasi dan *Eloquent ORM* dari Laravel.
- **Frontend / UI:** Menggunakan kombinasi **Blade Templating**, **Bootstrap 5**, dan **Custom CSS**. 
- **Desain & Aset:** 
  - Menggunakan **Phosphor Icons** untuk ikon-ikon yang terlihat kekinian.
  - Mendukung fitur **Dark Mode** (Mode Gelap) penuh yang mengubah variabel warna sistem secara otomatis menggVunakan Javascript.
  - Pembuatan QR Code secara dinamis menggunakan *library* Simple QrCode.

---

## 🚶‍♂️ Alur Pengguna: Customer Journey (Sisi Pembeli)

1. **Eksplorasi (Homepage):** Pembeli datang ke halaman utama. Mereka disambut dengan UI yang estetik, animasi tiket melayang, dan bisa menggunakan **Fitur Pencarian Pintar** (berdasarkan Nama, Lokasi, dan Kategori event).
2. **Checkout (Beli Tiket):** Pembeli memilih tiket (Regular/VIP), mengisi nama, email, dan nomor HP.
3. **Sistem Pembayaran QRIS:** Pembeli diwajibkan memindai *barcode* QRIS yang disediakan dan **mengunggah foto bukti pembayaran** (struk/screenshot m-banking).
4. **Menerima Tiket (Status Pending):** Sistem menerbitkan E-Ticket, namun QR Code disembunyikan dan dilabeli **"Menunggu Konfirmasi Pembayaran"**. Ini mencegah pembeli memanipulasi tiket sebelum uang benar-benar masuk.
5. **Tiket Aktif:** Setelah admin mengonfirmasi uang masuk, E-Ticket otomatis aktif dan menampilkan gambar QR Code unik yang siap dibawa ke lokasi konser/seminar.
6. **Klaim Refund (Opsional):** Jika pembeli batal hadir, tersedia tombol "Ajukan Refund". Jika disetujui, tiket mereka otomatis di-cap **VOID / REFUNDED** dan tidak bisa digunakan.

---

## 🛠️ Alur Manajemen: Admin Journey (Sisi Penyelenggara)

1. **Dashboard & Analytics:** Admin dapat melihat metrik cepat (tiket terjual, pendapatan, tugas pending).
2. **Kelola Event (CRUD):** Admin bisa menambah acara baru, mengatur tanggal, menentukan harga tiket (VIP/Regular), kuota kursi, memasukkan kategori, hingga mengunggah poster acara.
3. **Konfirmasi Pembayaran:** Terdapat halaman khusus (menu ikon dompet). Admin memeriksa foto bukti transfer pembeli. Hanya dengan satu tombol **"Konfirmasi"**, tiket pembeli yang tadinya *pending* langsung aktif.
4. **Validasi Tiket (Di Hari-H Acara):** Petugas pintu masuk menggunakan menu **Validasi Tiket**. Mereka bisa meng-scan QR Code pembeli, dan sistem akan menjawab apakah tiket itu **Valid**, **Sudah Digunakan** (mencegah tiket fotokopian ganda masuk), atau **Tidak Ditemukan**.
5. **Kelola Refund:** Admin menyaring dan menyetujui permintaan refund pembeli secara sistematis (Approve/Reject).

---

## ✨ Fitur Unggulan

**1. Smart Dark Mode (Tema Gelap Cerdas)**
Sistem tidak hanya mengubah warna latar, tetapi juga menyesuaikan warna tabel, *border*, *glow effect*, hingga komponen bawaan Bootstrap agar tetap elegan tanpa merusak visibilitas teks.

**2. Sistem Keamanan "Anti-Bocor" Tiket**
Kami mendesain agar QR Code berharga tersebut disandera (disembunyikan) oleh sistem dan diberi watermark *Pending* sampai uang benar-benar masuk. Ini menjamin 0% celah bagi tiket palsu.

**3. UI/UX Sekelas Aplikasi Skala Besar**
Desain tidak menggunakan templat kaku. Kami menggunakan *glassmorphism*, bayangan bercahaya (*glow shadows*), transisi halus pada *hover* kartu, *pill-badges* untuk status tiket (Pending/Paid/Void), dan bentuk desain tiket fisik realistis dengan gerigi (cutout) pada halaman e-ticket.
