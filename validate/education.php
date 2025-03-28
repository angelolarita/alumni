<?php
session_start();
include '../includes/config.php';

// Enable error reporting for PDO
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Ensure session graduate_id is set
if (!isset($_SESSION['graduate_id'])) {
    echo json_encode(['success' => false, 'message' => 'Error: Graduate ID is missing. Please log in again.']);
    exit();
}
$graduate_id = $_SESSION['graduate_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo->beginTransaction();

        // Sanitize and validate input for educational_background
        $degree = trim(htmlspecialchars($_POST['degree'] ?? ''));
        $college = trim(htmlspecialchars($_POST['college'] ?? ''));
        $year = trim(htmlspecialchars($_POST['year'] ?? ''));
        $honors = trim(htmlspecialchars($_POST['honors'] ?? ''));

        if ($degree && $college && $year) {
            $stmt = $pdo->prepare("INSERT INTO educational_background (graduate_id, degree, college, year_graduated, honors) 
                                    VALUES (:graduate_id, :degree, :college, :year_graduated, :honors)");
            $stmt->execute([
                ':graduate_id' => $graduate_id,
                ':degree' => $degree,
                ':college' => $college,
                ':year_graduated' => $year,
                ':honors' => $honors,
            ]);
        }

        // Sanitize and validate input for professional_exams
        $exam_name = trim(htmlspecialchars($_POST['exam_name'] ?? ''));
        $exam_rating = trim(htmlspecialchars($_POST['exam_rating'] ?? ''));
        $exam_date = !empty($_POST['exam_date']) ? date("Y-m-d", strtotime($_POST['exam_date'])) : null;

        if ($exam_name) {
            if ($exam_date === false) {
                throw new Exception("Invalid date format, please use YYYY-MM-DD");
            }

            $stmtExam = $pdo->prepare("INSERT INTO professional_exams (graduate_id, name_of_exam, date_taken, rating) 
                                        VALUES (:graduate_id, :name_of_exam, :date_taken, :rating)");
            $stmtExam->execute([
                ':graduate_id' => $graduate_id,
                ':name_of_exam' => $exam_name,
                ':date_taken' => $exam_date,
                ':rating' => $exam_rating,
            ]);
        }

        // Sanitize and validate input for course_reasons
        if (!empty($_POST['reason']) && is_array($_POST['reason'])) {
            $stmtReason = $pdo->prepare("INSERT INTO course_reasons (graduate_id, reason, category) VALUES (:graduate_id, :reason, :category)");
            foreach ($_POST['reason'] as $key => $values) {
                $reason = trim(htmlspecialchars($key));

                if (is_array($values)) {
                    foreach ($values as $category) {
                        $cat = trim(htmlspecialchars($category));
                        $stmtReason->execute([
                            ':graduate_id' => $graduate_id,
                            ':reason' => $reason,
                            ':category' => $cat,
                        ]);
                    }
                } else {
                    $cat = trim(htmlspecialchars($values));
                    $stmtReason->execute([
                        ':graduate_id' => $graduate_id,
                        ':reason' => $reason,
                        ':category' => $cat,
                    ]);
                }
            }
        }

        $pdo->commit();

        echo json_encode(['success' => true, 'message' => 'Data submitted successfully!']);
        exit();

    } catch (PDOException $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        exit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit();
}