<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Koneksi ke database
$conn = new mysqli('teknologi22.xyz', 'teky6584_api_nadhif', 'RbU^?w*}JH&C', 'teky6584_api_nadhif');

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Query untuk mendapatkan semua mainan
$query = "SELECT * FROM available_toys";
$result = $conn->query($query);

// Cek hasil query
if ($result->num_rows > 0) {
    $toys = [];
    while ($row = $result->fetch_assoc()) {
        $toys[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $toys]);
} else {
    echo json_encode(["status" => "error", "message" => "No toys found"]);
}

$conn->close();
?>
