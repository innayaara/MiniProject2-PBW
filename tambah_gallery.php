<?php
session_start();
include 'koneksi.php';

function isAjaxRequest() {
    return (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
    ) || (
        isset($_SERVER['HTTP_ACCEPT']) &&
        strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false
    );
}

function respond($success, $message, $redirect = 'admin.php') {
    if (isAjaxRequest()) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => $success,
            'message' => $message
        ]);
    } else {
        header('Location: ' . $redirect . '?status=' . ($success ? 'success' : 'error') . '&message=' . urlencode($message));
    }
    exit;
}

if (!isset($conn) || !$conn) {
    respond(false, 'Koneksi database gagal.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    respond(false, 'Akses ditolak. Silakan login terlebih dahulu.', 'login.php');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Metode request tidak valid.');
}

$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';

if ($title === '' || $description === '') {
    respond(false, 'Judul dan deskripsi gallery wajib diisi.');
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    respond(false, 'Foto gallery wajib diupload.');
}

$uploadDir = __DIR__ . '/images/gallery/';
$dbImagePath = 'images/gallery/';

if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
        respond(false, 'Folder upload gallery gagal dibuat.');
    }
}

$originalName = $_FILES['image']['name'];
$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
$allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];

if (!in_array($extension, $allowedTypes)) {
    respond(false, 'Format file harus jpg, jpeg, png, atau webp.');
}

$newFileName = time() . '_' . uniqid() . '.' . $extension;
$targetFile = $uploadDir . $newFileName;
$savePath = $dbImagePath . $newFileName;

if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    respond(false, 'Gagal upload foto gallery.');
}

$stmt = mysqli_prepare($conn, "INSERT INTO gallery (title, description, image) VALUES (?, ?, ?)");

if (!$stmt) {
    if (file_exists($targetFile)) {
        @unlink($targetFile);
    }
    mysqli_close($conn);
    respond(false, 'Gagal menyiapkan query database gallery.');
}

mysqli_stmt_bind_param($stmt, "sss", $title, $description, $savePath);
$insertSuccess = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

if (!$insertSuccess) {
    if (file_exists($targetFile)) {
        @unlink($targetFile);
    }
    respond(false, 'Gagal menyimpan data gallery.');
}

respond(true, 'Foto gallery berhasil ditambahkan.');
?>