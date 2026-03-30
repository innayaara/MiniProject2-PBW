<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

$galleryQuery = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
$certificateQuery = mysqli_query($conn, "SELECT * FROM certificates ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <style>
    .portfolio-image {
      height: 220px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold mb-1">Dashboard Admin</h2>
      <p class="text-muted mb-0">Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    </div>
    <a href="#"
      class="btn btn-danger rounded-pill"
      onclick="if (confirm('Apakah kamu yakin ingin logout?')) { window.location.href='logout.php'; } return false;">
      Logout
    </a>
  </div>

  <?php if (isset($_GET['status']) && $_GET['status'] == 'gallery_sukses'): ?>
    <div class="alert alert-success">Gallery berhasil ditambahkan.</div>
  <?php endif; ?>

  <?php if (isset($_GET['status']) && $_GET['status'] == 'sertifikat_sukses'): ?>
    <div class="alert alert-success">Sertifikat berhasil ditambahkan.</div>
  <?php endif; ?>

  <!-- Gallery -->
  <section id="gallery" class="py-4 bg-white">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <h2 class="fw-bold mb-0">Gallery</h2>
        <button class="btn btn-dark rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#galleryModal">
          <i class="fas fa-plus me-2"></i>Tambah Gallery
        </button>
      </div>

      <div class="row g-4">
        <?php if (mysqli_num_rows($galleryQuery) > 0): ?>
          <?php while ($g = mysqli_fetch_assoc($galleryQuery)): ?>
            <div class="col-md-6 col-lg-4">
              <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="<?php echo htmlspecialchars($g['image']); ?>" class="card-img-top portfolio-image" alt="Gallery">
                <div class="card-body p-4 d-flex flex-column">
                  <?php if (!empty($g['title'])): ?>
                    <h5 class="card-title fw-bold"><?php echo htmlspecialchars($g['title']); ?></h5>
                  <?php endif; ?>

                  <?php if (!empty($g['description'])): ?>
                    <p class="card-text text-muted mb-3"><?php echo htmlspecialchars($g['description']); ?></p>
                  <?php endif; ?>

                  <div class="mt-auto">
                    <a href="hapus_gallery.php?id=<?php echo $g['id']; ?>" 
                       class="btn btn-outline-danger rounded-pill px-3"
                       onclick="return confirm('Yakin ingin hapus gallery ini?')">
                      <i class="fas fa-trash me-2"></i>Hapus
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-secondary text-center rounded-4">
              Belum ada data gallery.
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Certificates -->
  <section id="certificates" class="py-5">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <h2 class="fw-bold mb-0">Certificates</h2>
        <button class="btn btn-outline-dark rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#certificateModal">
          <i class="fas fa-plus me-2"></i>Tambah Sertifikat
        </button>
      </div>

      <div class="row g-4">
        <?php if (mysqli_num_rows($certificateQuery) > 0): ?>
          <?php while ($cert = mysqli_fetch_assoc($certificateQuery)): ?>
            <div class="col-md-6 col-lg-3">
              <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="<?php echo htmlspecialchars($cert['image']); ?>" class="card-img-top portfolio-image" alt="Certificate">
                <div class="card-body p-4 d-flex flex-column">
                  <h5 class="card-title fw-bold"><?php echo htmlspecialchars($cert['title']); ?></h5>
                  <p class="card-text text-muted mb-3"><?php echo htmlspecialchars($cert['description']); ?></p>

                  <div class="mt-auto">
                    <a href="hapus_sertifikat.php?id=<?php echo $cert['id']; ?>" 
                       class="btn btn-outline-danger rounded-pill px-3"
                       onclick="return confirm('Yakin ingin hapus sertifikat ini?')">
                      <i class="fas fa-trash me-2"></i>Hapus
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-secondary text-center rounded-4">
              Belum ada data sertifikat.
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<!-- Modal Sertifikat -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 border-0 shadow">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold">Tambah Sertifikat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="tambah_sertifikat.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Judul Sertifikat</label>
            <input type="text" class="form-control form-control-lg rounded-3" name="title" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control rounded-3" name="description" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Upload Gambar</label>
            <input type="file" class="form-control rounded-3" name="image" accept=".jpg,.jpeg,.png,.webp" required>
          </div>

          <button type="submit" class="btn btn-dark w-100 rounded-pill">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Gallery -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 border-0 shadow">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold">Tambah Gallery</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="tambah_gallery.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Judul Foto</label>
            <input type="text" class="form-control form-control-lg rounded-3" name="title">
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control rounded-3" name="description" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Upload Foto</label>
            <input type="file" class="form-control rounded-3" name="image" accept=".jpg,.jpeg,.png,.webp" required>
          </div>

          <button type="submit" class="btn btn-dark w-100 rounded-pill">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>