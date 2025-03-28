<?php
session_start();

// Ensure session data is properly initialized before continuing
if (!isset($_SESSION['student_number']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name']) || !isset($_SESSION['course'])) {
    // Redirect to the appropriate form page if session data is missing
    header("Location: ../validate/graduate.php");
    exit();
}

require '../includes/config.php';

$student_number = $_SESSION['student_number'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$course = $_SESSION['course'];

$showModal = false;  // Flag to control modal display

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data safely
    $email = $_POST['email'] ?? '';
    $permanent_address = $_POST['address'] ?? '';
    $mobile_number = $_POST['mobile'] ?? '';
    $civil_status = $_POST['civilstatus'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $region_id = $_POST['region_id'] ?? '';
    $province_id = $_POST['province_id'] ?? '';
    $municipality_id = $_POST['city_id'] ?? '';
    $barangay_id = $_POST['barangay_id'] ?? '';

    // Function to retrieve name from ID safely
    function getNameFromId($pdo, $table, $column, $id) {
        $stmt = $pdo->prepare("SELECT name FROM $table WHERE $column = ?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn() ?: 'Unknown';
    }

    // Fetch region, province, city, and barangay names
    $region_name = getNameFromId($pdo, 'regions', 'reg_code', $region_id);
    $province_name = getNameFromId($pdo, 'provinces', 'prv_code', $province_id);
    $municipality_name = getNameFromId($pdo, 'municipalities', 'mun_code', $municipality_id);
    $barangay_name = getNameFromId($pdo, 'barangays', 'bgy_code', $barangay_id);

    try {
        // Update graduate information
        $stmt = $pdo->prepare("
            UPDATE graduates 
            SET email = ?, 
                permanent_address = ?, 
                mobile_number = ?, 
                civil_status = ?, 
                gender = ?, 
                regions = ?, 
                provinces = ?, 
                municipalities = ?, 
                barangays = ?, 
                updated_at = NOW()
            WHERE student_number = ?
        ");

        $stmt->execute([
            $email,
            $permanent_address,
            $mobile_number,
            $civil_status,
            $gender,
            $region_name,
            $province_name,
            $municipality_name,
            $barangay_name,
            $student_number
        ]);

        // Clear session data after successful update
        unset($_SESSION['student_number']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['course']);

        // Show success modal
        $showModal = true;

    } catch (PDOException $e) {
        echo "<p style='color: red;'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>