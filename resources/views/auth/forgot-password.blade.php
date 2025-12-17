<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password - {{ config('app.name', 'Job Portal') }}</title>
    
    <style>
        :root {
            --primary-color: #4dabf7;
            --secondary-color: #15aabf;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
            --gray-color: #6c757d;
            --border-radius: 10px;
            --box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--dark-color);
        }

        .password-reset-container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        .password-reset-wrapper {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            padding: 40px;
            position: relative;
        }

        /* Header */
        .password-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 20px;
        }

        .password-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .password-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .password-header p {
            color: var(--gray-color);
            font-size: 0.95rem;
            line-height: 1.5;
        }

        /* Session Status */
        .session-status {
            padding: 15px;
            background: #d1e7dd;
            color: #0f5132;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            border-left: 4px solid #0f5132;
            font-size: 0.9rem;
            animation: slideIn 0.3s ease;
        }

        .session-status.error {
            background: #f8d7da;
            color: #842029;
            border-left-color: #842029;
        }

        /* Form */
        .password-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e9ecef;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-family: inherit;
            transition: var(--transition);
            background-color: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(77, 171, 247, 0.2);
        }

        .form-input.error {
            border-color: #dc3545;
        }

        .error-message {
            display: block;
            margin-top: 6px;
            color: #dc3545;
            font-size: 0.85rem;
        }

        /* Button */
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: inherit;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-submit:hover:not(.loading) {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(77, 171, 247, 0.3);
        }

        .btn-submit:active:not(.loading) {
            transform: translateY(0);
        }

        /* FIXED: Loading animation - keep same padding */
        .btn-submit.loading {
            color: transparent;
        }

        .btn-submit.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        /* Back Link */
        .back-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e9ecef;
        }

        .back-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .back-link a:hover {
            color: var(--secondary-color);
        }

        /* Animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .password-reset-wrapper {
            animation: fadeIn 0.5s ease;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .password-reset-wrapper {
                padding: 30px 25px;
            }
            
            .password-header h1 {
                font-size: 1.5rem;
            }
        }

        /* Additional Styles */
        .form-input-group {
            position: relative;
        }

        .form-input-group .icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-color);
        }

        .form-input-group input {
            padding-left: 45px;
        }
    </style>
</head>
<body>
    <div class="password-reset-container">
        <div class="password-reset-wrapper">
            <!-- Header -->
            <div class="password-header">
                <h1>Forgot Password</h1>
                <!-- <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p> -->
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="session-status error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}" class="password-form" id="passwordForm">
                @csrf

                <!-- Email Input -->
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <div class="form-input-group">
                        <svg class="icon" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            class="form-input @error('email') error @enderror" 
                            placeholder="you@example.com" 
                            required 
                            autofocus
                        >
                    </div>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit" id="submitBtn">
                    Email Password Reset Link
                </button>
            </form>

            <!-- Back to Login -->
            <div class="back-link">
                <a href="{{ route('login') }}">
                    Back to Login
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('passwordForm');
            const emailInput = document.getElementById('email');
            const submitBtn = document.getElementById('submitBtn');
            
            // Email validation
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
            
            // Real-time email validation
            emailInput.addEventListener('blur', function() {
                const email = this.value.trim();
                if (email && !validateEmail(email)) {
                    this.classList.add('error');
                } else {
                    this.classList.remove('error');
                }
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                const email = emailInput.value.trim();
                
                // Validate email
                if (!validateEmail(email)) {
                    e.preventDefault();
                    emailInput.classList.add('error');
                    emailInput.focus();
                    
                    // Show error message
                    if (!document.querySelector('.session-status.error')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'session-status error';
                        errorDiv.innerHTML = '<div>Please enter a valid email address.</div>';
                        form.parentNode.insertBefore(errorDiv, form);
                    }
                } else {
                    // Show loading state
                    submitBtn.classList.add('loading');
                    submitBtn.disabled = true;
                    
                    // Reset after 5 seconds if something goes wrong
                    setTimeout(() => {
                        submitBtn.classList.remove('loading');
                        submitBtn.disabled = false;
                    }, 5000);
                }
            });
            
            // Auto focus on email if empty
            if (!emailInput.value.trim()) {
                setTimeout(() => {
                    emailInput.focus();
                }, 100);
            }
        });
    </script>
</body>
</html>