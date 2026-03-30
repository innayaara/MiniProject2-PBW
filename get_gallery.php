<?php
include 'koneksi.php';

header("Content-Type: application/json");

$data = [];

$query = "SELECT * FROM gallery ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            "id" => $row["id"],
            "title" => $row["title"],
            "description" => $row["description"],
            "image" => $row["image"]
        ];
    }
}

echo json_encode($data);
mysqli_close($conn);
?>