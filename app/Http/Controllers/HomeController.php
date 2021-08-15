<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SuratMasuk;
use App\SuratKeluar;
use App\SuratPelayanan;
use App\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
            $user = Auth::user();

            $sekretaris = User::where('jabatan','Sekretaris')->first();
            $kasipemerintahan = User::where('jabatan','Kasi Pemerintahan & PP')->first();
            $kasitrantip = User::where('jabatan','Kasi Trantip & LH')->first();
            $kasipemberdayaan = User::where('jabatan','Kasi Pemberdayaan Masyarakat')->first();

            if($user->role == 'admin') {

                //surat masuk dashboard 1
                $todaysm = SuratMasuk::whereDate('tanggal_terima_surat',Carbon::today())->count();
                $weeksm =    SuratMasuk::where('tanggal_terima_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_terima_surat', '<', Carbon::now()->endOfWeek())
                ->count();
                $monthsm = SuratMasuk::whereMonth('tanggal_terima_surat',Carbon::now())->count();
                $thisyearsm = SuratMasuk::whereYear('tanggal_terima_surat',Carbon::now()->format('Y'))->count();
                // $monthsmlast = $thisyearsm-$monthsm;
                $monthsmlast = $thisyearsm;
                
                //surat keluar dashboard
                $todaysk = SuratKeluar::whereDate('tanggal_surat',Carbon::today())->count();
                $weeksk =    SuratKeluar::where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->count();
                $monthsk = SuratKeluar::whereMonth('tanggal_surat',Carbon::now())->count();
                $thisyearsk = SuratKeluar::whereYear('tanggal_surat',Carbon::now()->format('Y'))->count();
                // $monthsklast = $thisyearsk-$monthsk;
                $monthsklast = $thisyearsk;
                
                //surat pelayanan dashboard 2
                $todaysp = SuratPelayanan::whereDate('tanggal_surat',Carbon::today())->count();
                $weeksp =    SuratPelayanan::where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->count();
                $monthsp = SuratPelayanan::whereMonth('tanggal_surat',Carbon::now())->count();
                $thisyearsp = SuratPelayanan::whereYear('tanggal_surat',Carbon::now()->format('Y'))->count();
                // $monthsplast = $thisyearsp-$monthsp;
                $monthsplast = $thisyearsp;
                
            } else {
                //surat masuk dashboard 1
                $todaysm = SuratMasuk::where('id_users',$user->id)->whereDate('tanggal_terima_surat',Carbon::today())
                ->count();
                $weeksm =    SuratMasuk::where('id_users',$user->id)->where('tanggal_terima_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_terima_surat', '<', Carbon::now()->endOfWeek())
                ->count();
                $monthsm = SuratMasuk::where('id_users',$user->id)->whereMonth('tanggal_terima_surat',Carbon::now())->count();
                $thisyearsm = SuratMasuk::where('id_users',$user->id)->whereYear('tanggal_terima_surat',Carbon::now()->format('Y'))->count();
                // $monthsmlast = $thisyearsm-$monthsm;
                $monthsmlast = $thisyearsm;
                
                //surat keluar dashboard
                $todaysk = SuratKeluar::where('id_users',$user->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $weeksk =    SuratKeluar::where('id_users',$user->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->count();
                $monthsk = SuratKeluar::where('id_users',$user->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $thisyearsk = SuratKeluar::where('id_users',$user->id)->whereYear('tanggal_surat',Carbon::now()->format('Y'))->count();
                // $monthsklast = $thisyearsk-$monthsk;
                $monthsklast = $thisyearsk;
                
                //surat pelayanan dashboard 2
                $todaysp = SuratPelayanan::where('id_users',$user->id)->whereDate('tanggal_surat',Carbon::today())
                ->whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                $weeksp = SuratPelayanan::where('id_users',$user->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                $monthsp = SuratPelayanan::where('id_users',$user->id)->whereMonth('tanggal_surat',Carbon::now())
                ->whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                $thisyearsp = SuratPelayanan::where('id_users',$user->id)->whereYear('tanggal_surat',Carbon::now()->format('Y'))
                ->whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                // $monthsplast = $thisyearsp-$monthsp;
                $monthsplast = $thisyearsp;

                //surat vital dashboard 2
                $todaysv = SuratPelayanan::where('id_users',$user->id)->whereDate('tanggal_surat',Carbon::today())
                ->whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                $weeksv = SuratPelayanan::where('id_users',$user->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                ->whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                $monthsv = SuratPelayanan::where('id_users',$user->id)->whereMonth('tanggal_surat',Carbon::now())
                ->whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                $thisyearsv = SuratPelayanan::where('id_users',$user->id)->whereYear('tanggal_surat',Carbon::now()->format('Y'))
                ->whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])
                ->count();
                // $monthsplast = $thisyearsp-$monthsp;
                $monthsvlast = $thisyearsv;

                // dd($todaysv);
                // return $todaysv;
            }
                
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
                'todaysp', 'weeksp', 'monthsp','monthsplast',
                'todaysv', 'weeksv', 'monthsv','monthsvlast',
            ));

        } 
        // elseif(Auth::user()->role == 'operator') {

        //     return view('dashboard-operator')->with(compact(
        //         'todaysm', 'weeksm', 'monthsm','monthsmlast',
        //         'todaysk', 'weeksk', 'monthsk','monthsklast',
        //         'todaysp', 'weeksp', 'monthsp','monthsplast'
        //     ));

        // }
    }
}
