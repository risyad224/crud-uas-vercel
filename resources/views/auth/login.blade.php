@extends('layouts.app')
@section('title', 'Login Admin - KulinerKu')
@push('styles')
<style>
    .login-wrapper {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }
    .login-card {
        background: #fff;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        max-width: 420px;
        width: 100%;
        border: 1px solid rgba(0,0,0,0.04);
    }
    .login-header {
        background: var(--gradient-2);
        padding: 2.5rem 2rem;
        text-align: center;
    }
    .login-header h3 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 0.3rem;
    }
    .login-header p {
        color: rgba(255,255,255,0.5);
        font-size: 0.9rem;
        margin: 0;
    }
    .login-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--gradient-1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: #fff;
        box-shadow: 0 8px 20px rgba(99,102,241,0.3);
    }
    .login-body {
        padding: 2rem;
    }
    .login-body .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }
    .login-body .form-group i.field-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        z-index: 2;
        font-size: 0.9rem;
    }
    .login-body .form-control-login {
        padding-left: 2.8rem;
        border: 2px solid #e2e8f0;
        border-radius: var(--radius-md);
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    .login-body .form-control-login:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(99,102,241,0.1);
    }
    .btn-login {
        background: var(--gradient-1);
        border: none;
        color: #fff;
        font-weight: 700;
        padding: 0.85rem;
        border-radius: var(--radius-md);
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(99,102,241,0.3);
    }
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99,102,241,0.4);
        color: #fff;
    }
</style>
@endpush
@section('content')
<div class="login-wrapper">
    <div class="login-card animate-in">
        <div class="login-header">
            <div class="login-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Selamat Datang</h3>
            <p>Silakan login untuk mengakses panel admin</p>
        </div>
        <div class="login-body">
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <i class="fas fa-user field-icon"></i>
                    <input type="text" class="form-control form-control-login @error('username') is-invalid @enderror"
                           id="username" name="username" value="{{ old('username') }}"
                           placeholder="Username" required autofocus>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <i class="fas fa-lock field-icon"></i>
                    <input type="password" class="form-control form-control-login"
                           id="password" name="password"
                           placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i> Login
                </button>
            </form>
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" style="color: var(--text-secondary); font-size: 0.85rem; text-decoration: none;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
