@extends('layouts.app')
@section('title','Dashboard - TMTB & DAI KIK')
@section('breadcrumb','Dashboard')
@section('content')
{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-3 gap-2 p-3 rounded-3" style="background:linear-gradient(135deg,#fff 0%, var(--cream) 100%);border:2px solid var(--gold);box-shadow:0 4px 16px rgba(10,61,31,.06);position:relative;overflow:hidden">
  <div style="position:absolute;right:12px;top:50%;transform:translateY(-50%);opacity:.06;pointer-events:none"><img src="{{ asset('images/madin.png') }}" alt="" style="width:92px;height:92px;object-fit:contain"></div>
  <div style="min-width:0;position:relative;z-index:1" class="d-flex align-items-center gap-3">
    <img src="{{ asset('images/madin.png') }}" alt="Madin" style="width:48px;height:48px;object-fit:contain;filter:drop-shadow(0 3px 8px rgba(10,61,31,.12));flex-shrink:0" class="d-none d-sm-block">
    <div>
      <h4 class="mb-1 fw-bold" style="color:var(--green);font-size:clamp(18px,5vw,22px)">Dashboard <span style="color:var(--gold)">KIK</span> <span class="arab small d-none d-sm-inline" style="color:var(--gold);font-size:13px">— لوحة التحكم</span></h4>
      <p class="small mb-0" style="color:#5d4037;line-height:1.4">
        @if($isAdmin) Admin • Kelola {{ $allTotal }} permohonan • <span style="color:#dc3545;font-weight:700">{{ $allProses }} pending</span>
        @elseif($isPjgt) PJGT • {{ $total }} permohonan milik Anda
        @else GT • {{ $total }} permohonan Diterima
        @endif
        <span class="arab" style="color:var(--gold)"> — بارك الله</span>
      </p>
    </div>
  </div>
  <span class="badge-pendaftaran d-none d-md-inline flex-shrink-0" style="position:relative;z-index:1">1448/1449 H • TMTB & DAI</span>
  <span class="badge-pendaftaran d-md-none flex-shrink-0" style="font-size:11px;position:relative;z-index:1">1448 H</span>
</div>

{{-- 1. KPI 6 cards --}}
<div class="row g-2 g-md-3 mb-3">
  <div class="col-6 col-lg-2 col-md-4">
    <div class="card h-100" style="border:2px solid var(--gold);border-radius:16px;background:#fff;box-shadow:0 4px 16px rgba(10,61,31,.06)">
      <div class="card-body p-3 d-flex align-items-center gap-2">
        <div style="width:46px;height:46px;background:var(--green);color:var(--gold);border:2px solid var(--gold);border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-journal-bookmark-fill"></i></div>
        <div><div class="small" style="color:#8a7a3a;font-weight:600;font-size:11px">Total</div><div class="fw-bold" style="color:var(--green);font-size:20px;line-height:1">{{ $total }}</div><div class="small arab" style="color:var(--gold);font-size:10px">الكل</div></div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-2 col-md-4">
    <div class="card h-100" style="border:2px solid #d4af37;border-radius:16px;background:linear-gradient(135deg,#fffbe6 0%, #fff 100%);box-shadow:0 4px 16px rgba(212,175,55,.18);position:relative;overflow:hidden">
      <div style="position:absolute;top:6px;right:8px;width:8px;height:8px;background:#d4af37;border-radius:50%;animation:pulse 1.5s infinite"></div>
      <div class="card-body p-3 d-flex align-items-center gap-2">
        <div style="width:46px;height:46px;background:#d4af37;color:#fff;border:2px solid var(--green);border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-hourglass-split"></i></div>
        <div><div class="small" style="color:#8a7a3a;font-weight:700;font-size:11px">Proses</div><div class="fw-bold" style="color:#b8941f;font-size:20px;line-height:1">{{ $proses }}</div><div class="small" style="color:#dc3545;font-size:10px;font-weight:600">{{ $isAdmin ? $allProses.' pending' : 'menunggu' }}</div></div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-2 col-md-4">
    <div class="card h-100" style="border:2px solid #198754;border-radius:16px;background:#fff;">
      <div class="card-body p-3 d-flex align-items-center gap-2">
        <div style="width:46px;height:46px;background:#198754;color:#fff;border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-check-circle-fill"></i></div>
        <div><div class="small" style="color:#8a7a3a;font-weight:600;font-size:11px">Diterima</div><div class="fw-bold" style="color:#198754;font-size:20px;line-height:1">{{ $diterima }}</div><div class="small arab" style="color:#198754;font-size:10px">مقبول</div></div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-2 col-md-4">
    <div class="card h-100" style="border:2px solid #dc3545;border-radius:16px;background:#fff;">
      <div class="card-body p-3 d-flex align-items-center gap-2">
        <div style="width:46px;height:46px;background:#dc3545;color:#fff;border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-x-circle-fill"></i></div>
        <div><div class="small" style="color:#8a7a3a;font-weight:600;font-size:11px">Ditolak</div><div class="fw-bold" style="color:#dc3545;font-size:20px;line-height:1">{{ $ditolak }}</div><div class="small arab" style="color:#dc3545;font-size:10px">مرفوض</div></div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-2 col-md-4">
    <div class="card h-100" style="border:2px solid var(--green);border-radius:16px;background:linear-gradient(135deg,var(--green) 0%, #0f5a2e 100%);color:var(--cream)">
      <div class="card-body p-3 d-flex align-items-center gap-2">
        <div style="width:46px;height:46px;background:var(--cream);color:var(--green);border:2px solid var(--gold);border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-people-fill"></i></div>
        <div><div class="small" style="color:var(--gold);font-size:11px">Butuh GT</div><div class="fw-bold" style="color:var(--gold);font-size:20px;line-height:1">{{ $butuhGt }}</div><div class="small" style="color:var(--cream);opacity:.7;font-size:10px">orang</div></div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-2 col-md-4">
    <div class="card h-100" style="border:2px solid var(--gold);border-radius:16px;background:#fff;">
      <div class="card-body p-3 d-flex align-items-center gap-2">
        <div style="width:46px;height:46px;background:var(--gold);color:var(--green);border:2px solid var(--green);border-radius:12px;display:flex;align-items:center;justify-content:center"><i class="bi bi-mortarboard-fill"></i></div>
        <div><div class="small" style="color:#8a7a3a;font-weight:600;font-size:11px">Madrasah</div><div class="fw-bold" style="color:var(--green);font-size:20px;line-height:1">{{ $madrasahDistinct }}</div><div class="small arab" style="color:var(--gold);font-size:10px">مدرسة</div></div>
      </div>
    </div>
  </div>
</div>
<style>@keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}</style>

<div class="row g-2 g-md-3 mb-3">
  {{-- 2. Antrian Approve (admin) / Recent --}}
  <div class="col-12 col-lg-8">
    @if($isAdmin)
    <div class="card-form h-100">
      <div class="card-form-header d-flex justify-content-between align-items-center gap-2 flex-wrap">
        <span><i class="bi bi-hourglass-top" style="color:#dc3545"></i> Antrian Persetujuan <span class="badge" style="background:#dc3545;color:#fff">{{ $pending->count() }}</span> <span class="arab small d-none d-sm-inline" style="color:var(--gold)">— في الانتظار</span></span>
        <a href="{{ route('permohonan.lama',['status'=>'Proses']) }}" class="btn btn-sm" style="background:var(--green);color:var(--gold);border:1.5px solid var(--gold);border-radius:50px;font-size:11px;font-weight:700">Lihat Semua Proses <i class="bi bi-arrow-right"></i></a>
      </div>
      <div class="table-responsive d-none d-md-block">
        <table class="table table-hover mb-0 small" style="border-color:#e8d9a0">
          <thead style="background:var(--cream2);color:var(--green)"><tr><th>ID</th><th>PJGT / Madrasah</th><th>Wil</th><th>Rapot</th><th>Aksi</th></tr></thead>
          <tbody>
            @forelse($pending as $p)
            <tr>
              <td><span class="badge-pendaftaran">{{ $p->pjgt_id }}</span></td>
              <td><div style="color:var(--green);font-weight:700">{{ $p->pjgt_nama }}</div><div style="color:#5d4037;font-size:11px">{{ $p->nama_madrasah }} • {{ $p->tahun }}</div></td>
              <td><span class="badge" style="background:var(--cream2);color:var(--green);border:1px solid var(--gold)">{{ $p->wil }}</span></td>
              <td><span class="badge" style="background:{{$p->rapot=='A'?'#0a3d1f':($p->rapot=='B'?'#d4af37':'#8a7a3a')}};color:#fff">{{ $p->rapot }}</span></td>
              <td class="d-flex gap-1">
                <a href="{{ route('permohonan.show',$p) }}" class="btn btn-sm" style="background:var(--cream);border:1px solid var(--gold);color:var(--green);border-radius:20px;font-size:11px">Detail</a>
                <form method="POST" action="{{ route('permohonan.approve',$p) }}" class="d-inline">@csrf<button name="status" value="Diterima" class="btn btn-sm" style="background:#198754;color:#fff;border-radius:20px;font-size:11px" onclick="return confirm('Setujui {{ $p->pjgt_id }}?')">✓</button></form>
                <form method="POST" action="{{ route('permohonan.approve',$p) }}" class="d-inline">@csrf<button name="status" value="Ditolak" class="btn btn-sm" style="background:#dc3545;color:#fff;border-radius:20px;font-size:11px" onclick="return confirm('Tolak {{ $p->pjgt_id }}?')">✕</button></form>
              </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-4" style="color:var(--brown)">Tidak ada antrian. Semua sudah diproses <span class="arab" style="color:var(--gold)">الحمد لله</span></td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="d-md-none p-2">
        @forelse($pending as $p)
        <div class="p-3 mb-2 rounded-3" style="background:#fff;border:1.5px solid #e8d9a0;border-left:4px solid #dc3545">
          <div class="d-flex justify-content-between"><span class="badge-pendaftaran">{{ $p->pjgt_id }}</span><span class="badge" style="background:#d4af37;color:#000">{{ $p->rapot }}</span></div>
          <div class="fw-bold mt-1" style="color:var(--green)">{{ $p->pjgt_nama }}</div>
          <div class="small" style="color:#5d4037">{{ $p->nama_madrasah }} • {{ $p->wil }}</div>
          <div class="d-flex gap-1 mt-2"><a href="{{ route('permohonan.show',$p) }}" class="btn btn-sm flex-fill" style="background:var(--green);color:var(--gold);border-radius:20px">Detail</a><form method="POST" action="{{ route('permohonan.approve',$p) }}" class="flex-fill">@csrf<button name="status" value="Diterima" class="btn btn-sm w-100" style="background:#198754;color:#fff;border-radius:20px">Setujui</button></form></div>
        </div>
        @empty
        <div class="text-center py-3 small" style="color:var(--brown)">Tidak ada antrian</div>
        @endforelse
      </div>
    </div>
    @else
    <div class="card-form h-100">
      <div class="card-form-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-collection-fill" style="color:var(--gold)"></i> Permohonan Terbaru</span>
        <a href="{{ route('permohonan.lama') }}" class="btn btn-sm" style="background:var(--gold);color:var(--green);border:1.5px solid var(--green);border-radius:50px;font-size:11px;font-weight:700">Lihat Semua</a>
      </div>
      <div class="table-responsive d-none d-md-block">
        <table class="table table-hover mb-0 small"><thead style="background:var(--cream2);color:var(--green)"><tr><th>ID</th><th>Nama</th><th>Madrasah</th><th>Tahun</th><th>Status</th></tr></thead>
        <tbody>@forelse($recent as $p)<tr><td><span class="badge-pendaftaran">{{ $p->pjgt_id }}</span></td><td style="color:var(--green);font-weight:600">{{ $p->pjgt_nama }}</td><td>{{ $p->nama_madrasah }}</td><td>{{ $p->tahun }}</td><td><span class="badge" style="background:var(--green);color:var(--gold)">{{ $p->status }}</span></td></tr>@empty<tr><td colspan="5" class="text-center py-3">Belum ada data</td></tr>@endforelse</tbody></table>
      </div>
      <div class="d-md-none p-2">@forelse($recent as $p)<div class="p-3 mb-2 rounded-3" style="background:#fff;border:1.5px solid #e8d9a0;border-left:4px solid var(--gold)"><div class="d-flex justify-content-between"><span class="badge-pendaftaran">{{ $p->pjgt_id }}</span><span class="badge" style="background:var(--green);color:var(--gold)">{{ $p->status }}</span></div><div class="fw-bold mt-1" style="color:var(--green)">{{ $p->pjgt_nama }}</div><div class="small" style="color:#5d4037">{{ $p->nama_madrasah }}</div></div>@empty<div class="text-center py-3 small">Belum ada</div>@endforelse</div>
    </div>
    @endif
  </div>
  {{-- Quick actions + Export --}}
  <div class="col-12 col-lg-4">
    <div class="card h-100" style="border:2px solid var(--gold);border-radius:16px;background:#fff;">
      <div class="card-body p-3">
        <h6 class="fw-bold mb-3" style="color:var(--green)"><i class="bi bi-lightning-fill" style="color:var(--gold)"></i> Aksi Cepat</h6>
        @if($isAdmin)
        <div class="d-grid gap-2">
          <a href="{{ route('permohonan.lama',['status'=>'Proses']) }}" class="btn-green" style="justify-content:center"><i class="bi bi-check2-square"></i> Proses Persetujuan ({{ $allProses }})</a>
          <a href="{{ route('permohonan.rekap') }}" class="btn-yellow" style="justify-content:center"><i class="bi bi-bar-chart-fill"></i> Lihat Rekap</a>
          <a href="{{ route('permohonan.export') }}" class="btn btn-sm" style="background:var(--cream);border:1.5px solid var(--gold);color:var(--green);border-radius:50px;font-weight:700"><i class="bi bi-download"></i> Export Excel</a>
          <a href="{{ route('landing') }}" target="_blank" class="btn btn-sm" style="background:#fff;border:1.5px solid #e8d9a0;color:var(--brown);border-radius:50px"><i class="bi bi-pencil-square"></i> Kelola Landing Page</a>
        </div>
        <hr style="border-color:var(--gold);opacity:.3">
        <div class="small" style="color:#5d4037;line-height:1.6">
          <div class="d-flex justify-content-between"><span><i class="bi bi-people" style="color:var(--gold)"></i> PJGT Terdaftar</span><strong style="color:var(--green)">{{ $pjgtUserCount }}</strong></div>
          <div class="d-flex justify-content-between"><span><i class="bi bi-mortarboard" style="color:var(--gold)"></i> GT Tersedia</span><strong style="color:var(--green)">{{ $gtCount }}</strong></div>
          <div class="d-flex justify-content-between"><span><i class="bi bi-journals" style="color:var(--gold)"></i> Total PJGT Unik</span><strong style="color:var(--green)">{{ $pjgtDistinct }}</strong></div>
        </div>
        @else
        <div class="d-grid gap-2">
          <a href="{{ route('permohonan.step1') }}" class="btn-green" style="justify-content:center"><i class="bi bi-feather"></i> Buat Pendaftaran Baru</a>
          <a href="{{ route('permohonan.lama') }}" class="btn-yellow" style="justify-content:center"><i class="bi bi-collection"></i> Lihat Arsip Saya</a>
          <a href="{{ route('landing') }}" class="btn btn-sm" style="background:var(--cream);border:1.5px solid var(--gold);color:var(--green);border-radius:50px"><i class="bi bi-house"></i> Beranda</a>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

{{-- 3. Charts --}}
<div class="row g-2 g-md-3 mb-3">
  <div class="col-12 col-md-6 col-lg-3">
    <div class="card" style="border:2px solid var(--gold);border-radius:16px"><div class="card-body p-3"><h6 class="fw-bold mb-2" style="color:var(--green);font-size:13px"><i class="bi bi-pie-chart-fill" style="color:var(--gold)"></i> Status</h6><div style="height:180px;position:relative"><canvas id="dashStatus"></canvas></div></div></div>
  </div>
  <div class="col-12 col-md-6 col-lg-3">
    <div class="card" style="border:2px solid var(--gold);border-radius:16px"><div class="card-body p-3"><h6 class="fw-bold mb-2" style="color:var(--green);font-size:13px"><i class="bi bi-award-fill" style="color:var(--gold)"></i> Rapot</h6><div style="height:180px;position:relative"><canvas id="dashRapot"></canvas></div></div></div>
  </div>
  <div class="col-12 col-md-6 col-lg-3">
    <div class="card" style="border:2px solid var(--gold);border-radius:16px"><div class="card-body p-3"><h6 class="fw-bold mb-2" style="color:var(--green);font-size:13px"><i class="bi bi-geo-alt-fill" style="color:var(--gold)"></i> Wilayah</h6><div style="height:180px;position:relative"><canvas id="dashWil"></canvas></div></div></div>
  </div>
  <div class="col-12 col-md-6 col-lg-3">
    <div class="card" style="border:2px solid var(--gold);border-radius:16px"><div class="card-body p-3"><h6 class="fw-bold mb-2" style="color:var(--green);font-size:13px"><i class="bi bi-map-fill" style="color:var(--gold)"></i> Top Provinsi</h6><div style="height:180px;position:relative"><canvas id="dashProv"></canvas></div></div></div>
  </div>
</div>

{{-- 4. Madrasah & PJGT + Aktivitas --}}
<div class="row g-2 g-md-3 mb-3">
  <div class="col-12 col-lg-6">
    <div class="card" style="border:2px solid var(--gold);border-radius:16px">
      <div class="card-body p-3">
        <h6 class="fw-bold" style="color:var(--green);font-size:13px"><i class="bi bi-trophy-fill" style="color:var(--gold)"></i> Top PJGT Teraktif</h6>
        <div class="table-responsive"><table class="table table-sm small mb-0"><thead style="background:var(--cream2);color:var(--green)"><tr><th>#</th><th>PJGT</th><th>Username</th><th>Jml</th></tr></thead><tbody>@forelse($topPjgt as $i=>$t)<tr><td>{{ $i+1 }}</td><td style="color:var(--green);font-weight:600">{{ $t->pjgt_nama }}</td><td><span class="badge-pendaftaran">{{ $t->username }}</span></td><td><span class="badge" style="background:var(--gold);color:var(--green)">{{ $t->c }}</span></td></tr>@empty<tr><td colspan="4" class="text-center py-2" style="color:var(--brown)">Belum ada data</td></tr>@endforelse</tbody></table></div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-6">
    <div class="card-form">
      <div class="card-form-header"><i class="bi bi-clock-history" style="color:var(--gold)"></i> Aktivitas Terbaru <span class="arab small" style="color:var(--gold)">— النشاط</span></div>
      <div class="p-2">
        @forelse($recent as $p)
        <div class="d-flex gap-3 p-2 rounded-3 mb-2" style="background:linear-gradient(135deg,#fff 0%, #fdfdf7 100%);border:1px solid #e8d9a0">
          <div style="width:36px;height:36px;background:var(--green);color:var(--gold);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0"><i class="bi bi-journal-text"></i></div>
          <div style="min-width:0;flex:1">
            <div class="small fw-bold" style="color:var(--green);white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $p->pjgt_nama }} • {{ $p->nama_madrasah }}</div>
            <div class="small" style="color:#8a7a3a;font-size:11px">{{ $p->pjgt_id }} • {{ $p->status }} • {{ $p->created_at->diffForHumans() }}</div>
          </div>
          <a href="{{ route('permohonan.show',$p) }}" class="btn btn-sm align-self-center" style="background:var(--cream);border:1px solid var(--gold);color:var(--green);border-radius:20px;font-size:11px">Detail</a>
        </div>
        @empty
        <div class="text-center py-3 small" style="color:var(--brown)">Belum ada aktivitas</div>
        @endforelse
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
const dStatus = @json($byStatus);
const dRapot = @json($byRapot);
const dWil = @json($byWil);
const dProv = @json($byProv);
function chartColors(n, palette){ const p = palette; return Array.from({length:n},(_,i)=> p[i%p.length]); }
new Chart(document.getElementById('dashStatus'), {type:'doughnut', data:{labels:Object.keys(dStatus), datasets:[{data:Object.values(dStatus), backgroundColor: chartColors(Object.keys(dStatus).length, ['#0a3d1f','#d4af37','#dc3545','#8a7a3a','#0f5a2e']), borderWidth:2}]}, options:{responsive:true,maintainAspectRatio:false, plugins:{legend:{position:'bottom', labels:{color:'#0a3d1f', usePointStyle:true, font:{weight:'700'}}}}}});
new Chart(document.getElementById('dashRapot'), {type:'bar', data:{labels:Object.keys(dRapot), datasets:[{label:'Rapot', data:Object.values(dRapot), backgroundColor:['#0a3d1f','#d4af37','#8a7a3a'], borderRadius:8}]}, options:{responsive:true,maintainAspectRatio:false, plugins:{legend:{display:false}}, scales:{y:{beginAtZero:true, grid:{color:'#f0e6b8'}}, x:{grid:{display:false}}}}});
new Chart(document.getElementById('dashWil'), {type:'doughnut', data:{labels:Object.keys(dWil), datasets:[{data:Object.values(dWil), backgroundColor: chartColors(Object.keys(dWil).length, ['#0a3d1f','#d4af37','#198754','#dc3545']), borderWidth:2}]}, options:{responsive:true,maintainAspectRatio:false, plugins:{legend:{position:'bottom', labels:{color:'#0a3d1f', usePointStyle:true, font:{weight:'700'}}}}}});
new Chart(document.getElementById('dashProv'), {type:'bar', data:{labels:Object.keys(dProv), datasets:[{label:'Provinsi', data:Object.values(dProv), backgroundColor:'#0a3d1f', borderRadius:8}]}, options:{responsive:true,maintainAspectRatio:false, indexAxis:'y', plugins:{legend:{display:false}}, scales:{x:{beginAtZero:true, grid:{color:'#f0e6b8'}}, y:{grid:{display:false}}}}});
</script>
@endpush
@endsection
