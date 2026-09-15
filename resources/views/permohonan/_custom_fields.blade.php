@if($customQuestions->isNotEmpty())
<div class="mt-4 p-3 rounded-3" style="background:#fffdf0;border:2px dashed var(--gold)">
  <h6 class="fw-bold mb-3" style="color:var(--green)"><i class="bi bi-patch-question-fill" style="color:var(--gold)"></i> Pertanyaan Tambahan <span class="small fw-normal" style="color:#8a7a3a">— ditentukan admin</span></h6>
  @foreach($customQuestions as $q)
  <div class="mb-3">
    <label class="form-label small">{{ $q->label }} @if($q->is_required)<span class="text-danger">*</span>@endif</label>
    @if($q->field_type=='textarea')
      <textarea name="extra[{{ $q->field_name }}]" class="form-control @error('extra.'.$q->field_name) is-invalid @enderror" placeholder="{{ $q->placeholder }}" rows="3">{{ old('extra.'.$q->field_name, $extraData[$q->field_name] ?? '') }}</textarea>
    @elseif($q->field_type=='select')
      <select name="extra[{{ $q->field_name }}]" class="form-select @error('extra.'.$q->field_name) is-invalid @enderror">
        <option value="">-- pilih --</option>
        @foreach(explode(',', $q->options ?? '') as $opt)
          @php $opt=trim($opt); @endphp
          @if($opt!=='')<option value="{{ $opt }}" @selected(old('extra.'.$q->field_name, $extraData[$q->field_name] ?? '')==$opt)>{{ $opt }}</option>@endif
        @endforeach
      </select>
    @elseif($q->field_type=='number')
      <input type="number" name="extra[{{ $q->field_name }}]" value="{{ old('extra.'.$q->field_name, $extraData[$q->field_name] ?? '') }}" class="form-control @error('extra.'.$q->field_name) is-invalid @enderror" placeholder="{{ $q->placeholder }}">
    @elseif($q->field_type=='date')
      <input type="date" name="extra[{{ $q->field_name }}]" value="{{ old('extra.'.$q->field_name, $extraData[$q->field_name] ?? '') }}" class="form-control @error('extra.'.$q->field_name) is-invalid @enderror">
    @else
      <input type="text" name="extra[{{ $q->field_name }}]" value="{{ old('extra.'.$q->field_name, $extraData[$q->field_name] ?? '') }}" class="form-control @error('extra.'.$q->field_name) is-invalid @enderror" placeholder="{{ $q->placeholder }}">
    @endif
    @error('extra.'.$q->field_name)<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
  </div>
  @endforeach
</div>
@endif
