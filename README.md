# Portofolio Tia

Website portfolio modern berbasis Laravel 12 dengan admin panel Filament v3 untuk mengelola project, services, social media, dan pengaturan landing page secara dinamis.

---

# ✨ Fitur

- Admin Panel Filament v3
- Dynamic Portfolio Project
- Dynamic About Me
- Dynamic Services
- Dynamic Social Media
- Contact Form
- Upload Thumbnail & Profile Image
- Filament Shield Role & Permission
- Docker Environment
- Responsive Landing Page

---

# 🛠️ Tech Stack

| Technology | Version |
|---|---|
| Laravel | 12 |
| Filament | v3 |
| Livewire | v3 |
| Blade | Latest |
| MariaDB | Latest |
| Docker | Latest |

---

# 📦 Panduan Instalasi

## 1. Clone Repository

```bash
git clone https://github.com/username/portofoliotia.git
```

---

## 2. Masuk ke Project

```bash
cd portofoliotia
```

---

## 3. Jalankan Docker

```bash
dcu -d
```

atau jika belum ada alias:

```bash
docker compose up -d
```
## 3. Migration & Seeder
bash
dca migrate --seed

## 4. Generate Storage Link

bash
dca storage:link

## 5. Install Filament Shield

```bash
dca shield:generate --all

## 10. Jalankan Vite

```bash
npm run dev

# 🔐 Login Admin

| Email | Password |
|---|---|
| admin@admin.com | password |

# 🚀 Contoh Penggunaan

## Menambah Project

1. Login ke admin panel
2. Masuk ke menu `Projects`
3. Klik `Create`
4. Isi data project
5. Upload thumbnail
6. Simpan

---

## Mengubah About Me

1. Masuk ke menu `Settings`
2. Edit data profile
3. Upload foto profile
4. Simpan perubahan

---

## Menambah Service

1. Masuk ke menu `Services`
2. Klik `Create`
3. Isi title dan description
4. Simpan

---

# 🤝 Panduan Kontribusi

Contribution sangat terbuka.

## Langkah kontribusi:

1. Fork repository
2. Buat branch baru

```bash
git add .
```

3. Commit perubahan

```bash
git commit -m "Menambahkan feature baru"
```

4. Push branch

```bash
git push origin feature/nama-feature
```

5. Buat Pull Request

---

# 📁 Struktur Project

```bash
app/
├── Filament/
├── Models/
├── Http/
database/
├── migrations/
├── seeders/
resources/
├── views/


# 📄 Informasi Lisensi

Project ini menggunakan lisensi MIT.

Silakan digunakan untuk pembelajaran maupun pengembangan pribadi.



# 👨‍💻 Developer

Developed by Tia using Laravel & Filament.