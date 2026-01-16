<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - BiblioTech</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #7c3aed;
            --accent: #f59e0b;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --border: #e2e8f0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        
        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            border: 1px solid var(--border);
        }
        
        .register-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
        }
        
        .register-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }
        
        .register-title {
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
        }
        
        .register-subtitle {
            opacity: 0.9;
            font-size: 0.95rem;
        }
        
        .register-body {
            padding: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            z-index: 10;
        }
        
        .form-control {
            padding: 0.875rem 15px 0.875rem 45px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            outline: none;
        }
        
        .form-control.is-invalid {
            border-color: #dc2626;
        }
        
        .invalid-feedback {
            display: block;
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            z-index: 10;
        }
        
        .password-strength {
            height: 4px;
            border-radius: 2px;
            background: var(--border);
            margin-top: 0.5rem;
            overflow: hidden;
        }
        
        .strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        .strength-text {
            font-size: 0.8rem;
            margin-top: 0.25rem;
            text-align: right;
            color: var(--gray);
        }
        
        .requirements {
            margin-top: 0.5rem;
        }
        
        .requirement-item {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 0.25rem;
        }
        
        .requirement-item.valid {
            color: #16a34a;
        }
        
        .requirement-item i {
            margin-right: 0.5rem;
            font-size: 0.75rem;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
            margin-top: 0.5rem;
        }
        
        .btn-register:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }
        
        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .divider {
            text-align: center;
            margin: 2rem 0;
            position: relative;
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: var(--border);
        }
        
        .divider::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: var(--border);
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }
        
        .btn-login {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 0.875rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            width: 100%;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        
        .btn-login:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }
        
        .back-home {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .back-home a {
            color: var(--gray);
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }
        
        .back-home a:hover {
            color: var(--primary);
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #dc2626;
        }
        
        /* Terms */
        .terms-check {
            margin: 1.5rem 0;
        }
        
        .terms-link {
            color: var(--primary);
            text-decoration: none;
        }
        
        .terms-link:hover {
            text-decoration: underline;
        }
        
        /* Footer */
        .register-footer {
            padding: 1.5rem 2rem;
            background: var(--light);
            text-align: center;
            border-top: 1px solid var(--border);
        }
        
        .register-footer p {
            color: var(--gray);
            font-size: 0.85rem;
            margin: 0;
        }
        
        /* Responsive */
        @media (max-width: 480px) {
            .register-container {
                max-width: 100%;
            }
            
            .register-header {
                padding: 2rem 1.5rem;
            }
            
            .register-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <!-- Header -->
        <div class="register-header">
            <div class="register-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1 class="register-title">Créer un compte</h1>
            <p class="register-subtitle">Rejoignez notre communauté de lecteurs</p>
        </div>

        <!-- Body -->
        <div class="register-body">
            <!-- Messages d'erreur -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle me-3"></i>
                        <div>
                            <strong>Veuillez corriger les erreurs :</strong>
                            <ul class="mb-0 mt-2 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li class="small">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Formulaire d'inscription -->
            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <!-- Nom complet -->
                <div class="form-group">
                    <label for="name" class="form-label">
                        Nom complet
                    </label>
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input 
                            id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            autocomplete="name" 
                            autofocus
                            placeholder="Votre nom et prénom"
                        >
                    </div>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        Adresse Email
                    </label>
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email"
                            placeholder="exemple@email.com"
                        >
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        Mot de passe
                    </label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            placeholder="Créez un mot de passe sécurisé"
                            oninput="checkPasswordStrength(this.value)"
                        >
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    
                    <!-- Indicateur de force -->
                    <div class="password-strength">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>
                    <div class="strength-text" id="strengthText">Faible</div>
                    
                    <!-- Exigences -->
                    <div class="requirements">
                        <div class="requirement-item" id="reqLength">
                            <i class="fas fa-circle"></i>
                            <span>Au moins 8 caractères</span>
                        </div>
                        <div class="requirement-item" id="reqUppercase">
                            <i class="fas fa-circle"></i>
                            <span>Au moins une majuscule</span>
                        </div>
                        <div class="requirement-item" id="reqNumber">
                            <i class="fas fa-circle"></i>
                            <span>Au moins un chiffre</span>
                        </div>
                        <div class="requirement-item" id="reqSpecial">
                            <i class="fas fa-circle"></i>
                            <span>Au moins un caractère spécial</span>
                        </div>
                    </div>
                    
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        Confirmer le mot de passe
                    </label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            id="password_confirmation" 
                            type="password" 
                            class="form-control" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Retapez votre mot de passe"
                            oninput="checkPasswordMatch()"
                        >
                        <button type="button" class="password-toggle" id="toggleConfirmPassword">
                            <i class="fas fa-eye" id="toggleConfirmIcon"></i>
                        </button>
                    </div>
                    <div id="passwordMatch" class="small mt-1" style="display: none;"></div>
                </div>

                <!-- Conditions d'utilisation -->
                <div class="terms-check">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                        <label class="form-check-label" for="terms" style="font-size: 0.9rem;">
                            J'accepte les 
                            <a href="#" class="terms-link">conditions d'utilisation</a> 
                            et la 
                            <a href="#" class="terms-link">politique de confidentialité</a>
                        </label>
                    </div>
                </div>

                <!-- Bouton d'inscription -->
                <button type="submit" class="btn-register" id="submitBtn">
                    <i class="fas fa-user-check me-2"></i>Créer mon compte
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">
                Déjà inscrit ?
            </div>

            <!-- Lien de connexion -->
            <div class="login-link">
                <p class="mb-3" style="color: var(--gray); font-size: 0.95rem;">
                    Vous avez déjà un compte ? Connectez-vous
                </p>
                <a href="{{ route('login') }}" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                </a>
            </div>

            <!-- Retour à l'accueil -->
            <div class="back-home">
                <a href="{{ route('vitrine.home') }}">
                    <i class="fas fa-arrow-left"></i>
                    Retour à la page d'accueil
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="register-footer">
            <p>
                <i class="fas fa-shield-alt me-1"></i> 
                Vos données sont sécurisées • 
                <i class="fas fa-code me-1 ms-2"></i> 
                Laravel 10 • Bootstrap 5
            </p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function setupPasswordToggle(inputId, toggleId, iconId) {
            const toggleBtn = document.getElementById(toggleId);
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (toggleBtn && passwordInput && toggleIcon) {
                toggleBtn.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleIcon.classList.remove('fa-eye');
                        toggleIcon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        toggleIcon.classList.remove('fa-eye-slash');
                        toggleIcon.classList.add('fa-eye');
                    }
                });
            }
        }
        
        // Setup both password toggles
        setupPasswordToggle('password', 'togglePassword', 'toggleIcon');
        setupPasswordToggle('password_confirmation', 'toggleConfirmPassword', 'toggleConfirmIcon');
        
        // Password strength checker
        function checkPasswordStrength(password) {
            const bar = document.getElementById('strengthBar');
            const text = document.getElementById('strengthText');
            const submitBtn = document.getElementById('submitBtn');
            
            let strength = 0;
            let requirements = {
                length: false,
                uppercase: false,
                number: false,
                special: false
            };
            
            // Check length
            if (password.length >= 8) {
                strength += 25;
                requirements.length = true;
                document.getElementById('reqLength').classList.add('valid');
                document.getElementById('reqLength').innerHTML = '<i class="fas fa-check-circle"></i><span>Au moins 8 caractères</span>';
            } else {
                document.getElementById('reqLength').classList.remove('valid');
                document.getElementById('reqLength').innerHTML = '<i class="fas fa-circle"></i><span>Au moins 8 caractères</span>';
            }
            
            // Check uppercase
            if (/[A-Z]/.test(password)) {
                strength += 25;
                requirements.uppercase = true;
                document.getElementById('reqUppercase').classList.add('valid');
                document.getElementById('reqUppercase').innerHTML = '<i class="fas fa-check-circle"></i><span>Au moins une majuscule</span>';
            } else {
                document.getElementById('reqUppercase').classList.remove('valid');
                document.getElementById('reqUppercase').innerHTML = '<i class="fas fa-circle"></i><span>Au moins une majuscule</span>';
            }
            
            // Check number
            if (/[0-9]/.test(password)) {
                strength += 25;
                requirements.number = true;
                document.getElementById('reqNumber').classList.add('valid');
                document.getElementById('reqNumber').innerHTML = '<i class="fas fa-check-circle"></i><span>Au moins un chiffre</span>';
            } else {
                document.getElementById('reqNumber').classList.remove('valid');
                document.getElementById('reqNumber').innerHTML = '<i class="fas fa-circle"></i><span>Au moins un chiffre</span>';
            }
            
            // Check special character
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 25;
                requirements.special = true;
                document.getElementById('reqSpecial').classList.add('valid');
                document.getElementById('reqSpecial').innerHTML = '<i class="fas fa-check-circle"></i><span>Au moins un caractère spécial</span>';
            } else {
                document.getElementById('reqSpecial').classList.remove('valid');
                document.getElementById('reqSpecial').innerHTML = '<i class="fas fa-circle"></i><span>Au moins un caractère spécial</span>';
            }
            
            // Update strength bar
            bar.style.width = strength + '%';
            
            // Update color and text
            if (strength < 25) {
                bar.style.backgroundColor = '#dc2626';
                text.textContent = 'Très faible';
                text.style.color = '#dc2626';
                submitBtn.disabled = true;
            } else if (strength < 50) {
                bar.style.backgroundColor = '#f59e0b';
                text.textContent = 'Faible';
                text.style.color = '#f59e0b';
                submitBtn.disabled = true;
            } else if (strength < 75) {
                bar.style.backgroundColor = '#f59e0b';
                text.textContent = 'Moyen';
                text.style.color = '#f59e0b';
                submitBtn.disabled = false;
            } else {
                bar.style.backgroundColor = '#16a34a';
                text.textContent = 'Fort';
                text.style.color = '#16a34a';
                submitBtn.disabled = false;
            }
        }
        
        // Check password match
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchDiv = document.getElementById('passwordMatch');
            
            if (confirmPassword === '') {
                matchDiv.style.display = 'none';
                return;
            }
            
            matchDiv.style.display = 'block';
            
            if (password === confirmPassword) {
                matchDiv.textContent = '✓ Les mots de passe correspondent';
                matchDiv.style.color = '#16a34a';
            } else {
                matchDiv.textContent = '✗ Les mots de passe ne correspondent pas';
                matchDiv.style.color = '#dc2626';
            }
        }
        
        // Auto-focus on name field
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('name').focus();
            
            // Check initial password strength
            const password = document.getElementById('password').value;
            if (password) {
                checkPasswordStrength(password);
            }
        });
        
        // Add loading state on form submit
        document.getElementById('registerForm').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Création du compte...';
                submitBtn.disabled = true;
            }
        });
    </script>
</body>
</html>