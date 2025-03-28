<?php
include '../includes/config.php';
session_start(); // Add session_start() to access session data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
  
        $training_title = trim($_POST['training_title'] ?? '');
        $duration = trim($_POST['duration'] ?? '');
        $institution = trim($_POST['institution'] ?? '');
        $graduate_id = $_SESSION['graduate_id'] ?? null;

     
 
        if ($pdo->inTransaction() === false) {
            $pdo->beginTransaction();
        }

        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO trainings (graduate_id, training_title, duration, institution) 
                               VALUES (:graduate_id, :training_title, :duration, :institution)");
        $stmt->bindParam(':graduate_id', $graduate_id);
        $stmt->bindParam(':training_title', $training_title);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':institution', $institution);

             $pdo->commit();

        echo json_encode(['success' => true, 'message' => 'Data submitted successfully!']);
        exit();

    } catch (Exception $e) {
        error_log("Database Error: " . $e->getMessage());
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit();
}