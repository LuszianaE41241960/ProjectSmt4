@extends('backend.layouts.template')

@section('content')
<style>
    /* Menjamin background abu-abu penuh sampai bawah layar */
    #main {
        background-color: #f4f6f9 !important; 
        min-height: 100vh; 
        padding-bottom: 40px;
    }
    /* Membuat card tetap putih bersih */
    .card {
        background-color: #ffffff !important;
    }
</style>

<main id="main" class="main">

    {{-- 1. TITLE UTAMA --}}
    <div class="pagetitle">
        <h1 class="text-secondary fw-light d-flex align-items-center mb-3" style="font-size: 24px;">
            <i class="bi bi-file-earmark-text me-2"></i> RIWAYAT HIDUP
        </h1>
    </div>

    {{-- 2. BREADCRUMB --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4 border-0 shadow-sm" style="border-radius: 0;">
                    <div class="card-body py-2 px-3">
                        <nav>
                            <ol class="breadcrumb mb-0 p-0" style="background: transparent; font-size: 14px; align-items: center;">
    <li class="breadcrumb-item">
        <a href="{{ url('dashboard') }}" class="text-primary text-decoration-none">
            <i class="fa-solid fa-house me-1"></i> Home
        </a>
    </li>
    
    <li class="breadcrumb-item text-secondary">
        <span style="color: #6c757d;">
            <i class="fa-regular fa-file-lines me-1"></i> Riwayat Hidup
        </span>
    </li>
    
    <li class="breadcrumb-item active" aria-current="page">
    <span class="text-secondary">
        <i class="bi bi-files me-1"></i> Pengalaman Kerja 
    </span>
</li>
</ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. KONTEN UTAMA (TABEL) --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm" style="border-radius: 0px;">
                    <div class="card-body p-0">

                        {{-- HEADER BOX --}}
                        <div style="background: #f8f9fa; padding: 15px 20px; border-bottom: 1px solid #eee;">
                            <h5 class="mb-0 text-secondary" style="font-size: 14px; font-weight: 500; color: #777 !important;">
                                Pengalaman Kerja
                            </h5>
                        </div>

                        <div class="p-4">
                            {{-- ALERT --}}
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            {{-- BUTTON TAMBAH --}}
                            <a href="{{ route('pengalaman_kerja.create') }}" 
                               class="btn btn-primary shadow-sm mb-4" 
                               style="background-color: #4e73df; border: none; padding: 8px 16px; font-size: 14px; border-radius: 5px;">
                                <i class="bi bi-plus-lg me-1"></i> Tambah
                            </a>

                            {{-- TABLE --}}
                            <div class="table-responsive">
                                <table class="table" style="border-top: 1px solid #f2f2f2;">
                                    <thead style="background-color: #fcfcfc;">
                                        <tr style="color: #6c757d; font-size: 14px;">
                                            <th class="fw-600 border-bottom-0 py-3"><i class="bi bi-briefcase-fill me-2"></i> Nama</th>
                                            <th class="fw-600 border-bottom-0 py-3"><i class="bi bi-file-earmark-text-fill me-2"></i> Jabatan</th>
                                            <th class="fw-600 border-bottom-0 py-3"><i class="bi bi-calendar-event-fill me-2"></i> Tahun Masuk</th>
                                            <th class="fw-600 border-bottom-0 py-3"><i class="bi bi-calendar-check-fill me-2"></i> Tahun Selesai</th>
                                            <th class="fw-600 border-bottom-0 py-3 text-center"><i class="bi bi-gear-fill me-2"></i> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 14px; color: #5a5a5a;">
                                        @forelse($data as $item)
                                        <tr style="vertical-align: middle;">
                                            <td class="py-3 text-secondary">{{ $item->nama }}</td>
                                            <td class="py-3 text-secondary">{{ $item->jabatan }}</td>
                                            <td class="py-3 text-secondary">{{ $item->tahun_masuk }}</td>
                                            <td class="py-3 text-secondary">{{ $item->tahun_keluar }}</td>
                                            <td class="py-3 text-center">
                                                <div class="d-flex justify-content-center gap-1">
                                                    <a href="{{ route('pengalaman_kerja.edit', $item->id) }}"
                                                       class="btn btn-warning btn-sm text-white"
                                                       style="background-color: #f6c23e; border: none; padding: 6px 10px;">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="confirmDelete(this)" class="btn btn-danger btn-sm"
                                                                style="background-color: #e74a3b; border: none; padding: 6px 10px;">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-5">
                                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                                Belum ada data pengalaman kerja
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('content-js')
<script>
function confirmDelete(button) {
    let form = button.closest('form'); // ambil form terdekat
Swal.fire({
    title: 'Apakah Anda yakin ingin menghapus data ini?',
    showCancelButton: true,
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel',
    buttonsStyling: false,
    customClass: {
        popup: 'swal-win',
        title: 'swal-win-title',
        actions: 'swal-win-actions',
        confirmButton: 'btn-win',
        cancelButton: 'btn-win'
    }
}).then((result) => {
    if (result.isConfirmed) {
        form.submit();
    }
});
}
</script>
@endpush