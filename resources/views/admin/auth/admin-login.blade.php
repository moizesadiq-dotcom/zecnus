<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | Zacnus</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(
                    circle at top left,
                    rgba(220, 38, 38, 0.20),
                    transparent 35%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(239, 68, 68, 0.15),
                    transparent 35%
                ),
                #090909;
            color: #fff;
            min-height: 100vh;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background: rgba(20, 20, 20, 0.90);
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 24px;
            padding: 40px;
            box-shadow:
                0 25px 80px rgba(0, 0, 0, 0.60),
                0 0 50px rgba(220, 38, 38, 0.10);
            backdrop-filter: blur(18px);
        }

        .logo-box {
            width: 70px;
            height: 70px;
            margin: 0 auto 22px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(
                135deg,
                #dc2626,
                #991b1b
            );
            box-shadow:
                0 10px 35px rgba(220, 38, 38, 0.35);
        }

        .logo-box span {
            font-size: 28px;
            font-weight: 800;
            color: white;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #e5e5e5;
        }

        .input-field {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #333;
            background: #111;
            color: white;
            outline: none;
            transition: 0.25s ease;
        }

        .input-field::placeholder {
            color: #777;
        }

        .input-field:focus {
            border-color: #ef4444;
            box-shadow:
                0 0 0 3px rgba(239, 68, 68, 0.12);
        }

        .login-button {
            width: 100%;
            border: none;
            border-radius: 12px;
            padding: 15px;
            margin-top: 8px;
            background: linear-gradient(
                135deg,
                #ef4444,
                #b91c1c
            );
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.25s ease;
            box-shadow:
                0 10px 25px rgba(220, 38, 38, 0.25);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 15px 35px rgba(220, 38, 38, 0.35);
        }

        .error-box {
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 10px;
            background: rgba(220, 38, 38, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.30);
            color: #fca5a5;
            font-size: 13px;
        }

        .back-home {
            display: block;
            margin-top: 22px;
            text-align: center;
            color: #999;
            text-decoration: none;
            font-size: 13px;
            transition: 0.2s;
        }

        .back-home:hover {
            color: #ef4444;
        }

        .heading {
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .sub-heading {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .admin-badge {
            text-align: center;
            color: #ef4444;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        @media (max-width: 500px) {
            .login-card {
                padding: 28px 22px;
            }

            .heading {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="logo-box">
            <span>Z</span>
        </div>

        <div class="admin-badge">
            Zacnus
        </div>

        <h1 class="heading">
            Admin Login
        </h1>

        <p class="sub-heading">
            Sign in to access your admin dashboard
        </p>


        {{-- ERROR MESSAGES --}}
        @if ($errors->any())

            <div class="error-box">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif


        {{-- LOGIN FORM --}}
        <form
            method="POST"
            action="{{ route('admin.login.post') }}"
        >

            @csrf


            <div class="input-group">

                <label
                    for="email"
                    class="input-label"
                >
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@example.com"
                    class="input-field"
                    required
                    autofocus
                >

            </div>


            <div class="input-group">

                <label
                    for="password"
                    class="input-label"
                >
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    class="input-field"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Login to Admin Panel
            </button>

        </form>


        <a
            href="{{ route('home') }}"
            class="back-home"
        >
            ← Back to Website
        </a>

    </div>

</div>

</body>
</html>