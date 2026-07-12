<x-guest-layout>
    <h5 class="text-center fw-semibold mb-4 text-white-50">Silakan masuk ke akun Anda</h5>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success border-0 mb-4 bg-success bg-opacity-20 text-success small" style="border-radius: 12px;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Contoh: admin@example.com" required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="form-label">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a class="text-muted small text-decoration-none" style="font-size: 12px;" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-4 form-check text-start">
            <input id="remember_me" type="checkbox" name="remember" class="form-check-input bg-dark border-secondary">
            <label for="remember_me" class="form-check-label text-muted small" style="user-select: none;">
                Ingat saya di perangkat ini
            </label>
        </div>

        <button type="submit" class="btn btn-auth mb-3">
            Masuk Sekarang
        </button>

        <div class="text-center auth-links mt-2">
            <span class="text-muted small">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="fw-semibold text-white ms-1">Daftar</a>
        </div>
    </form>
</x-guest-layout>
