<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('tema/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="login-container">
        
        <!-- LEFT PANEL -->
        <div class="image-panel">
            <div class="welcome-text">
                <h1>WELCOME<br>BACK</h1>

                {{-- ERROR VALIDATION --}}
                @if ($errors->any())
                    <div class="alert alert-danger" style="margin-top: 20px;">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- SUCCESS MESSAGE --}}
                @if (session('success'))
                    <div class="alert alert-success" style="margin-top: 20px;">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="form-panel">
            
            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <h2>Login</h2>
                <p class="subtitle">Please login to your account.</p>

                <!-- EMAIL -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <!-- PASSWORD -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <!-- BUTTON -->
                <button type="submit">Login</button>

                <!-- REMEMBER -->
                <div class="options">
                    <input type="checkbox" id="remember-me" name="remember">
                    <label for="remember-me">Remember me</label>
                </div>

                <!-- REGISTER LINK -->
                <p class="signup-link">
                    New user? 
                    <a href="{{ route('register') }}">Sign up</a>
                </p>

            </form>

        </div>
    </div>

</body>
</html>
