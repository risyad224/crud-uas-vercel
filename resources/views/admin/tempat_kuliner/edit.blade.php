@extends('layouts.app')
@section('title', 'Edit Tempat Kuliner')
@section('content')
<div class="mb-4 animate-in">
    <a href="{{ route('admin.tempat-kuliner.index') }}" style="color: var(--primary); font-weight: 500; text-decoration: none; font-size: 0.9rem;">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke daftar
    </a>
</div>
<div style="max-width: 700px; margin: 0 auto;">
    <div style="background: #fff; border-radius: var(--radius-xl); box-shadow: var(--shadow-lg); border: 1px solid rgba(0,0,0,0.04); overflow: hidden;" class="animate-in animate-delay-1">
        <div style="background: var(--gradient-2); padding: 2rem; text-align: center;">
            <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, #f59e0b, #fbbf24); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.8rem; font-size: 1.2rem; color: #fff; box-shadow: 0 8px 20px rgba(245,158,11,0.3);">
                <i class="fas fa-pen"></i>
            </div>
            <h4 style="color: #fff; font-weight: 700; margin-bottom: 0.2rem;">Edit Tempat Kuliner</h4>
            <p style="color: rgba(255,255,255,0.5); font-size: 0.85rem; margin: 0;">Perbarui informasi tempat kuliner</p>
        </div>
        <div style="padding: 2rem;">
            <form action="{{ route('admin.tempat-kuliner.update', $tempatKuliner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_tempat" class="form-label-premium"><i class="fas fa-store me-1" style="color: var(--primary);"></i> Nama Tempat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-premium @error('nama_tempat') is-invalid @enderror" id="nama_tempat" name="nama_tempat" value="{{ old('nama_tempat', $tempatKuliner->nama_tempat) }}" required>
                    @error('nama_tempat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="jenis_makanan" class="form-label-premium"><i class="fas fa-hamburger me-1" style="color: var(--secondary);"></i> Jenis Makanan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-premium @error('jenis_makanan') is-invalid @enderror" id="jenis_makanan" name="jenis_makanan" value="{{ old('jenis_makanan', $tempatKuliner->jenis_makanan) }}" required>
                    @error('jenis_makanan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="jam_operasional" class="form-label-premium"><i class="far fa-clock me-1" style="color: var(--accent);"></i> Jam Operasional <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-premium @error('jam_operasional') is-invalid @enderror" id="jam_operasional" name="jam_operasional" value="{{ old('jam_operasional', $tempatKuliner->jam_operasional) }}" required>
                    @error('jam_operasional') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label-premium"><i class="fas fa-map-marker-alt me-1" style="color: #ef4444;"></i> Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control form-control-premium @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $tempatKuliner->alamat) }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="gambar" class="form-label-premium"><i class="fas fa-camera me-1" style="color: var(--primary);"></i> Gambar <small style="color: var(--text-secondary); font-weight: 400;">(Kosongkan jika tidak ingin mengubah)</small></label>
                    <input type="file" class="form-control form-control-premium @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                    @if($tempatKuliner->gambar)
                        <div class="mt-3 d-flex align-items-center gap-3" style="background: var(--surface); padding: 0.8rem 1rem; border-radius: var(--radius-md);">
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($tempatKuliner->gambar) }}" alt="Gambar Saat Ini" style="height: 60px; width: 90px; object-fit: cover; border-radius: var(--radius-sm); box-shadow: var(--shadow-sm);">
                            <div>
                                <p style="margin: 0; font-weight: 600; font-size: 0.85rem; color: var(--text-primary);">Gambar saat ini</p>
                                <p style="margin: 0; font-size: 0.78rem; color: var(--text-secondary);">Upload gambar baru untuk mengganti</p>
                            </div>
                        </div>
                    @endif
                    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex justify-content-end gap-2 pt-2">
                    <a href="{{ route('admin.tempat-kuliner.index') }}" style="background: var(--surface); color: var(--text-secondary); border: none; padding: 0.65rem 1.5rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem; text-decoration: none; transition: all 0.3s;">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary-gradient">
                        <i class="fas fa-save me-1"></i> Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
