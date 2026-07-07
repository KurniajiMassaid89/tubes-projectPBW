<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Raynor System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            font-family: 'Inter', system-ui, sans-serif;
            color: #0f172a;
            background: #eaf2ff;
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, #d9e8ff 0%, #e7f1ff 40%, #f7fbff 100%);
            overflow: hidden;
        }

        body::before,
        body::after,
        .shape-1,
        .shape-2,
        .shape-3 {
            content: '';
            position: absolute;
            border-radius: 999px;
            filter: blur(40px);
            opacity: 0.5;
            pointer-events: none;
        }

        body::before {
            inset: -120px auto auto -120px;
            width: 260px;
            height: 260px;
            background: rgba(96, 165, 250, 0.24);
        }

        body::after {
            inset: auto -80px -120px auto;
            width: 200px;
            height: 200px;
            background: rgba(59, 130, 246, 0.18);
        }

        .shape-1 {
            top: 20%;
            right: 4%;
            width: 160px;
            height: 160px;
            background: rgba(167, 139, 250, 0.18);
        }

        .shape-2 {
            bottom: 18%;
            left: 6%;
            width: 140px;
            height: 140px;
            background: rgba(59, 130, 246, 0.12);
        }

        .shape-3 {
            bottom: 10%;
            right: 24%;
            width: 100px;
            height: 100px;
            background: rgba(96, 165, 250, 0.16);
        }

        .login-shell {
            position: relative;
            width: min(420px, 100%);
            max-height: 560px;
            padding: 22px 20px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(96, 165, 250, 0.24);
            border-radius: 24px;
            box-shadow: 0 22px 60px rgba(15, 23, 42, 0.12);
            backdrop-filter: blur(14px);
            display: flex;
            flex-direction: column;
            gap: 8px;
            justify-content: flex-start;
            opacity: 0;
            transform: translateY(18px);
            animation: fadeInUp 0.7s ease forwards;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-shell:hover {
            transform: translateY(-3px);
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.16);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-title {
            text-align: center;
            margin: 0 0 12px;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.04em;
        }

        .title-accent {
            width: 50px;
            height: 4px;
            margin: 0 auto 24px;
            border-radius: 999px;
            background: linear-gradient(90deg, #60a5fa 0%, #2563eb 100%);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 16px;
        }

        .form-group label {
            color: #475569;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 22px;
            height: 22px;
            display: grid;
            place-items: center;
            color: #2563eb;
        }

        .input-field {
            width: 100%;
            min-height: 46px;
            padding: 0 18px 0 48px;
            border-radius: 18px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            font-size: 1rem;
            color: #0f172a;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        }

        .input-field::placeholder {
            color: #94a3b8;
        }

        .input-field:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
            background: #f8fbff;
        }

        .submit-button {
            width: 100%;
            min-height: 48px;
            border-radius: 999px;
            border: none;
            background: linear-gradient(135deg, #60a5fa 0%, #2563eb 100%);
            color: #ffffff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.3s ease, filter 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 16px 32px rgba(37, 99, 235, 0.18);
        }

        .submit-button:hover {
            transform: translateY(-2px);
            filter: brightness(1.05);
            background: linear-gradient(135deg, #4f8cf6 0%, #1e3aa8 100%);
            box-shadow: 0 20px 36px rgba(37, 99, 235, 0.22);
        }

        .demo-card {
            border-radius: 16px;
            padding: 12px;
            background: rgba(235, 245, 255, 0.95);
            border: 1px solid rgba(96, 165, 250, 0.22);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.5);
        }

        .demo-card-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 8px;
        }

        .demo-card-header svg {
            width: 16px;
            height: 16px;
            color: #2563eb;
        }

        .demo-card-header h3 {
            margin: 0;
            font-size: 0.96rem;
            font-weight: 700;
            color: #0f172a;
        }

        .credentials-grid {
            display: grid;
            gap: 6px;
        }

        .credential-item {
            padding: 8px 10px;
            border-radius: 12px;
            background: #ffffff;
            border: 1px solid rgba(37, 99, 235, 0.12);
        }

        .credential-item strong {
            display: block;
            font-size: 0.9rem;
            color: #2563eb;
            margin-bottom: 2px;
        }

        .credential-item span {
            display: block;
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.4;
        }

        .error-message {
            margin-top: 6px;
            color: #dc2626;
            font-size: 0.95rem;
        }

        @media (max-width: 420px) {
            body {
                padding: 12px;
            }

            .login-shell {
                width: 100%;
                max-height: none;
                padding: 26px 20px;
                border-radius: 20px;
            }

            .page-title {
                font-size: 1.75rem;
            }

            .input-field {
                min-height: 44px;
            }

            .submit-button {
                min-height: 46px;
            }
        }
    </style>
</head>
<body>
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="shape-3"></div>

    <div class="login-shell">
        <div>
            <h1 class="page-title">Raynor System</h1>
            <div class="title-accent"></div>

            <form method="POST" action="{{ route('auth.login') }}">
                @csrf

                <div class="form-group">
                    <label for="nama_pegawai">Nama</label>
                    <div class="input-wrapper">
                        <span class="input-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5Z"/></svg>
                        </span>
                        <input
                            type="text"
                            id="nama_pegawai"
                            name="nama_pegawai"
                            value="{{ old('nama_pegawai') }}"
                            class="input-field"
                            required
                            placeholder="Masukkan nama"
                        >
                    </div>
                    @error('nama_pegawai')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hp_pegawai">Nomor HP</label>
                    <div class="input-wrapper">
                        <span class="input-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M17 2H7a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3Zm-5 18.5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5Zm5-4.5H7V6h10Z"/></svg>
                        </span>
                        <input
                            type="text"
                            id="hp_pegawai"
                            name="hp_pegawai"
                            value="{{ old('hp_pegawai') }}"
                            class="input-field"
                            required
                            placeholder="Masukkan nomor HP"
                        >
                    </div>
                    @error('hp_pegawai')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('login')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="submit-button">Login</button>
            </form>
        </div>

        <div class="demo-card">
            <div class="demo-card-header">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm1 14.93V19h-2v-2.07A7.001 7.001 0 0 1 5 12c0-3.86 3.14-7 7-7s7 3.14 7 7a7.001 7.001 0 0 1-6 6.93Z"/></svg>
                <h3>Demo Credentials:</h3>
            </div>

            <div class="credentials-grid">
                <div class="credential-item">
                    <strong>Owner</strong>
                    <span>Nama: Hanif Fathi</span>
                    <span>HP: 081211223344</span>
                </div>

                <div class="credential-item">
                    <strong>Admin</strong>
                    <span>Nama: Kevin Chandra</span>
                    <span>HP: 082673629765</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
