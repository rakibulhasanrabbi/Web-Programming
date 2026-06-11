<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
require_once 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your Abrovia account and start your global education journey today.">
    <title>Sign Up - Abrovia</title>
    <link rel="stylesheet" href="assets/css/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once 'includes/header.php'; ?>
    <style>
        .signup-wrapper {
            padding-top: -10px;
            min-height: calc(100vh - 64px);
            display: flex;
            overflow: hidden;
        }
        .signup-left {
            display: flex !important;
            align-items: center !important;
            justify-content: flex-stat !important;
            padding-left: 5% !important;
            position: relative;
            flex: 1;
        }
        .left-content {
            padding-top: 200px;
            text-align: left !important;
            max-width: 500px !important;
            z-index: 2;
        }
        .left-title {
            font-size: 3.2rem !important;
            font-weight: 800 !important;
            line-height: 1.1 !important;
            margin-bottom: 20px !important;
        }
        .left-description {
            font-size: 1rem !important;
            line-height: 1.5 !important;
            opacity: 0.9 !important;
        }
        .left-badge {
            margin-bottom: 24px !important;
            display: inline-flex !important;
        }
        .signup-right {
            padding: 10px !important;
            padding-top: -20px;
            margin-top: -20px;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: #0a0e1a !important;
            flex: 1;
            overflow: hidden;
        }
        .signup-form-wrapper {
            width: 100%;
            max-width: 650px; /* Adjusted from 650px to better fit */
            padding: 25px 40px !important;
            background: #111832 !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 20px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4) !important;
            transform: scale(0.78); /* Zoom out */
            transform-origin: center center;
            line-height: 1.2 !important;
        }
        .signup-logo {
            margin-bottom: 12px !important;
        }
        .signup-heading {
            margin-bottom: 4px !important;
            font-size: 1.6rem !important;
            line-height: 1.2 !important;
        }
        .signup-subheading {
            margin-bottom: 16px !important;
            font-size: 0.85rem !important;
            line-height: 1.3 !important;
        }
        .signup-form .form-group {
            margin-bottom: 12px !important;
        }
        .form-label {
            margin-bottom: 4px !important;
            font-size: 0.8rem !important;
        }
        .form-input {
            padding: 10px 12px 10px 40px !important;
            font-size: 0.85rem !important;
            background: rgba(255, 255, 255, 0.03) !important;
        }
        .btn-create {
            margin-top: 8px !important;
            padding: 12px !important;
            font-weight: 600 !important;
            font-size: 0.9rem !important;
        }
        .divider {
            margin: 15px 0 !important;
        }
        .social-buttons {
            gap: 10px !important;
        }
        .btn-social {
            padding: 10px !important;
            font-size: 0.85rem !important;
        }
        .login-link {
            margin-top: 15px !important;
            font-size: 0.85rem !important;
            line-height: 1.4 !important;
        }
        @media (max-width: 1024px) {
            .signup-left { display: none !important; }
            .signup-right { width: 100% !important; }
            .signup-form-wrapper { transform: scale(0.9); }
        }
    </style>

    <div class="signup-wrapper">

        <!-- ========== LEFT PANEL ========== -->
        <div class="signup-left" id="signup-left">
            <div class="left-overlay"></div>
            <div class="left-content">
                <div class="left-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    Global Network
                </div>
                <h1 class="left-title">Your journey begins here.</h1>
                <p class="left-description">Connect with universities worldwide, secure scholarships, and embark on an educational adventure that knows no borders.</p>
            </div>
        </div>

        <!-- ========== RIGHT PANEL ========== -->
        <div class="signup-right" id="signup-right">
            <div class="signup-form-wrapper">

                <!-- Logo -->
                <div class="signup-logo" id="signup-logo">
                    <div class="logo-icon" style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; color: #7c3aed;"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" transform="rotate(45 12 12)"/><rect x="4" y="19" width="16" height="2" rx="1"/></svg></div>
                    <span class="logo-text">Abrovia</span>
                </div>

                <!-- Heading -->
                <h2 class="signup-heading">Create Account</h2>
                <p class="signup-subheading">Join thousands of students exploring global education opportunities.</p>

                <!-- Form -->
                <!-- Messages -->
                <?php if (isset($_SESSION['register_error'])): ?>
                    <div style="color: #ef4444; background: #fee2e2; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; border: 1px solid #f87171;">
                        <?php echo htmlspecialchars($_SESSION['register_error']); unset($_SESSION['register_error']); ?>
                    </div>
                <?php endif; ?>
                <form class="signup-form" id="signup-form" action="auth/register_process.php" method="POST">

                    <!-- Full Name -->
                    <div class="form-group">
                        <label class="form-label" for="fullName">Full Name</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </span>
                            <input type="text" id="fullName" name="fullName" class="form-input" placeholder="Jane Doe" autocomplete="name">
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="M22 7l-10 7L2 7"/>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" class="form-input" placeholder="jane@example.com" autocomplete="email">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" class="form-input" placeholder="Password" autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    <circle cx="12" cy="16" r="1"/>
                                </svg>
                            </span>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-input" placeholder="Confirm Password" autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-create" id="btn-create-account">
                        Create Account
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Divider -->
                    <div class="divider">
                        <span class="divider-text">or</span>
                    </div>

                    <!-- Google Sign Up -->
                    <button type="button" class="btn-google" id="btn-google-signup">
                        <svg width="18" height="18" viewBox="0 0 48 48">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                        </svg>
                        Sign up with Google
                    </button>

                </form>

                <!-- Login Link -->
                <p class="login-link" id="login-link">
                    Already have an account? <a href="login.php">Log in Instead</a>
                </p>

            </div>
        </div>

    </div>
    <?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchBtns = document.querySelectorAll('.search-btn, #btn-search');
    searchBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const wrapper = this.closest('.search-bar, .search-container') || this.parentElement;
            if(!wrapper) return;
            const input = wrapper.querySelector('input[type="text"]');
            if(input && input.value) {
                let target = 'programs.php';
                window.location.href = target + '?q=' + encodeURIComponent(input.value);
            }
        });
    });
});
</script>
</body>
</html>


