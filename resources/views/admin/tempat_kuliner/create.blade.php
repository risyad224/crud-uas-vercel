@extends('layouts.app')
@section('title', 'Tambah Tempat Kuliner')
@section('content')
<div class="mb-4 animate-in">
    <a href="{{ route('admin.tempat-kuliner.index') }}" style="color: var(--primary); font-weight: 500; text-decoration: none; font-size: 0.9rem;">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke daftar
    </a>
</div>
<div style="max-width: 700px; margin: 0 auto;">
    <div style="background: #fff; border-radius: var(--radius-xl); box-shadow: var(--shadow-lg); border: 1px solid rgba(0,0,0,0.04); overflow: hidden;" class="animate-in animate-delay-1">
        <div style="background: var(--gradient-2); padding: 2rem; text-align: center;">
            <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--gradient-1); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.8rem; font-size: 1.2rem; color: #fff; box-shadow: 0 8px 20px rgba(99,102,241,0.3);">
                <i class="fas fa-plus"></i>
            </div>
            <h4 style="color: #fff; font-weight: 700; margin-bottom: 0.2rem;">Tambah Tempat Kuliner</h4>
            <p style="color: rgba(255,255,255,0.5); font-size: 0.85rem; margin: 0;">Lengkapi informasi tempat kuliner baru</p>
        </div>
        <div style="padding: 2rem;">
            <form action="{{ route('admin.tempat-kuliner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nama_tempat" class="form-label-premium"><i class="fas fa-store me-1" style="color: var(--primary);"></i> Nama Tempat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-premium @error('nama_tempat') is-invalid @enderror" id="nama_tempat" name="nama_tempat" value="{{ old('nama_tempat') }}" placeholder="Contoh: Warung Nasi Padang..." required>
                    @error('nama_tempat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="jenis_makanan" class="form-label-premium"><i class="fas fa-hamburger me-1" style="color: var(--secondary);"></i> Jenis Makanan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-premium @error('jenis_makanan') is-invalid @enderror" id="jenis_makanan" name="jenis_makanan" value="{{ old('jenis_makanan') }}" placeholder="Contoh: Nasi Padang, Rendang, Ayam..." required>
                    @error('jenis_makanan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="jam_operasional" class="form-label-premium"><i class="far fa-clock me-1" style="color: var(--accent);"></i> Jam Operasional <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-premium @error('jam_operasional') is-invalid @enderror" id="jam_operasional" name="jam_operasional" value="{{ old('jam_operasional') }}" placeholder="Contoh: 10:00 - 22:00" required>
                    @error('jam_operasional') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label-premium"><i class="fas fa-map-marker-alt me-1" style="color: #ef4444;"></i> Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control form-control-premium @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap..." required>{{ old('alamat') }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="gambar" class="form-label-premium"><i class="fas fa-camera me-1" style="color: var(--primary);"></i> Gambar <span class="text-danger">*</span></label>
                    <input type="file" class="form-control form-control-premium @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" required>
                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex justify-content-end gap-2 pt-2">
                    <a href="{{ route('admin.tempat-kuliner.index') }}" style="background: var(--surface); color: var(--text-secondary); border: none; padding: 0.65rem 1.5rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem; text-decoration: none; transition: all 0.3s;">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary-gradient">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
