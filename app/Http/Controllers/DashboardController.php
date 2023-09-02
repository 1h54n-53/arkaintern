<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Total()
    {
        $title = "Dashboard";
        $totalVisitorUsers1 = User::where('role', 'Admin')->count();
        $totalVisitorUsers2 = User::where('role', 'Peserta')->count();
        $totalVisitorUsers3 = User::where('role', 'Institusi')->count();
        $totalInstitusi = Institusi::where('nama_institusi')->count();

        return view('/dashboard', ['totalVisitorUsers1' => $totalVisitorUsers1, 'totalVisitorUsers2' => $totalVisitorUsers2,'totalVisitorUsers3'=>$totalVisitorUsers3,'totalInstitusi'=>$totalInstitusi]);
    }

}
