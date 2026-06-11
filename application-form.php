<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'config/database.php';

$error = '';
$success = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $university = trim($_POST['university_name'] ?? '');
    $program = trim($_POST['program_name'] ?? '');

    if (empty($university) || empty($program)) {
        $error = 'University and Program names are required.';
    } else {
        try {
            $userId = $_SESSION['user_id'];
            $stmt = $pdo->prepare("INSERT INTO applications (user_id, university_name, program_name, status) VALUES (?, ?, ?, 'pending')");
            $stmt->execute([$userId, $university, $program]);
            $success = true;
            
            // Redirect to application details page to view the new timeline
            header('Location: application-details.php?status=success');
            exit;
        } catch (PDOException $e) {
            $error = 'An error occurred while submitting your application: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start New Application - Abrovia</title>
    <link rel="stylesheet" href="assets/css/application-form.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
    <?php require_once 'includes/header.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="page-content">
        <div class="content-container">
            
            <a href="application-details.php" class="back-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to Applications
            </a>

            <div class="page-header">
                <h1 class="page-title">Start Your Journey</h1>
                <p class="page-subtitle">Fill out the details below to begin your application process for your dream program.</p>
            </div>

            <?php if ($error): ?>
            <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; font-size: 0.9rem;">
                <?php echo htmlspecialchars($error); ?>
            </div>
            <?php endif; ?>

            <div class="application-form-card">
                <form action="application-form.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label class="form-label" for="university_name">Target University</label>
                        <select class="form-select" id="university_name" name="university_name" required>
                            <option value="">Select a University...</option>
                            <option value="Imperial College London">Imperial College London</option>
                            <option value="University of Melbourne">University of Melbourne</option>
                            <option value="Technical University of Munich">Technical University of Munich</option>
                            <option value="University of Toronto">University of Toronto</option>
                            <option value="Stanford University">Stanford University</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="program_name">Program of Interest</label>
                        <input type="text" class="form-input" id="program_name" name="program_name" placeholder="e.g., MSc Data Science & AI" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="statement">Statement of Purpose (Optional for now)</label>
                        <textarea class="form-textarea" id="statement" name="statement" placeholder="Briefly describe why you want to apply for this program..."></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Supporting Documents (Optional)</label>
                        <div class="file-upload-wrapper">
                            <input type="file" class="file-upload-input" name="documents[]" multiple>
                            <svg class="file-upload-icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                            <p class="file-upload-text">Drag & drop files or <span>Browse</span></p>
                            <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 6px;">Supported formats: PDF, DOCX, JPG (Max 5MB)</p>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="application-details.php" class="btn-cancel" style="display:inline-block; text-align:center;">Cancel</a>
                        <button type="submit" class="btn-submit">Submit Application</button>
                    </div>

                </form>
            </div>

        </div>
    </main>

    <!-- ========== FOOTER ========== -->
    <?php require_once 'includes/footer.php'; ?>

</body>
</html>
