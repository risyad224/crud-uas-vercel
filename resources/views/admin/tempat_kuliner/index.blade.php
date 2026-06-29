@extends('layouts.app')
@section('title', 'Admin - Kelola Tempat Kuliner')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 animate-in">
    <div>
        <h2 style="font-weight: 800; margin-bottom: 0.2rem;">
            <i class="fas fa-utensils me-2" style="color: var(--primary);"></i>Kelola Data
        </h2>
        <p style="color: var(--text-secondary); margin: 0; font-size: 0.9rem;">Manajemen data tempat kuliner Anda</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.tempat-kuliner.pdf') }}" class="btn btn-outline-premium" target="_blank">
            <i class="fas fa-file-pdf me-1"></i> Export PDF
        </a>
        <a href="{{ route('admin.tempat-kuliner.create') }}" class="btn btn-primary-gradient">
            <i class="fas fa-plus me-1"></i> Tambah Data
        </a>
    </div>
</div>
<div style="background: #fff; border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid rgba(0,0,0,0.04); overflow: hidden;" class="animate-in animate-delay-1">
    <div style="padding: 1.5rem;">
        <div class="table-responsive">
            <table id="dataTable" class="table table-premium w-100 mb-0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="12%">Gambar</th>
                        <th>Nama Tempat</th>
                        <th>Jenis Makanan</th>
                        <th>Jam Operasional</th>
                        <th width="14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tempatKuliners as $index => $item)
                        <tr>
                            <td>
                                <span style="background: var(--surface); padding: 0.3rem 0.7rem; border-radius: 50px; font-weight: 600; font-size: 0.8rem; color: var(--text-secondary);">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($item->gambar) }}" alt="Gambar"
                                         style="width: 70px; height: 50px; object-fit: cover; border-radius: var(--radius-sm); box-shadow: var(--shadow-sm);">
                                @else
                                    <div style="width: 70px; height: 50px; background: var(--surface); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span style="font-weight: 600;">{{ $item->nama_tempat }}</span>
                            </td>
                            <td>
                                @foreach(explode(', ', $item->jenis_makanan) as $jenis)
                                    <span class="badge-food" style="font-size: 0.68rem; padding: 0.25rem 0.55rem;">{{ trim($jenis) }}</span>
                                @endforeach
                            </td>
                            <td>
                                <span style="color: var(--text-secondary); font-size: 0.9rem;">
                                    <i class="far fa-clock me-1" style="color: var(--primary);"></i>{{ $item->jam_operasional }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.tempat-kuliner.edit', $item->id) }}"
                                       style="background: linear-gradient(135deg, #f59e0b, #fbbf24); color: #fff; border: none; padding: 0.4rem 0.8rem; border-radius: var(--radius-sm); font-size: 0.78rem; font-weight: 600; text-decoration: none; transition: all 0.3s; display: inline-flex; align-items: center; gap: 4px;"
                                       onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(245,158,11,0.3)'"
                                       onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.tempat-kuliner.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="background: linear-gradient(135deg, #ef4444, #f87171); color: #fff; border: none; padding: 0.4rem 0.8rem; border-radius: var(--radius-sm); font-size: 0.78rem; font-weight: 600; cursor: pointer; transition: all 0.3s; display: inline-flex; align-items: center; gap: 4px;"
                                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239,68,68,0.3)'"
                                                onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                search: "",
                searchPlaceholder: "Cari data...",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: {
                    previous: '<i class="fas fa-chevron-left"></i>',
                    next: '<i class="fas fa-chevron-right"></i>'
                }
            }
        });
    });
</script>
@endpush
