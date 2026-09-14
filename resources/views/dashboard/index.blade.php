@extends('layouts.app')
@section('title','Dashboard - TMTB & DAI KIK')
@section('breadcrumb','Dashboard')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 gap-2 p-3 rounded-3" style="background:linear-gradient(135deg,#fff 0%, var(--cream) 100%);border:2px solid var(--gold);box-shadow:0 4px 16px rgba(10,61,31,.06);position:relative;overflow:hidden">
  <div style="position:absolute;right:12px;top:50%;transform:translateY(-50%);opacity:.06;pointer-events:none"><img src="{{ asset('images/madin.png') }}" alt="" style="width:92px;height:92px;object-fit:contain"></div>
  <div style="min-width:0;position:relative;z-index:1" class="d-flex align-items-center gap-3">
    <img src="{{ asset('images/madin.png') }}" alt="Madin" style="width:48px;height:48px;object-fit:contain;filter:drop-shadow(0 3px 8px rgba(10,61,31,.12));flex-shrink:0" class="d-none d-sm-block">
    <div>
      <h4 class="mb-1 fw-bold" style="color:var(--green);font-size:clamp(18px,5vw,22px)">Dashboard <span style="color:var(--gold)">KIK</span> <span class="arab small d-none d-sm-inline" style="color:var(--gold);font-size:13px">— لوحة التحكم</span></h4>
      <p class="small mb-0" style="color:#5d4037;line-height:1.4">PP KUNUUZUL IMAM KAUMAN • Kauman Bondowoso • <span class="arab" style="color:var(--gold)">بارك الله</span></p>
    </div>
  </div>
  <span class="badge-pendaftaran d-none d-md-inline flex-shrink-0" style="position:relative;z-index:1">1448/1449 H • TMTB & DAI</span>
  <span class="badge-pendaftaran d-md-none flex-shrink-0" style="font-size:11px;position:relative;z-index:1">1448 H</span>
</div>

<div class="row g-2 g-md-3 mb-3 mb-md-4">
    <div class="col-12 col-md-4">
        <div class="card h-100" style="border:2px solid var(--gold);border-radius:16px;background:#fff;box-shadow:0 4px 16px rgba(10,61,31,0.08);transition:transform .22s, box-shadow .22s;cursor:default" onmouseenter="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 28px rgba(10,61,31,.12)'" onmouseleave="this.style.transform='';this.style.boxShadow='0 4px 16px rgba(10,61,31,0.08)'">
            <div class="card-body d-flex align-items-center gap-3 p-3 p-md-3">
                <div style="width:52px;height:52px;min-width:52px;background:var(--green);color:var(--gold);border:2px solid var(--gold);border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-journal-bookmark-fill fs-5"></i></div>
                <div style="min-width:0">
                    <div class="small" style="color:#8a7a3a;font-weight:600">Total Permohonan</div>
                    <div class="fs-4 fw-bold" style="color:var(--green)">{{ $total }}</div>
                    <div class="small arab" style="color:var(--gold)">طلب</div>
                </div>
                <span class="ms-auto d-md-none" style="width:8px;height:8px;background:#22c55e;border-radius:50%;box-shadow:0 0 8px #22c55e;flex-shrink:0" title="live"></span>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-4">
        <div class="card" style="border:2px solid var(--gold);border-radius:16px;background:#fff;">
            <div class="card-body d-flex align-items-center gap-3 p-3">
                <div style="width:52px;height:52px;min-width:52px;background:var(--gold);color:var(--green);border:2px solid var(--green);border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-mosque fs-5"></i></div>
                <div style="min-width:0">
                    <div class="small" style="color:#8a7a3a;font-weight:600">Madrasah Mitra</div>
                    <div class="fs-4 fw-bold" style="color:var(--green)">{{ $total }}</div>
                    <div class="small arab" style="color:var(--gold)">مدرسة</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-4">
        <div class="card" style="border:2px solid var(--gold);border-radius:16px;background:linear-gradient(135deg,var(--green) 0%, #0f5a2e 100%);color:var(--cream)">
            <div class="card-body d-flex align-items-center gap-3 p-3">
                <div style="width:52px;height:52px;min-width:52px;background:var(--cream);color:var(--green);border:2px solid var(--gold);border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-calendar-heart fs-5"></i></div>
                <div>
                    <div class="small" style="color:var(--gold)">Tahun Ajaran</div>
                    <div class="fs-4 fw-bold" style="color:var(--gold)">1448/1449</div>
                    <div class="small arab" style="color:var(--cream);opacity:0.8">هـ</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-form">
    <div class="card-form-header d-flex justify-content-between align-items-center gap-2 flex-wrap">
        <span><i class="bi bi-collection-fill" style="color:var(--gold)"></i> Permohonan Terbaru <span class="arab small d-none d-sm-inline" style="color:var(--gold)">— أحدث الطلبات</span></span>
        <a href="{{ route('permohonan.lama') }}" class="btn btn-sm flex-shrink-0" style="background:var(--gold);color:var(--green);border:2px solid var(--green);border-radius:50px;font-weight:700">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a>
    </div>
    <!-- Desktop table -->
    <div class="table-responsive d-none d-md-block">
        <table class="table table-hover mb-0 small" style="border-color:#e8d9a0">
            <thead style="background:var(--cream2);color:var(--green)"><tr><th>ID PJGT</th><th>Nama PJGT</th><th>Madrasah</th><th>Tahun</th><th>Status</th></tr></thead>
            <tbody>
                @forelse($recent as $p)
                <tr><td><span class="badge-pendaftaran">{{ $p->pjgt_id }}</span></td><td style="color:var(--green);font-weight:600">{{ $p->pjgt_nama }}</td><td>{{ $p->nama_madrasah }}</td><td>{{ $p->tahun }}</td><td><span class="badge" style="background:var(--green);color:var(--gold);border:1px solid var(--gold)">{{ $p->status }}</span></td></tr>
                @empty
                <tr><td colspan="5" class="text-center py-4" style="color:var(--brown)">Belum ada permohonan. <a href="{{ route('permohonan.step1') }}" style="color:var(--green);font-weight:700">Buat Permohonan Baru</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Mobile cards — tiada tanding -->
    <div class="d-md-none p-2">
        @forelse($recent as $p)
        <div class="p-3 mb-2 rounded-3" style="background:linear-gradient(135deg,#fff 0%, #fdfdf7 100%);border:1.5px solid #e8d9a0;border-left:4px solid var(--gold);box-shadow:0 2px 10px rgba(10,61,31,0.06)">
            <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                <span class="badge-pendaftaran" style="font-size:11px">{{ $p->pjgt_id }}</span>
                <span class="badge small" style="background:{{$p->status=='Diterima'?'#198754':($p->status=='Proses'?'#d4af37':'#dc3545')}};color:#fff;border:1px solid #0a3d1f;font-size:10px">{{ $p->status }}</span>
            </div>
            <div class="fw-bold" style="color:var(--green);font-size:14px;line-height:1.3">{{ $p->pjgt_nama }}</div>
            <div class="small" style="color:#5d4037"><i class="bi bi-mortarboard" style="color:var(--gold2)"></i> {{ $p->nama_madrasah }}</div>
            <div class="d-flex justify-content-between align-items-center mt-2 small">
                <span style="color:#8a7a3a"><i class="bi bi-calendar3"></i> {{ $p->tahun }}</span>
                <a href="{{ route('permohonan.show',$p) }}" class="btn btn-sm py-1 px-3" style="background:var(--green);color:var(--gold);border:1px solid var(--gold);border-radius:20px;font-size:11px;font-weight:700">Detail <i class="bi bi-chevron-right" style="font-size:10px"></i></a>
            </div>
        </div>
        @empty
        <div class="text-center py-4 px-3 rounded-3" style="background:#fdf6e3;border:1.5px dashed #d4af37;color:var(--brown)">
            <div style="width:48px;height:48px;background:#fff;border:2px solid var(--gold);color:var(--gold2);border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 10px"><i class="bi bi-inbox"></i></div>
            Belum ada permohonan.<br><a href="{{ route('permohonan.step1') }}" class="btn-green mt-2" style="font-size:13px">Buat Permohonan Baru</a>
        </div>
        @endforelse
    </div>
</div>

<div class="row g-2 g-md-3 mt-2 mt-md-1">
    <div class="col-12 col-md-6">
        <div class="card" style="border:2px solid var(--gold);border-radius:16px">
            <div class="card-body p-3">
                <h6 class="fw-bold" style="color:var(--green);font-size:14px"><i class="bi bi-pie-chart-fill" style="color:var(--gold)"></i> Status <span class="arab small" style="color:#b8941f">— الحالة</span></h6>
                <canvas id="dashStatus" height="160"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card" style="border:2px solid var(--gold);border-radius:16px">
            <div class="card-body p-3">
                <h6 class="fw-bold" style="color:var(--green);font-size:14px"><i class="bi bi-award-fill" style="color:var(--gold)"></i> Rapot <span class="arab small" style="color:#b8941f">— التقدير</span></h6>
                <canvas id="dashRapot" height="160"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 d-flex gap-2 flex-wrap">
    <a href="{{ route('permohonan.step1') }}" class="btn-green flex-fill flex-md-grow-0"><i class="bi bi-feather"></i> Buat Pendaftaran Baru</a>
    <a href="{{ route('landing') }}" class="btn-yellow flex-fill flex-md-grow-0"><i class="bi bi-house"></i> Beranda</a>
    <span class="arab ms-auto align-self-center d-none d-md-inline" style="color:var(--gold);font-size:13px">العلم نور</span>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
const dStatus = @json($byStatus);
const dRapot = @json($byRapot);
const statusChart = new Chart(document.getElementById('dashStatus'), {type:'doughnut', data:{labels:Object.keys(dStatus), datasets:[{data:Object.values(dStatus), backgroundColor:['#0a3d1f','#dc3545','#d4af37'], borderWidth:2, hoverOffset:12}]}, options:{responsive:true,maintainAspectRatio:false, onClick:(e,els)=>{ if(els.length){ const idx=els[0].index; const label=Object.keys(dStatus)[idx]; const val=Object.values(dStatus)[idx]; if(window.showToast) showToast(label+': '+val+' permohonan'); // filter table rows live
        const q=label.toLowerCase(); document.querySelectorAll('.card-form tbody tr, .d-md-none .rounded-3').forEach(row=>{ row.style.display=row.textContent.toLowerCase().includes(q)?'':'none'; }); }}, plugins:{legend:{position:'bottom', labels:{color:'#0a3d1f', padding:12, usePointStyle:true, font:{weight:'700'}}}, tooltip:{backgroundColor:'#0a3d1f', titleColor:'#d4af37', bodyColor:'#fff', borderColor:'#d4af37', borderWidth:1.5}}}});
const rapotChart = new Chart(document.getElementById('dashRapot'), {type:'bar', data:{labels:Object.keys(dRapot), datasets:[{label:'Rapot', data:Object.values(dRapot), backgroundColor:['#0a3d1f','#d4af37','#8a7a3a'], borderRadius:8, hoverBackgroundColor:['#0f5a2e','#e8c24a','#9c8a4a']}]}, options:{responsive:true,maintainAspectRatio:false, onClick:(e,els)=>{ if(els.length){ const label=Object.keys(dRapot)[els[0].index]; if(window.showToast) showToast('Rapot '+label+' — klik lagi untuk reset'); document.querySelectorAll('.card-form tbody tr').forEach(r=> r.style.display=r.textContent.includes(label)?'':'none'); }}, plugins:{legend:{display:false}, tooltip:{backgroundColor:'#0a3d1f'}}, scales:{y:{beginAtZero:true, grid:{color:'#f0e6b8'}}, x:{grid:{display:false}}}, animation:{duration:900, easing:'easeOutQuart'}}});
// row click
document.querySelectorAll('.card-form tbody tr').forEach(tr=>{ tr.style.cursor='pointer'; tr.title='Klik untuk detail'; tr.addEventListener('click', ()=>{ const link=tr.querySelector('a[href*="permohonan"]'); if(link) window.location=link.href; }); });
document.querySelectorAll('.d-md-none .rounded-3').forEach(card=>{ card.style.cursor='pointer'; card.addEventListener('click', (e)=>{ if(e.target.closest('a,button')) return; const a=card.querySelector('a'); if(a) window.location=a.href; }); });
// reset filter on double click chart area
document.getElementById('dashStatus').addEventListener('dblclick', ()=>{ document.querySelectorAll('.card-form tbody tr, .d-md-none .rounded-3').forEach(r=> r.style.display=''); if(window.showToast) showToast('Filter direset'); });
</script>
@endpush
@endsection
