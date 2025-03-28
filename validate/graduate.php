<?php
session_start();
require_once '../includes/config.php';

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Input sanitization
$first_name = htmlspecialchars(trim($_POST['first_name'] ?? ''));
$middle_name = htmlspecialchars(trim($_POST['middle_name'] ?? ''));
$last_name = htmlspecialchars(trim($_POST['last_name'] ?? ''));
$course = htmlspecialchars(trim($_POST['course'] ?? ''));
$student_number = htmlspecialchars(trim($_POST['student_number'] ?? ''));
$graduation_year = htmlspecialchars(trim($_POST['graduation_year'] ?? ''));
$request_date = date("Y-m-d H:i:s");

// Check required fields
if (empty($first_name) || empty($last_name) || empty($student_number) || empty($graduation_year)) {
    echo json_encode(['status' => 'invalid', 'message' => 'All fields are required.']);
    exit;
}

try {
    $pdo->beginTransaction();

    // Check graduate details with graduation year and course
    $check_sql = "SELECT id, status, course, graduation_year FROM graduates WHERE student_number = :student_number LIMIT 1";
    $check_stmt = $pdo->prepare($check_sql);
    $check_stmt->execute([':student_number' => $student_number]);
    $graduate = $check_stmt->fetch(PDO::FETCH_ASSOC);

    if ($graduate) {
        switch ($graduate['status']) {
            case 'approved':
                if ($graduate['graduation_year'] !== $graduation_year) {
                    echo json_encode(['status' => 'invalid', 'message' => 'Graduation year does not match our records.']);
                    exit;
                }
                if ($graduate['course'] !== $course) {
                    echo json_encode(['status' => 'invalid', 'message' => 'Course does not match our records.']);
                    exit;
                }

                // Assign graduate details to session
                $_SESSION['graduate_id'] = $graduate['id'];
                $_SESSION['student_number'] = $student_number;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['course'] = $course;
                $_SESSION['graduation_year'] = $graduate['graduation_year'];

                echo json_encode(['status' => 'verified', 'redirect' => 'http://localhost/alumni/form.php']);
                exit;

            case 'pending':
                echo json_encode(['status' => 'not_verified', 'message' => 'Your request is still pending approval.']);
                exit;

            case 'rejected':
                echo json_encode(['status' => 'invalid', 'message' => 'Your request was rejected. Please contact support.']);
                exit;
        }
    }

    // Check if a verification request already exists
    $check_verification_sql = "SELECT COUNT(*) FROM verification_requests WHERE student_number = :student_number";
    $check_verification_stmt = $pdo->prepare($check_verification_sql);
    $check_verification_stmt->execute([':student_number' => $student_number]);
    if ($check_verification_stmt->fetchColumn() > 0) {
        echo json_encode(['status' => 'new_student', 'message' => 'Your request is already under verification.']);
        exit;
    }

    // Insert new graduate record
    $insert_data = [
        ':first_name' => $first_name,
        ':middle_name' => $middle_name,
        ':last_name' => $last_name,
        ':student_number' => $student_number,
        ':course' => $course,
        ':graduation_year' => $graduation_year
    ];

    $sql1 = "INSERT INTO graduates (first_name, middle_name, last_name, student_number, course, graduation_year, status) 
             VALUES (:first_name, :middle_name, :last_name, :student_number, :course, :graduation_year, 'pending')";
    $pdo->prepare($sql1)->execute($insert_data);

    // Insert verification request
    $insert_data[':request_date'] = $request_date;
    $sql2 = "INSERT INTO verification_requests (first_name, middle_name, last_name, student_number, course, graduation_year, request_date, status) 
             VALUES (:first_name, :middle_name, :last_name, :student_number, :course, :graduation_year, :request_date, 'pending')";
    $pdo->prepare($sql2)->execute($insert_data);

    $pdo->commit();

    echo json_encode(['status' => 'new_student', 'message' => 'Your request has been submitted for verification.']);
} catch (PDOException $e) {
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
}