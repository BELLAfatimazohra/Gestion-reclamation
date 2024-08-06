<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #8a9edb, #387b3c, #9fe4a3);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 100px;
            margin-left: 80px;
        }

        .container:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        h2 {
            margin-bottom: 1.5rem;
            color: #4a4a4a;
            text-align: center;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.75rem;
            color: #555;
            font-size: 0.875rem;
        }

        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #ffffff;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(90deg, #0056b3, #004080);
        }

        a {
            color: #007bff;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        h3 {
            margin-bottom: 1.5rem;
            color: #4a4a4a;
            text-align: center;
            font-size: 1.25rem;
        }

        .logo {
            margin-right: -100px;
            margin-bottom: 2rem;
            margin-top: 100px;
        }

        .logo img {
            max-width: 600px;
            height: 130px;
        }

        .error-message {
            color: red;
            margin-bottom: 1rem;
            text-align: center;
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .password-container input[type="password"] {
            width: 100%;
            padding-right: 40px; 
            box-sizing: border-box;
        }

        .password-container .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px; 
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.25rem; 
            color: #333; 
            z-index: 1; 
        }
        .pwdv,
.pwd,
.email {
  height: 25px;
  opacity: 0.3;
  left: 92%;
}
.pwdv,
.pwd {
  cursor: pointer;
}
.pwdv {
  display: none;
  opacity: 0.7;
}
.pwdv:hover,
.pwd:hover {
  opacity: 0.7;
}
    </style>
    <script>
       document.getElementById('showPwd').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            const pwdIcon = document.querySelector('.pwd');
            const pwdvIcon = document.querySelector('.pwdv');
            if (this.checked) {
                passwordField.type = 'text';
                pwdIcon.style.display = 'none';
                pwdvIcon.style.display = 'inline';
            } else {
                passwordField.type = 'password';
                pwdIcon.style.display = 'inline';
                pwdvIcon.style.display = 'none';
            }
        });

        function toggleLoginForm() {
            var userType = document.getElementById('user_type').value;
            var clientForm = document.getElementById('client_login_form');
            var personnelForm = document.getElementById('personnel_login_form');
            
            if (userType === 'client') {
                clientForm.style.display = 'block';
                personnelForm.style.display = 'none';
            } else if (userType === 'personnel') {
                clientForm.style.display = 'none';
                personnelForm.style.display = 'block';
            } else {
                clientForm.style.display = 'none';
                personnelForm.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo">
    </div>
    <div class="container">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error-message">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif

        <div class="form-group">
            <label for="user_type">I am a:</label>
            <select id="user_type" name="user_type" onchange="toggleLoginForm()" required>
                <option value="">Select User Type</option>
                <option value="client">Client</option>
                <option value="personnel">Personnel</option>
            </select>
        </div>

        <div id="client_login_form" style="display: none;">
            <form method="POST" action="{{ route('client.login') }}">
                @csrf
                <div class="form-group">
                    <label for="client_email">Email:</label>
                    <input type="email" id="client_email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="client_password">Password:</label>
                    <div class="password-container">
                        <input type="password" id="client_password" name="password" required>
                        
                    </div>
                    <label for="showPwd" class="checkbox-label">
                        <input type="checkbox" id="showPwd" />
                        <img src="{{ asset('images/visibility.svg') }}" alt="" class="pwd" />
                        <img src="{{ asset('images/visibilityOff.svg') }}" alt="" class="pwdv" />
                    </label>
                </div>
                <button type="submit">Login as Client</button>
            </form>
        </div>

        <div id="personnel_login_form" style="display: none;">
            <form method="POST" action="{{ route('personnel.login') }}">
                @csrf
                <div class="form-group">
                    <label for="personnel_email">Email:</label>
                    <input type="email" id="personnel_email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="personnel_password">Password:</label>
                    <div class="password-container">
                        <input type="password" id="personnel_password" name="password" required>
                    </div>
                    <label for="showPwd" class="checkbox-label">
                        <input type="checkbox" id="showPwd" />
                        <img src="public/images/visibility.svg" alt="" class="pwd" />
                        <img src="public/images/visibilityOff.svg" alt="" class="pwdv" />
                    </label>
                </div>
                <button type="submit">Login as Personnel</button>
            </form>
        </div>
    </div>
</body>
</html>
