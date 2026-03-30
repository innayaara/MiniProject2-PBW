const app = Vue.createApp({
  data() {
    return {
      nama: "Indah Maramin Al Inayah",
      tagline: "UI/UX Enthusiast | Information Systems Student",
      certificates: [],
      gallery: [],
      currentGalleryIndex: 0,
      galleryInterval: null,
      windowWidth: window.innerWidth
    };
  },

  computed: {
    visibleGalleryItems() {
      if (this.windowWidth < 576) return 1;
      if (this.windowWidth < 768) return 2;
      if (this.windowWidth < 992) return 3;
      return 4;
    },

    maxGalleryIndex() {
      return Math.max(this.gallery.length - this.visibleGalleryItems, 0);
    },

    galleryTrackStyle() {
      return {
        transform: `translateX(-${this.currentGalleryIndex * (100 / this.visibleGalleryItems)}%)`
      };
    }
  },

  methods: {
    confirmLogout(e) {
      const yakin = confirm("Apakah kamu yakin ingin logout?");
      if (!yakin) {
        e.preventDefault();
      }
    },

    loadCertificates() {
      fetch("get_certificates.php")
        .then(response => response.json())
        .then(data => {
          this.certificates = Array.isArray(data) ? data : [];
        })
        .catch(error => {
          console.error("Gagal mengambil data sertifikat:", error);
          this.certificates = [];
        });
    },

    loadGallery() {
      fetch("get_gallery.php")
        .then(response => response.json())
        .then(data => {
          this.gallery = Array.isArray(data) ? data : [];
          this.currentGalleryIndex = 0;
          this.startGalleryAutoSlide();
        })
        .catch(error => {
          console.error("Gagal mengambil data gallery:", error);
          this.gallery = [];
        });
    },

    hapusGallery(id) {
      if (!confirm("Yakin ingin menghapus gallery ini?")) return;

      fetch("hapus_gallery.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + encodeURIComponent(id)
      })
        .then(response => response.json())
        .then(data => {
          alert(data.message);
          if (data.success) {
            this.loadGallery();
          }
        })
        .catch(error => {
          console.error("Error:", error);
          alert("Terjadi kesalahan saat menghapus gallery.");
        });
    },

    hapusSertifikat(id) {
      if (!confirm("Yakin ingin menghapus sertifikat ini?")) return;

      fetch("hapus_sertifikat.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + encodeURIComponent(id)
      })
        .then(response => response.json())
        .then(data => {
          alert(data.message);
          if (data.success) {
            this.loadCertificates();
          }
        })
        .catch(error => {
          console.error("Error:", error);
          alert("Terjadi kesalahan saat menghapus sertifikat.");
        });
    },

    nextGallery() {
      if (this.gallery.length <= this.visibleGalleryItems) return;

      if (this.currentGalleryIndex >= this.maxGalleryIndex) {
        this.currentGalleryIndex = 0;
      } else {
        this.currentGalleryIndex++;
      }
    },

    prevGallery() {
      if (this.gallery.length <= this.visibleGalleryItems) return;

      if (this.currentGalleryIndex <= 0) {
        this.currentGalleryIndex = this.maxGalleryIndex;
      } else {
        this.currentGalleryIndex--;
      }
    },

    startGalleryAutoSlide() {
      this.stopGalleryAutoSlide();

      if (this.gallery.length > this.visibleGalleryItems) {
        this.galleryInterval = setInterval(() => {
          this.nextGallery();
        }, 5000);
      }
    },

    stopGalleryAutoSlide() {
      if (this.galleryInterval) {
        clearInterval(this.galleryInterval);
        this.galleryInterval = null;
      }
    },

    handleResize() {
      this.windowWidth = window.innerWidth;

      if (this.currentGalleryIndex > this.maxGalleryIndex) {
        this.currentGalleryIndex = 0;
      }

      this.startGalleryAutoSlide();
    },

    initForms() {
      const certificateForm = document.getElementById("certificateForm");
      const galleryForm = document.getElementById("galleryForm");

      if (certificateForm) {
        certificateForm.addEventListener("submit", (e) => {
          e.preventDefault();

          const formData = new FormData(certificateForm);

          fetch("tambah_sertifikat.php", {
            method: "POST",
            body: formData
          })
            .then(response => response.json())
            .then(data => {
              alert(data.message);

              if (data.success) {
                certificateForm.reset();
                const modalEl = document.getElementById("certificateModal");
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                if (modalInstance) modalInstance.hide();
                this.loadCertificates();
              }
            })
            .catch(error => {
              console.error("Error:", error);
              alert("Terjadi kesalahan saat menyimpan sertifikat.");
            });
        });
      }

      if (galleryForm) {
        galleryForm.addEventListener("submit", (e) => {
          e.preventDefault();

          const formData = new FormData(galleryForm);

          fetch("tambah_gallery.php", {
            method: "POST",
            body: formData
          })
            .then(response => response.json())
            .then(data => {
              alert(data.message);

              if (data.success) {
                galleryForm.reset();
                const modalEl = document.getElementById("galleryModal");
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                if (modalInstance) modalInstance.hide();
                this.loadGallery();
              }
            })
            .catch(error => {
              console.error("Error:", error);
              alert("Terjadi kesalahan saat menyimpan gallery.");
            });
        });
      }
    }
  },

  mounted() {
    this.loadCertificates();
    this.loadGallery();
    this.initForms();
    window.addEventListener("resize", this.handleResize);

    const btnLogout = document.getElementById("btnLogout");
    if (btnLogout) {
      btnLogout.addEventListener("click", this.confirmLogout);
    }
  },

    beforeUnmount() {
    this.stopGalleryAutoSlide();
    window.removeEventListener("resize", this.handleResize);

    const btnLogout = document.getElementById("btnLogout");
    if (btnLogout) {
      btnLogout.removeEventListener("click", this.confirmLogout);
    }
  }
});

window.app = app.mount("#app");