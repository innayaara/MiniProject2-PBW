# 🌸 Mini Project — Portfolio Website  
---

## ✨ Personal Portfolio Web Application  

Website portofolio statis dengan konsep **clean, professional, dan pink aesthetic**  
yang menampilkan profil diri, skills, serta certificates.

---

## 🛠 Built With  

<p align="center">

<img src="https://img.shields.io/badge/HTML5-Structure-E34F26?style=for-the-badge&logo=html5&logoColor=white"/>
<img src="https://img.shields.io/badge/CSS3-Styling-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
<img src="https://img.shields.io/badge/Bootstrap 5-Framework-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white"/>
<img src="https://img.shields.io/badge/Vue.js-Library-42B883?style=for-the-badge&logo=vue.js&logoColor=white"/>

</p>

---

## 🎯 Project Overview  

Portfolio website ini dibuat untuk memenuhi tugas Mini Project Pemrograman Berbasis Web.  
Website dirancang menggunakan struktur HTML yang semantik, styling CSS custom,  
serta bantuan Bootstrap 5 dan Vue JS untuk pengelolaan data yang lebih terstruktur.

---

## 🌷 Student Information   

| ✨ Nama Lengkap              | 🆔 NIM        | 📚 Kelas                 |
|------------------------------|---------------|--------------------------|
| **Indah Maramin Al Inayah**  | 2409116086    | Sistem Informasi C 2024  |

---

## 🌷 Fitur Website  
Deskripsi tampilan dan fungsi setiap section.

<details>
<summary><b>1. Home Section</b></summary>
<br>

<div align="center">
  <img width="1919" height="1013" alt="image" 
  src="https://github.com/user-attachments/assets/98024393-4edc-4fe3-90d1-0120445affe4" />

  <p align="center">
  <b><em>Home Section</em></b><br>
  Section Home merupakan tampilan pertama yang dilihat oleh pengunjung website. 
  Bagian ini dirancang sebagai hero section dengan layout dua kolom menggunakan 
  Bootstrap Grid System.
  <br><br>
  Pada halaman ini juga terdapat beberapa elemen yang ditampilkan, yaitu:
  <br>
  - Foto profil berbentuk lingkaran dengan efek shadow dan glow<br>
  - Nama lengkap Indah Maramin Al Inayah dengan highlight warna pink<br>
  - Button Explore More<br>
  - Icon Instagram beserta username<br>
  - Background gradient pink<br>
  - Navbar fixed di bagian atas<br>
  Tampilan dibuat clean dan minimalis untuk memberi kesan profesional serta modern.
  </p>

</div>
<br>
</details>

<details>
<summary><b>2. About Me Section</b></summary>
<br>

<div align="center">
  <img width="1919" height="1003" alt="image" 
  src="https://github.com/user-attachments/assets/f87b79f8-dd33-4afe-b206-7861cc2b9661" />

  
  <p align="center">
  <b><em>Abour Me Section</em></b><br>
  Section About me berisi informasi singkat mengenai profil diri dan pengalaman organisasi.
  <br><br>
  Elemen yang ditampilkan:
  <br>
  - Deskripsi singkat tentang diri<br>
  - Informasi posisi sebagai Department Relacs<br>
  - Daftar skills dalam bentuk progress bar<br>
  
  Skills ditampilkan menggunakan progress bar Bootstrap untuk memperlihatkan tingkat kemampuan secara visual. Layout disusun secara rapi dan responsif agar tetap nyaman dilihat di berbagai ukuran layar.
  </p>:
  
  <br>
  </p>

</div>
<br>
</details>

<details>
<summary><b>3. Certificates Section</b></summary>
<br>

<div align="center">
  <img width="1914" height="204" alt="image" 
  src="https://github.com/user-attachments/assets/d1e9a28b-0c8a-4707-b48e-72342734dbdb" />

  <p align="center">
  <b><em>Certificates Section</em></b><br>
  Section Certificates menampilkan data sertifikat dalam bentuk card layout menggunakan Bootstrap.
  <br><br>
  Website ini menampilkan 4 sertifikat, setiap card terdiri atas:
  <br>
  - Gambar sertifikat<br>
  - Judul sertifikats<br>
  - Deskripsi singkat<br>
  
  Layout menggunakan sistem grid agar tampilkan tetap rapi dan responsif pada dekstop.
  </p>:
  
  <br>
  </p>

</div>
<br>
</details>

<details>
<summary><b>4. Navbar</b></summary>
<br>

<div align="center">
  <img width="1914" height="204" alt="Screenshot 2026-03-01 114933" 
  src="https://github.com/user-attachments/assets/daa20d95-9460-4172-ae11-a659fa9909b9" />

  <img width="1917" height="270" alt="image" 
  src="https://github.com/user-attachments/assets/647cfa0f-0cad-45b1-b786-fee0b9e8e088" />

  <p align="center">
  <b><em>Navbar</em></b><br>
  Navbar terletah di bagian atas website dan bersifat fixed-top. Menu navigasi terdiri dari home, about, dan certificates.
  <br><br>
  Navbar memiliki efek perubahan tampilan saat halaman di-scroll:
  <br>
  - Saat dibagian atas background menjadi transparan<br>
  - Saat di scroll background menjadi putih dengan shadow<br>
  
  Struktur navigasi disusun menggunakan komponen Bootstrap sehingga tampil rapi dan konsisten.
  </p>:
  
  <br>
  </p>

</div>
<br>
</details>

---

## 💻 Penjelasan Kode  
Pembahasan struktur HTML, CSS, Bootstrap, dan Vue JS.

<details>
<summary><b>1. Home Section</b></summary>
<br>

Home section menggunakan Bootstrap Grid System untuk membagi layout menjadi dua kolom (foto dan teks).

```html
<section id="home" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 text-center">
        <img src="images/foto.jpeg" class="hero-img">
      </div>
      <div class="col-lg-7 text-center text-lg-start">
        <h1>Hi, I'm <span>{{ nama }}</span></h1>
      </div>
    </div>
  </div>
</section>
```
- `container`: Membungkus elemen sesuai Grid System Bootstrap.
- `row`: Membuat baris layout.
- `col-lg-5` dan `col-lg-7`: Membagi layout menjadi 5 dan 7 kolom dari total 12 kolom.
- `d-flex align-items-center`: Menggunakan Flexbox Bootstrap untuk vertical alignment.
- `{{ nama }}`: Menggunakan Vue Interpolation untuk menampilkan data dari `data()`.

<br>
</details>

<details>
<summary><b>2. About Me Section</b></summary>
<br>

Section ini berisi deskripsi diri dan skill cards dengan progress bar custom.

```html
<div class="col-md-6 col-lg-4">
  <div class="skill-card">
    <h6>UI/UX Design</h6>
    <div class="skill-bar">
      <div class="skill-fill" style="width:90%"></div>
    </div>
    <span>90%</span>
  </div>
</div>
```
- `col-md-6 col-lg-4`  
  Menggunakan Grid System Bootstrap.
  - Pada ukuran **tablet (≥768px)** akan menampilkan 2 kolom.
  - Pada ukuran **desktop (≥992px)** akan menampilkan 3 kolom.
  
- `skill-card`  
  Class custom yang digunakan untuk membuat tampilan card dengan:
  - background putih
  - border-radius
  - box-shadow
  - efek hover

- `skill-bar`  
  Digunakan sebagai background progress bar.

- `skill-fill`  
  Menampilkan level kemampuan berdasarkan properti `width` (contoh: 90%).

- `<span>90%</span>`  
  Menampilkan persentase kemampuan secara teks.
  
Section ini memadukan Bootstrap Grid System dan CSS custom untuk menghasilkan tampilan skill yang responsif dan aesthetic.

<br>
</details>

<details>
<summary><b>3. Certificates Section</b></summary>
<br>

Menggunakan Bootstrap Card dan Vue v-for untuk menampilkan data sertifikat.

```html
<div class="col-md-6 col-lg-3 mb-4" v-for="cert in certificates">
  <div class="card certificate-card">
    <img :src="cert.image" class="card-img-top">
    <div class="card-body">
      <h6>{{ cert.title }}</h6>
      <p>{{ cert.desc }}</p>
    </div>
  </div>
</div>
```
- `col-md-6 col-lg-3`: Menggunakan Grid System Bootstrap untuk mengatur lebar kolom.
- `mb-4`: Utility class Bootstrap untuk memberikan margin-bottom agar terdapat jarak antar card.
- `v-for="cert in certificates"`: Directive Vue JS yang digunakan untuk melakukan perulangan (looping) data dari array certificates yang dideklarasikan di dalam data().
- `card`: Class bawaan Bootstrap untuk membuat komponen card dengan struktur yang sudah terformat.
- `certificate-card`: Class custom yang dibuat pada style.css untuk menambahkan styling tambahan seperti shadow, border-radius, atau efek hover.
- `<img :src="cert.image">`: Menggunakan binding Vue (:) untuk mengambil nilai image dari setiap objek cert dalam array certificates.
- `card-img-top`: Class Bootstrap untuk menempatkan gambar di bagian atas card dengan styling bawaan.
- `{{ cert.title }}`: Vue Interpolation untuk menampilkan nilai title dari setiap data sertifikat.
- `{{ cert.desc }}`: Vue Interpolation untuk menampilkan deskripsi sertifikat dari array certificates.

<br>
</details>

<details>
<summary><b>4. Navbar</b></summary>
<br>

Navbar menggunakan komponen Bootstrap 5 dan responsive collapse.

```html
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Hi! Call me Naya</a>
  </div>
</nav>
```
- `<nav>`: Elemen HTML semantik yang digunakan untuk mendefinisikan bagian navigasi pada halaman website.
- `navbar `: Class bawaan Bootstrap yang digunakan untuk membuat komponen navigasi dengan styling default.
- `navbar-expand-lg`: Class Bootstrap yang mengatur perilaku ekspansi navbar.
- `fixed-top`: Membuat navbar tetap berada di bagian atas halaman meskipun pengguna melakukan scroll.
- `container`: Membungkus isi navbar agar sejajar dengan konten section lainnya serta mengikuti Grid System Bootstrap.
- `navbar-brand`: Digunakan untuk menampilkan identitas atau nama website pada navbar.
- `fw-bold`: Utility class Bootstrap untuk membuat teks menjadi lebih tebal (font-weight bold).
- `href="#"`: Menunjukkan bahwa link tersebut mengarah ke bagian atas halaman.

<br>
</details>

---

## ⚙️ Teknologi yang Digunakan  
Daftar tools dan framework yang digunakan.

<details>
<summary><b>1. HTML</b></summary>
<br>

HTML digunakan sebagai struktur utama dalam membangun halaman website. Elemen-elemen seperti <nav>, <section>, <div>, <h1>, <p>, dan <img> digunakan untuk menyusun konten agar terstruktur dengan baik dan semantik.


- Foto profil berbentuk lingkaran dengan efek shadow dan glow<br>
- Nama lengkap Indah Maramin Al Inayah dengan highlight warna pink<br>
- Button Explore More<br>
- Icon Instagram beserta username<br>
- Background gradient pink<br>
- Navbar fixed di bagian atas<br>
Tampilan dibuat clean dan minimalis untuk memberi kesan profesional serta modern.

<br>
</details>

<details>
<summary><b>2. CSS</b></summary>
<br>

CSS digunakan untuk mengatur tampilan dan desain visual website, seperti:

- Warna dan tema pink aesthetic
- Background gradient
- Shadow dan hover effect
- Custom styling untuk button dan card
- Pengaturan font dan spacingn highlight warna pink<br>

CSS juga digunakan untuk membuat tampilan terlihat clean dan professional.

<br>
</details>

<details>
<summary><b>3. Bootstrap 5</b></summary>
<br>

Bootstrap 5 digunakan untuk mempermudah proses layouting dan styling dengan memanfaatkan komponen dan utility class yang sudah tersedia.

Fitur Bootstrap yang digunakan antara lain:

- Navbar
- Container
- Grid System (row, col-md, col-lg)
- Card
- Button
- Progress Bar
- Utility spacing (mt-, mb-, py-)

Bootstrap membantu membuat tampilan lebih rapi dan konsisten.

<br>
</details>

<details>
<summary><b>4. Vue JS</b></summary>
<br>

Vue JS digunakan untuk membuat tampilan lebih dinamis meskipun data yang digunakan bersifat statis.

Fitur Vue yang digunakan:

- data() untuk menyimpan data skills dan certificates
- Interpolation {{ }} untuk menampilkan data ke HTML
- Directive v-for untuk melakukan perulangan data
- Binding atribut menggunakan :src
- .mount('#app') untuk menghubungkan Vue ke elemen HTML

Vue digunakan untuk mempermudah pengelolaan data dan membuat kode lebih terstruktur.

<br>
</details>

<details>
<summary><b>5. Font Awesome</b></summary>
<br>

Font Awesome digunakan untuk menampilkan ikon seperti ikon Instagram pada hero section.

<br>
</details>
