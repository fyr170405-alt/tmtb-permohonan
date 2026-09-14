<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $query = Permohonan::query();
        if ($user->role === 'pjgt') $query->where('username', $user->username);
        elseif ($user->role === 'gt') $query->where('status', 'Diterima');
        $total = $query->count();
        $recent = (clone $query)->latest()->take(5)->get();
        $byStatus = (clone $query)->selectRaw('status, count(*) as c')->groupBy('status')->pluck('c','status');
        $byRapot = (clone $query)->selectRaw('rapot, count(*) as c')->groupBy('rapot')->pluck('c','rapot');
        $myTotal = $total;
        $allTotal = Permohonan::count();
        return view('dashboard.index', compact('total','recent','byStatus','byRapot','myTotal','allTotal'));
    }
}
