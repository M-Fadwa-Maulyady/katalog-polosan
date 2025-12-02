<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('tema/register.css') }}">
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

            </div>
        </div>

        <!-- RIGHT PANEL (FORM) -->
        <div class="form-panel">

            <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2>Register</h2>
                <p class="subtitle">Please register to login.</p>

                <!-- NAMA -->
                <div class="input-group">
                    <label for="name">User Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <!-- NO TELP -->
                <div class="input-group">
                    <label for="no_telp">Mobile Number</label>
                    <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
                </div>

                <!-- EMAIL (WAJIB) -->
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <!-- PASSWORD -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div class="input-group">
                    <label for="password_confirmation">Retype Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <!-- BUTTON -->
                <button type="submit">Register</button>

                <!-- OPTIONS -->
                <div class="options" style="margin-top: 15px;">
                    <a href="{{ route('login') }}">I already have a membership</a>
                </div>

            </form>

        </div>
    </div>

</body>
</html>
