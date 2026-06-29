@extends('layouts.app')
@section('title', 'KulinerKu - Temukan Tempat Makan Terbaik')
@section('content')
<div class="text-center mb-5 animate-in" style="padding: 2rem 0;">
    <div class="d-inline-block mb-3" style="background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); border: 1px solid rgba(99,102,241,0.15); border-radius: 50px; padding: 0.4rem 1.2rem;">
        <small style="color: var(--primary); font-weight: 600; letter-spacing: 0.05em;"><i class="fas fa-fire me-1"></i> REKOMENDASI PILIHAN</small>
    </div>
    <h1 style="font-size: 2.8rem; font-weight: 800; line-height: 1.2; letter-spacing: -1px;">
        Temukan <span style="background: var(--gradient-1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Tempat Kuliner</span><br>Favorit Anda
    </h1>
    <p style="color: var(--text-secondary); font-size: 1.1rem; max-width: 500px; margin: 1rem auto 0;">
        Jelajahi berbagai pilihan restoran, kafe, dan warung makan terbaik di sekitar Anda
    </p>
</div>
<div class="row g-3 mb-4 animate-in animate-delay-1">
    <div class="col-4">
        <div style="background: #fff; border-radius: var(--radius-md); padding: 1.2rem; text-align: center; border: 1px solid rgba(0,0,0,0.04); box-shadow: var(--shadow-sm);">
            <div style="font-size: 1.8rem; font-weight: 800; color: var(--primary);">{{ $tempatKuliners->count() }}</div>
            <div style="font-size: 0.8rem; color: var(--text-secondary); font-weight: 500;">Tempat Kuliner</div>
        </div>
    </div>
    <div class="col-4">
        <div style="background: #fff; border-radius: var(--radius-md); padding: 1.2rem; text-align: center; border: 1px solid rgba(0,0,0,0.04); box-shadow: var(--shadow-sm);">
            <div style="font-size: 1.8rem; font-weight: 800; color: var(--accent);">{{ $tempatKuliners->pluck('jenis_makanan')->flatMap(fn($j) => explode(', ', $j))->unique()->count() }}</div>
            <div style="font-size: 0.8rem; color: var(--text-secondary); font-weight: 500;">Jenis Makanan</div>
        </div>
    </div>
    <div class="col-4">
        <div style="background: #fff; border-radius: var(--radius-md); padding: 1.2rem; text-align: center; border: 1px solid rgba(0,0,0,0.04); box-shadow: var(--shadow-sm);">
            <div style="font-size: 1.8rem; font-weight: 800; color: var(--secondary);">{{ $tempatKuliners->pluck('alamat')->map(fn($a) => last(explode(', ', $a)))->unique()->count() }}</div>
            <div style="font-size: 0.8rem; color: var(--text-secondary); font-weight: 500;">Kota</div>
        </div>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse($tempatKuliners as $index => $item)
        <div class="col animate-in" style="animation-delay: {{ ($index % 6) * 0.1 }}s;">
            <div class="card-premium h-100">
                <div class="card-img-wrapper">
                    @if($item->gambar)
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($item->gambar) }}" alt="{{ $item->nama_tempat }}">
                    @else
                        <div class="no-image-placeholder">
                            <i class="fas fa-utensils"></i>
                        </div>
                    @endif
                    <div class="card-img-overlay-gradient"></div>
                </div>
                <div class="card-body">
                    <h5 style="font-weight: 700; font-size: 1.1rem; margin-bottom: 0.7rem; color: var(--text-primary);">
                        {{ $item->nama_tempat }}
                    </h5>
                    <div class="mb-3">
                        @foreach(explode(', ', $item->jenis_makanan) as $jenis)
                            <span class="badge-food">{{ trim($jenis) }}</span>
                        @endforeach
                    </div>
                    <div class="d-flex align-items-start mb-2" style="gap: 8px;">
                        <i class="fas fa-map-marker-alt mt-1" style="color: #ef4444; font-size: 0.8rem; flex-shrink: 0;"></i>
                        <span style="color: var(--text-secondary); font-size: 0.85rem; line-height: 1.4;">{{ $item->alamat }}</span>
                    </div>
                    <div class="d-flex align-items-center" style="gap: 8px;">
                        <i class="far fa-clock" style="color: var(--primary); font-size: 0.8rem; flex-shrink: 0;"></i>
                        <span style="color: var(--text-secondary); font-size: 0.85rem; font-weight: 500;">{{ $item->jam_operasional }}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div style="background: #fff; border-radius: var(--radius-xl); padding: 3rem; box-shadow: var(--shadow-sm);">
                <i class="fas fa-utensils" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 1rem;"></i>
                <h4 style="color: var(--text-secondary);">Belum ada data tempat kuliner</h4>
                <p style="color: #94a3b8;">Silakan tambahkan data melalui panel admin.</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
