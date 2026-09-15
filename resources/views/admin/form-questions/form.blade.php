@extends('layouts.app')
@section('title', ($question->exists ? 'Edit' : 'Tambah').' Pertanyaan Form')
@section('breadcrumb','Form Questions')
@section('content')
<div class="card-form" style="max-width:720px;margin:0 auto">
  <div class="card-form-header">{{ $question->exists ? 'Edit' : 'Tambah' }} Pertanyaan</div>
  <form method="POST" action="{{ $question->exists ? route('form-questions.update',$question) : route('form-questions.store') }}" class="p-4">
    @csrf @if($question->exists) @method('PUT') @endif
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Step *</label>
        <select name="step" class="form-select" required>
          <option value="1" @selected(old('step',$question->step)==1)>1 - Identitas</option>
          <option value="2" @selected(old('step',$question->step)==2)>2 - Pengelola</option>
          <option value="3" @selected(old('step',$question->step)==3)>3 - Madrasah</option>
          <option value="4" @selected(old('step',$question->step)==4)>4 - Murid</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Tipe *</label>
        <select name="field_type" class="form-select" required id="fieldType">
          <option value="text" @selected(old('field_type',$question->field_type)=='text')>text - jawaban pendek</option>
          <option value="number" @selected(old('field_type',$question->field_type)=='number')>number - angka</option>
          <option value="textarea" @selected(old('field_type',$question->field_type)=='textarea')>textarea - jawaban panjang</option>
          <option value="select" @selected(old('field_type',$question->field_type)=='select')>select - pilihan</option>
          <option value="date" @selected(old('field_type',$question->field_type)=='date')>date - tanggal</option>
        </select>
      </div>
      <div class="col-12">
        <label class="form-label">Pertanyaan / Label *</label>
        <input name="label" value="{{ old('label',$question->label) }}" class="form-control" required placeholder="Contoh: Apakah madrasah memiliki perpustakaan?">
      </div>
      <div class="col-12" id="optionsWrap">
        <label class="form-label">Opsi pilihan (pisah koma, khusus tipe select)</label>
        <input name="options" value="{{ old('options',$question->options) }}" class="form-control" placeholder="Ya, Tidak, Belum ada">
      </div>
      <div class="col-12">
        <label class="form-label">Placeholder</label>
        <input name="placeholder" value="{{ old('placeholder',$question->placeholder) }}" class="form-control" placeholder="Contoh jawaban...">
      </div>
      <div class="col-md-4">
        <label class="form-label">Urutan</label>
        <input type="number" name="sort_order" value="{{ old('sort_order',$question->sort_order ?? 0) }}" class="form-control">
      </div>
      <div class="col-md-4 d-flex align-items-end">
        <label class="d-flex align-items-center gap-2"><input type="checkbox" name="is_required" value="1" @checked(old('is_required',$question->is_required))> Wajib diisi</label>
      </div>
      <div class="col-md-4 d-flex align-items-end">
        <label class="d-flex align-items-center gap-2"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$question->is_active ?? true))> Aktif</label>
      </div>
    </div>
    <div class="d-flex gap-2 mt-4">
      <button class="btn-green flex-fill"><i class="bi bi-check-circle"></i> Simpan</button>
      <a href="{{ route('form-questions.index') }}" class="btn-yellow flex-fill" style="justify-content:center">Batal</a>
    </div>
  </form>
</div>
@endsection
