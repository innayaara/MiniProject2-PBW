<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Indah Maramin Al Inayah - Portfolio</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="app">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container py-2">
      <a class="navbar-brand fw-bold fs-4" href="#home">Hi! Call me Naya</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-lg-3 text-center align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>

          <li class="nav-item ms-lg-3">
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
              <a href="admin.php" class="btn btn-pink rounded-pill btn-sm">Dashboard Admin</a>
              <a href="#"
                class="btn btn-outline-pink rounded-pill btn-sm ms-2"
                onclick="if (confirm('Apakah kamu yakin ingin logout?')) { window.location.href='logout.php'; } return false;">
                Logout
              </a>
            <?php else: ?>
              <a href="login.php" class="btn btn-pink rounded-pill btn-sm">Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section id="home" class="hero-section py-5">
    <div class="container py-lg-5">
      <div class="row align-items-center justify-content-center g-5">
        <div class="col-lg-5 text-center">
          <div class="hero-image-wrapper mx-auto">
            <img src="images/foto.jpeg" alt="Profile" class="img-fluid hero-image shadow">
          </div>
        </div>

        <div class="col-lg-7 text-center text-lg-start">
          <span class="badge rounded-pill hero-badge px-3 py-2 mb-3">UI/UX Designer</span>

          <h1 class="hero-title fw-bold mb-3">
            Hi, I'm {{ nama }}
          </h1>

          <p class="hero-tagline mb-3">
            {{ tagline }}
          </p>

          <p class="hero-desc text-muted mb-4">
            Designing meaningful digital experiences with aesthetic and functionality.
          </p>

          <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
            <a href="#about" class="btn btn-dark rounded-pill px-4 py-2">Explore More</a>
            <a href="https://instagram.com/innayaara_" target="_blank" class="btn btn-outline-dark rounded-pill px-4 py-2">
              <i class="fab fa-instagram me-2"></i>@innayaara_
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="py-5 about-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card border-0 shadow-sm rounded-4 about-card">
            <div class="card-body p-4 p-md-5">
              <h2 class="fw-bold text-center mb-4 section-title">About Me</h2>

              <p class="text-center text-muted fs-5 mb-5">
                Saya adalah mahasiswa Sistem Informasi yang memiliki minat besar pada UI/UX Design
                dan Web Development. Pernah aktif dalam Department RELACS yang berfokus pada relasi
                eksternal dan komunikasi organisasi. Saya percaya bahwa desain yang baik bukan hanya
                indah, tetapi juga memiliki fungsi dan pengalaman pengguna yang kuat.
              </p>

              <h3 class="fw-semibold text-center mb-4">My Skills</h3>

              <div class="row g-4">
                <div class="col-md-6">
                  <div class="skill-box h-100">
                    <div class="d-flex justify-content-between mb-2">
                      <span class="fw-medium">UI/UX Design</span>
                      <span>90%</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-dark" style="width: 90%"></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="skill-box h-100">
                    <div class="d-flex justify-content-between mb-2">
                      <span class="fw-medium">Wireframing & Prototyping</span>
                      <span>85%</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-dark" style="width: 85%"></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="skill-box h-100">
                    <div class="d-flex justify-content-between mb-2">
                      <span class="fw-medium">Data Visualization (Excel)</span>
                      <span>80%</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-dark" style="width: 80%"></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="skill-box h-100">
                    <div class="d-flex justify-content-between mb-2">
                      <span class="fw-medium">HTML & CSS</span>
                      <span>80%</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-dark" style="width: 80%"></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mx-md-auto">
                  <div class="skill-box h-100">
                    <div class="d-flex justify-content-between mb-2">
                      <span class="fw-medium">Communication & Public Relations</span>
                      <span>85%</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-dark" style="width: 85%"></div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Gallery -->
  <section id="gallery" class="py-5 bg-white">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Gallery</h2>

        <div class="d-flex gap-2">
          <button type="button" class="slider-nav" @click="prevGallery">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button type="button" class="slider-nav" @click="nextGallery">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>

      <div class="gallery-slider">
        <div
          class="gallery-track"
          :style="galleryTrackStyle"
        >
          <div
            class="gallery-slide"
            v-for="g in gallery"
            :key="g.id"
          >
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
              <div class="image-wrap">
                <img :src="g.image" class="card-img-top custom-image" alt="Gallery">
              </div>
              <div class="card-body">
                <h5 class="card-title fw-bold" v-if="g.title">{{ g.title }}</h5>
                <p class="card-text text-muted mb-0" v-if="g.description">{{ g.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Certificates -->
  <section id="certificates" class="py-5">
    <div class="container">
      <h2 class="fw-bold mb-4">Certificates</h2>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3" v-for="cert in certificates" :key="cert.id">
          <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="image-wrap">
              <img :src="cert.image" class="card-img-top custom-image" alt="Certificate">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ cert.title }}</h5>
              <p class="card-text text-muted">{{ cert.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4 mt-4">
    <p class="mb-0">© 2026 Indah Maramin Al Inayah</p>
  </footer>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>

</script>
</body>
</html>