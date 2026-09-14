@extends('layouts.app')
@section('title','Tahap 2 - Pengelola | TMTB & DAI KIK')
@section('breadcrumb','Tahap 2 • Pengelola')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 p-3 rounded-3" style="background:linear-gradient(135deg,#0a3d1f 0%, #0f5a2e 100%);color:#fdf6e3;border:2px solid #d4af37">
    <div>
        <div class="arab small" style="color:#d4af37">بِسْمِ اللهِ — Tahap ٢</div>
        <h5 class="mb-0 fw-bold" style="color:#d4af37"><i class="bi bi-people-fill"></i> Data Pengelola Lembaga</h5>
        <h4 class="fw-bold mb-0" style="color:#fff">Amanah Pengasuh & Pengurus</h4>
    </div>
    <div class="text-end"><span class="username-badge" style="background:#fdf6e3;color:#0a3d1f;border-color:#d4af37">{{ auth()->user()->username ?? '00007' }}</span><div class="arab small mt-1" style="color:#d4af37">حفظه الله</div></div>
</div>
@include('components.stepper', ['current'=>2])
<div class="card-form mt-0">
    <form method="POST" action="{{ route('permohonan.store2') }}">
        @csrf
        <div class="p-4">
            <h6 class="fw-bold mb-3">Data Pengelola Lembaga</h6>
            <div class="alert small py-2" style="background:#fdf6e3;border:1px solid #d4af37;color:#0a3d1f"><i class="bi bi-info-circle-fill" style="color:#d4af37"></i> <strong>Adab:</strong> Wajib diisi nama lengkap KTP + WA aktif. Jika tidak ada isi <code>0</code>. Contoh: KH Zaid, Lora Amr, Fulan.</div>
            @php $fields = [
                ['label'=>'Pengasuh','field'=>'pengasuh','hp'=>'pengasuh_hp'],
                ['label'=>'Ketua Yayasan','field'=>'ketua_yayasan','hp'=>'ketua_yayasan_hp'],
                ['label'=>'Sekretaris Yayasan','field'=>'sekretaris_yayasan','hp'=>'sekretaris_yayasan_hp'],
                ['label'=>'Kepala Madrasah','field'=>'kepala_madrasah','hp'=>'kepala_madrasah_hp'],
                ['label'=>'Tata Usaha','field'=>'tata_usaha','hp'=>'tata_usaha_hp'],
                ['label'=>'PJGT','field'=>'pjgt','hp'=>'pjgt_hp'],
            ]; @endphp
            @foreach($fields as $f)
            <div class="row g-3 mb-3">
                <div class="col-md-8">
                    <label class="form-label small">{{ $f['label'] }}</label>
                    <input type="text" name="{{ $f['field'] }}" value="{{ old($f['field'], $data[$f['field']] ?? '') }}" class="form-control" placeholder="{{ $f['label'] }} (contoh: KH Zaid)">
                </div>
                <div class="col-md-4">
                    <label class="form-label small">No HP/WA</label>
                    <input type="text" name="{{ $f['hp'] }}" value="{{ old($f['hp'], $data[$f['hp']] ?? '') }}" class="form-control" placeholder="08xxxxxxxxxx">
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-3 border-top d-flex justify-content-between align-items-center" style="background:linear-gradient(135deg,#fdf6e3 0%, #fdf0c7 100%);border-top:2px solid #d4af37">
            <a href="{{ route('permohonan.step1') }}" class="btn-yellow"><i class="bi bi-arrow-left"></i> Tahap ١</a>
            <span class="arab small" style="color:#0a3d1f">الصدق أمانة — ٢/٤</span>
            <button type="submit" class="btn-green">Selanjutnya <i class="bi bi-arrow-right"></i> • Tahap ٣</button>
        </div>
    </form>
</div>
@endsection
