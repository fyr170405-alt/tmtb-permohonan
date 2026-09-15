@extends('layouts.app')
@section('title','Form Ijin GT • TMTB & DAI KIK')
@section('breadcrumb','Form Ijin GT')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 p-3 rounded-3" style="background:linear-gradient(135deg,#0a3d1f 0%, #0f5a2e 100%);color:#fdf6e3;border:2px solid #d4af37">
  <div>
    <div class="arab small" style="color:#d4af37">بِسْمِ اللهِ — إذن المعلم</div>
    <h4 class="fw-bold mb-0" style="color:#fff"><i class="bi bi-file-earmark-check-fill" style="color:#d4af37"></i> Form Ijin GT</h4>
    <div class="small" style="color:#fdf6e3;opacity:.8">Pengajuan ringkas Guru Tugas • 1448/1449 H</div>
  </div>
  <span class="username-badge" style="background:#fdf6e3;color:#0a3d1f;border-color:#d4af37">{{ auth()->user()->username ?? '' }}</span>
</div>

<div class="card-form" style="max-width:640px;margin:0 auto">
  <div class="card-form-header"><i class="bi bi-pencil-square" style="color:var(--gold)"></i> Formulir Ringkas <span class="small fw-normal" style="color:#8a7a3a">— untuk pengajuan cepat, lengkapnya via Form Permohonan 4 tahap</span></div>
  <form method="POST" action="{{ route('form.ijin.store') }}" class="p-4">
    @csrf
    <div class="row g-3">
      <div class="col-12">
        <label class="form-label">Nama PJGT <span class="text-danger">*</span></label>
        <input type="text" name="pjgt_nama" value="{{ old('pjgt_nama') }}" class="form-control @error('pjgt_nama') is-invalid @enderror" placeholder="Nama lengkap sesuai KTP" required>
        @error('pjgt_nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-12">
        <label class="form-label">Nama Madrasah <span class="text-danger">*</span></label>
        <input type="text" name="nama_madrasah" value="{{ old('nama_madrasah') }}" class="form-control @error('nama_madrasah') is-invalid @enderror" placeholder="Nama madrasah / lembaga" required>
        @error('nama_madrasah')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
        <label class="form-label">No HP / WA <span class="text-danger">*</span></label>
        <input type="text" name="telepon" value="{{ old('telepon') }}" class="form-control @error('telepon') is-invalid @enderror" placeholder="08xxxxxxxxxx" required>
        @error('telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
        <label class="form-label">Butuh GT (orang) <span class="text-danger">*</span></label>
        <input type="number" name="butuh_gt" value="{{ old('butuh_gt', 1) }}" min="1" max="10" class="form-control @error('butuh_gt') is-invalid @enderror" required>
        @error('butuh_gt')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
        <label class="form-label">Tanggal Ijin <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_ijin" value="{{ old('tanggal_ijin') }}" class="form-control @error('tanggal_ijin') is-invalid @enderror" required>
        @error('tanggal_ijin')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-md-6">
        <label class="form-label">Keterangan</label>
        <input type="text" name="keterangan" value="{{ old('keterangan') }}" class="form-control" placeholder="Opsional">
      </div>
    </div>
    @include('permohonan._custom_fields')
    <div class="alert small mt-3 mb-0" style="background:#fdf6e3;border:1px solid var(--gold);color:var(--green)"><i class="bi bi-info-circle-fill" style="color:var(--gold)"></i> Tersimpan sebagai permohonan status <strong>Proses</strong> — admin verifikasi di Permohonan Baru.</div>
    <div class="d-flex gap-2 mt-3">
      <button class="btn-green flex-fill" style="justify-content:center"><i class="bi bi-send-check"></i> Kirim Ijin</button>
      <a href="{{ route('permohonan.lama') }}" class="btn-yellow flex-fill" style="justify-content:center">Batal</a>
    </div>
  </form>
</div>
@endsection
