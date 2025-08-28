# 📖 Dokumentasi Aplikasi Belajar Bahasa Jepang

![Laravel](https://img.shields.io/badge/Laravel-10-red?logo=laravel&logoColor=white)
![React](https://img.shields.io/badge/React-18-blue?logo=react&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?logo=open-source-initiative&logoColor=white)
![Status](https://img.shields.io/badge/Status-Active-success?logo=github)

Aplikasi **Belajar Bahasa Jepang** adalah platform pembelajaran interaktif yang membantu pengguna mempelajari bahasa Jepang melalui berbagai fitur seperti pembelajaran huruf (Hiragana, Katakana, Kanji), kosakata, tata bahasa, dan sistem kuis dengan progress tracking.

---

## ✨ Fitur Utama
- **Sistem Autentikasi Pengguna** - Registrasi, login, dan manajemen profil  
- **Pembelajaran Karakter Jepang** - Hiragana, Katakana, dan Kanji dengan detail stroke order  
- **Kosakata** - Daftar kosakata terorganisir berdasarkan kategori dan level JLPT  
- **Tata Bahasa** - Penjelasan tata bahasa Jepang dengan contoh  
- **Sistem Kuis** - Berbagai jenis kuis untuk menguji pengetahuan  
- **Pelacakan Progress** - Sistem *spaced repetition* untuk mengingat materi  
- **Dashboard Interaktif** - Visualisasi progress belajar  
- **Admin Panel** - Fitur admin untuk mengelola konten (*tersembunyi*)  

---

## 🛠️ Teknologi yang Digunakan
### Backend
- Laravel 10 - PHP Framework  
- MySQL - Database  
- Laravel Sanctum - Authentication API  
- Laravel CORS - Cross-Origin Resource Sharing  

### Frontend
- React 18 - Library JavaScript untuk UI  
- Redux Toolkit - State management  
- Material-UI (MUI) - Komponen UI  
- React Router - Navigasi  
- Chart.js - Visualisasi data  
- Axios - HTTP client  

---

## 🗃️ Struktur Database
### Tabel Utama
#### `users`
id, name, email, email_verified_at, password, progress_level, last_studied_at, remember_token, created_at, updated_at

#### `japanese_characters`
id, character, type (hiragana/katakana/kanji), romaji, meaning, stroke_order, examples, jlpt_level, stroke_count, created_at, updated_at

#### `vocabularies`
id, word, reading, meaning, example_sentence, category, jlpt_level, related_kanji, created_at, updated_at

#### `grammar_rules`
id, rule_name, structure, explanation, example, level, created_at, updated_at

#### `quizzes`
id, title, type (hiragana/katakana/kanji/vocabulary/grammar), difficulty, time_limit, created_at, updated_at

#### `questions`
id, quiz_id, question_text, question_type (multiple_choice/fill_blank), options, correct_answer, explanation, item_id, item_type, created_at, updated_at

#### `user_progress`
id, user_id, progressable_type, progressable_id, mastery_level, last_reviewed, next_review, review_count, created_at, updated_at

#### `quiz_attempts`
id, user_id, quiz_id, score, total_questions, answers, time_spent, completed_at, created_at, updated_at


---

## 📊 API Endpoints
### Autentikasi
- `POST /api/register` - Registrasi pengguna baru  
- `POST /api/login` - Login pengguna  
- `POST /api/logout` - Logout pengguna  
- `GET /api/user` - Data pengguna saat ini  

### Karakter Jepang
- `GET /api/characters` - Daftar semua karakter  
- `GET /api/characters/{id}` - Detail karakter spesifik  
- `GET /api/characters/type/{type}` - Karakter berdasarkan jenis  

### Kosakata
- `GET /api/vocabularies` - Daftar kosakata  
- `GET /api/vocabularies/{id}` - Detail kosakata spesifik  
- `GET /api/vocabularies/level/{level}` - Kosakata berdasarkan level JLPT  

### Tata Bahasa
- `GET /api/grammar-rules` - Daftar aturan tata bahasa  
- `GET /api/grammar-rules/{id}` - Detail aturan tata bahasa spesifik  
- `GET /api/grammar-rules/level/{level}` - Aturan tata bahasa berdasarkan level  

### Kuis
- `GET /api/quizzes` - Daftar kuis  
- `GET /api/quizzes/{id}` - Detail kuis spesifik  
- `POST /api/quizzes/{id}/attempt` - Submit attempt kuis  

### Progress Pengguna
- `GET /api/progress` - Progress belajar pengguna  
- `POST /api/progress` - Update progress  
- `GET /api/stats` - Statistik progress  

### Review
- `GET /api/review-items` - Item yang perlu direview hari ini  
- `POST /api/review-progress` - Update progress setelah review  

### Admin (Tersembunyi)
- `POST /admin/quizzes` - Buat quiz baru  
- `POST /admin/questions` - Buat pertanyaan baru  
- `GET /admin/quizzes` - Daftar quiz (admin view)  
- `DELETE /admin/quizzes/{id}` - Hapus quiz  

---

## 🚀 Instalasi dan Menjalankan
### Prerequisites
- PHP 8.1+  
- Composer  
- Node.js 16+  
- MySQL 8.0+  

### Backend (Laravel)
```bash
# Clone repository
git clone https://github.com/username/japanese-learning.git

# Masuk ke direktori backend
cd backend

# Install dependencies
composer install

# Copy file environment
cp .env.example .env

# Setup database di .env
DB_DATABASE=japanese_learning
DB_USERNAME=root
DB_PASSWORD=

# Generate key
php artisan key:generate

# Jalankan migration & seeder
php artisan migrate
php artisan db:seed

# Jalankan server
php artisan serve



