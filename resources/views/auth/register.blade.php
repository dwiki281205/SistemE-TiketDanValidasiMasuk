<x-guest-layout>
    <h5 class="text-center fw-semibold mb-4 text-white-50">Daftar Akun Baru</h5>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Budi Santoso" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Contoh: nama@domain.com" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Ulangi kata sandi" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-auth mb-3">
            Daftar Sekarang
        </button>

        <div class="text-center auth-links mt-2">
            <span class="text-muted small">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="fw-semibold text-white ms-1">Masuk</a>
        </div>
    </form>
</x-guest-layout>
