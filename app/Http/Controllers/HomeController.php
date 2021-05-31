<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SuratMasuk;
use App\SuratKeluar;
use App\SuratPelayanan;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

            //surat masuk dashboard
            $todaysm = SuratMasuk::whereDate('tanggal_surat',Carbon::today())->count();
            $weeksm =    SuratMasuk::where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->count();
            $monthsm = SuratMasuk::whereMonth('tanggal_surat',Carbon::now())->count();
            $monthsmlast = SuratMasuk::whereMonth('tanggal_surat',Carbon::now()->subMonth())->count();

            //surat keluar dashboard
            $todaysk = SuratKeluar::whereDate('tanggal_surat',Carbon::today())->count();
            $weeksk =    SuratKeluar::where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->count();
            $monthsk = SuratKeluar::whereMonth('tanggal_surat',Carbon::now())->count();
            $monthsklast = SuratKeluar::whereMonth('tanggal_surat',Carbon::now()->subMonth())->count();

            //surat pelayanan dashboard
            $todaysp = SuratPelayanan::whereDate('tanggal_surat',Carbon::today())->count();
            $weeksp =    SuratPelayanan::where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->count();
            $monthsp = SuratPelayanan::whereMonth('tanggal_surat',Carbon::now())->count();
            $monthsplast = SuratPelayanan::whereMonth('tanggal_surat',Carbon::now()->subMonth())->count();

        if(Auth::user()->role == 'admin') {
            
            return view('dashboard-admin')->with(compact(
                'todaysm', 'weeksm', 'monthsm','monthsmlast',
                'todaysk', 'weeksk', 'monthsk','monthsklast',
                'todaysp', 'weeksp', 'monthsp','monthsplast'
            ));

        } elseif(Auth::user()->role == 'supervisor') {

            return view('dashboard-supervisor')->with(compact(
                'todaysm', 'weeksm', 'monthsm','monthsmlast',
                'todaysk', 'weeksk', 'monthsk','monthsklast',
                'todaysp', 'weeksp', 'monthsp','monthsplast'
            ));

        } elseif(Auth::user()->role == 'operator') {

            return view('dashboard-operator')->with(compact(
                'todaysm', 'weeksm', 'monthsm','monthsmlast',
                'todaysk', 'weeksk', 'monthsk','monthsklast',
                'todaysp', 'weeksp', 'monthsp','monthsplast'
            ));

        }
    }
}