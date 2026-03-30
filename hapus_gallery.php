<?php
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

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'GET') {
    respond(false, 'Metode request tidak valid.');
}

$id = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
}

if ($id <= 0) {
    respond(false, 'ID gallery tidak valid.');
}

$stmt = mysqli_prepare($conn, "SELECT image FROM gallery WHERE id = ?");
if (!$stmt) {
    respond(false, 'Gagal menyiapkan query data gallery.');
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$data) {
    mysqli_close($conn);
    respond(false, 'Data gallery tidak ditemukan.');
}

$imagePath = $data['image'];

$stmt = mysqli_prepare($conn, "DELETE FROM gallery WHERE id = ?");
if (!$stmt) {
    mysqli_close($conn);
    respond(false, 'Gagal menyiapkan query hapus gallery.');
}

mysqli_stmt_bind_param($stmt, "i", $id);
$deleteSuccess = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if (!$deleteSuccess) {
    mysqli_close($conn);
    respond(false, 'Gagal menghapus gallery dari database.');
}

if (!empty($imagePath)) {
    $realPath = $imagePath;

    if (!file_exists($realPath)) {
        $realPath = __DIR__ . '/' . ltrim($imagePath, '/');
    }

    if (file_exists($realPath) && is_file($realPath)) {
        @unlink($realPath);
    }
}

mysqli_close($conn);
respond(true, 'Gallery berhasil dihapus.');
?>