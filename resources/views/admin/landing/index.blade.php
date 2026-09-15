@extends('layouts.app')
@section('title','Kelola Landing Page')
@section('breadcrumb','Landing Page')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h4 class="fw-bold mb-1" style="color:var(--green)">Kelola Landing Page <span class="arab" style="color:var(--gold)">— إدارة الصفحة</span></h4>
    <p class="small mb-0" style="color:#5d4037">Atur Informasi, Pengumuman, Panduan yang tampil di halaman depan. <a href="{{ route('landing') }}" target="_blank" style="color:var(--gold);font-weight:700">Lihat Landing <i class="bi bi-box-arrow-up-right"></i></a></p>
  </div>
  <a href="{{ route('landing-contents.create') }}" class="btn-green"><i class="bi bi-plus-circle"></i> Tambah Konten</a>
</div>

<div class="card-form">
  <div class="table-responsive">
    <table class="table table-hover mb-0 small">
      <thead style="background:var(--cream2);color:var(--green)"><tr><th>#</th><th>Section</th><th>Judul</th><th>Kategori</th><th>Tanggal</th><th>Aktif</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($contents as $c)
        <tr>
          <td>{{ $c->sort_order }}</td>
          <td><span class="badge" style="background:var(--green);color:var(--gold)">{{ $c->section }}</span></td>
          <td><strong style="color:var(--green)">{{ $c->title }}</strong><div style="color:#5d4037;font-size:11px">{{ \Illuminate\Support\Str::limit($c->content,60) }}</div></td>
          <td>{{ $c->category }}</td>
          <td>{{ $c->date_label }}</td>
          <td>@if($c->is_active)<span class="badge" style="background:#198754;color:#fff">Aktif</span>@else<span class="badge" style="background:#6c757d;color:#fff">Nonaktif</span>@endif</td>
          <td class="d-flex gap-1">
            <a href="{{ route('landing-contents.edit',$c) }}" class="btn btn-sm" style="background:var(--cream);border:1px solid var(--gold);color:var(--green);border-radius:20px">Edit</a>
            <form method="POST" action="{{ route('landing-contents.destroy',$c) }}" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="btn btn-sm" style="background:#ffe9e9;border:1px solid #ffb3b3;color:#7a0a0a;border-radius:20px">Hapus</button></form>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center py-4" style="color:var(--brown)">Belum ada konten. <a href="{{ route('landing-contents.create') }}" style="color:var(--green);font-weight:700">Tambah pertama</a> - contoh: Informasi 10 Sep 2026</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3 p-3 rounded-3" style="background:var(--cream);border:1.5px dashed var(--gold);">
  <h6 class="fw-bold" style="color:var(--green)"><i class="bi bi-lightbulb" style="color:var(--gold)"></i> Cara pakai</h6>
  <ul class="small mb-0" style="color:#5d4037;line-height:1.8">
    <li><strong>Section:</strong> `informasi` / `pengumuman` / `panduan` / `hero` / `alur` - menentukan di bagian mana tampil di landing</li>
    <li><strong>Sort Order:</strong> angka kecil tampil di atas (0 = paling atas)</li>
    <li>Setelah tambah/edit, buka landing `/` untuk lihat hasil. Konten `is_active=false` tidak tampil.</li>
  </ul>
</div>
@endsection
