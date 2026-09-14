@extends('layouts.app')
@section('title','Edit • '.$permohonan->pjgt_id)
@section('breadcrumb','Edit Permohonan')
@section('content')
<div class="p-3 rounded-3 mb-3" style="background:linear-gradient(135deg,#0a3d1f 0%, #0f5a2e 100%);color:#fdf6e3;border:2px solid #d4af37">
  <h4 class="fw-bold mb-0" style="color:#fff"><i class="bi bi-pencil-square" style="color:#d4af37"></i> Edit Permohonan {{ $permohonan->pjgt_id }}</h4>
  <div class="small" style="color:#fdf6e3;opacity:0.8">PP KUNUUZUL IMAM KAUMAN • Edit Formulir Pendaftaran</div>
</div>
<div class="card-form">
  <form method="POST" action="{{ route('permohonan.update', $permohonan) }}">
    @csrf @method('PUT')
    <div class="p-4">
      <div class="row g-3">
        <div class="col-md-6"><label class="small fw-bold" style="color:#0a3d1f">Nama Madrasah</label><input type="text" name="nama_madrasah" value="{{ old('nama_madrasah',$permohonan->nama_madrasah) }}" class="form-control" style="border:1px solid #d4af37" required></div>
        <div class="col-md-6"><label class="small fw-bold" style="color:#0a3d1f">Pesantren</label><input type="text" name="nama_pesantren" value="{{ old('nama_pesantren',$permohonan->nama_pesantren) }}" class="form-control" style="border:1px solid #d4af37" required></div>
        <div class="col-md-6"><label class="small fw-bold" style="color:#0a3d1f">PJGT Nama</label><input type="text" name="pjgt_nama" value="{{ old('pjgt_nama',$permohonan->pjgt_nama) }}" class="form-control" style="border:1px solid #d4af37" required></div>
        <div class="col-md-3"><label class="small fw-bold" style="color:#0a3d1f">Telepon</label><input type="text" name="telepon" value="{{ old('telepon',$permohonan->telepon) }}" class="form-control" style="border:1px solid #d4af37" required></div>
        <div class="col-md-3"><label class="small fw-bold" style="color:#0a3d1f">Email</label><input type="email" name="email" value="{{ old('email',$permohonan->email) }}" class="form-control" style="border:1px solid #d4af37" required></div>
        <div class="col-md-3"><label class="small fw-bold" style="color:#0a3d1f">Status</label><select name="status" class="form-select" style="border:1px solid #d4af37"><option value="Proses" {{ $permohonan->status=='Proses'?'selected':'' }}>Proses</option><option value="Diterima" {{ $permohonan->status=='Diterima'?'selected':'' }}>Diterima</option><option value="Ditolak" {{ $permohonan->status=='Ditolak'?'selected':'' }}>Ditolak</option></select></div>
        <div class="col-md-3"><label class="small fw-bold" style="color:#0a3d1f">Rapot</label><select name="rapot" class="form-select" style="border:1px solid #d4af37"><option value="A" {{ $permohonan->rapot=='A'?'selected':'' }}>A</option><option value="B" {{ $permohonan->rapot=='B'?'selected':'' }}>B</option><option value="C" {{ $permohonan->rapot=='C'?'selected':'' }}>C</option></select></div>
        <div class="col-md-3"><label class="small fw-bold" style="color:#0a3d1f">Butuh GT</label><input type="number" name="butuh_gt" value="{{ old('butuh_gt',$permohonan->butuh_gt) }}" class="form-control" style="border:1px solid #d4af37" min="1" max="10" required></div>
        <div class="col-md-9"><label class="small fw-bold" style="color:#0a3d1f">Catatan Admin</label><input type="text" name="catatan_admin" value="{{ old('catatan_admin',$permohonan->catatan_admin) }}" class="form-control" style="border:1px solid #d4af37" placeholder="opsional"></div>
      </div>
    </div>
    <div class="p-3 border-top d-flex justify-content-between" style="background:linear-gradient(135deg,#fdf6e3 0%, #fdf0c7 100%);border-top:2px solid #d4af37">
      <a href="{{ route('permohonan.show',$permohonan) }}" class="btn" style="background:#fff;border:1px solid #d4af37;color:#0a3d1f">Batal</a>
      <button class="btn" style="background:#0a3d1f;color:#d4af37;border:1px solid #d4af37;font-weight:700"><i class="bi bi-check-lg"></i> Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection
