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

                // surat masuk start
                $todaysm = SuratMasuk::whereDate('tanggal_terima_surat',Carbon::today())->count();
                $todaysm1 = SuratMasuk::where('id_users',$sekretaris->id)->whereDate('tanggal_terima_surat',Carbon::today())->count();
                $todaysm2 = SuratMasuk::where('id_users',$kasipemerintahan->id)->whereDate('tanggal_terima_surat',Carbon::today())->count();
                $todaysm3 = SuratMasuk::where('id_users',$kasitrantip->id)->whereDate('tanggal_terima_surat',Carbon::today())->count();
                $todaysm4 = SuratMasuk::where('id_users',$kasipemberdayaan->id)->whereDate('tanggal_terima_surat',Carbon::today())->count();

                $weeksm = SuratMasuk::where('tanggal_terima_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_terima_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksm1 = SuratMasuk::where('id_users',$sekretaris->id)->where('tanggal_terima_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_terima_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksm2 = SuratMasuk::where('id_users',$kasipemerintahan->id)->where('tanggal_terima_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_terima_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksm3 = SuratMasuk::where('id_users',$kasitrantip->id)->where('tanggal_terima_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_terima_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksm4 = SuratMasuk::where('id_users',$kasipemberdayaan->id)->where('tanggal_terima_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_terima_surat', '<', Carbon::now()->endOfWeek())->count();
                
                
                $monthsm = SuratMasuk::whereMonth('tanggal_terima_surat',Carbon::now())->count();
                $monthsm1 = SuratMasuk::where('id_users',$sekretaris->id)->whereMonth('tanggal_terima_surat',Carbon::now())->count();
                $monthsm2 = SuratMasuk::where('id_users',$kasipemerintahan->id)->whereMonth('tanggal_terima_surat',Carbon::now())->count();
                $monthsm3 = SuratMasuk::where('id_users',$kasitrantip->id)->whereMonth('tanggal_terima_surat',Carbon::now())->count();
                $monthsm4 = SuratMasuk::where('id_users',$kasipemberdayaan->id)->whereMonth('tanggal_terima_surat',Carbon::now())->count();

                $totalsm = Suratmasuk::count();
                $totalsm1 = Suratmasuk::where('id_users',$sekretaris->id)->count();
                $totalsm2 = Suratmasuk::where('id_users',$kasipemerintahan->id)->count();
                $totalsm3 = Suratmasuk::where('id_users',$kasitrantip->id)->count();
                $totalsm4 = Suratmasuk::where('id_users',$kasipemberdayaan->id)->count();
                // surat masuk end

                // surat keluar start
                $todaysk = SuratKeluar::whereDate('tanggal_surat',Carbon::today())->count();
                $todaysk1 = SuratKeluar::where('id_users',$sekretaris->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysk2 = SuratKeluar::where('id_users',$kasipemerintahan->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysk3 = SuratKeluar::where('id_users',$kasitrantip->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysk4 = SuratKeluar::where('id_users',$kasipemberdayaan->id)->whereDate('tanggal_surat',Carbon::today())->count();

                $weeksk = SuratKeluar::where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksk1 = SuratKeluar::where('id_users',$sekretaris->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksk2 = SuratKeluar::where('id_users',$kasipemerintahan->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksk3 = SuratKeluar::where('id_users',$kasitrantip->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksk4 = SuratKeluar::where('id_users',$kasipemberdayaan->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                
                
                $monthsk = SuratKeluar::whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsk1 = SuratKeluar::where('id_users',$sekretaris->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsk2 = SuratKeluar::where('id_users',$kasipemerintahan->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsk3 = SuratKeluar::where('id_users',$kasitrantip->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsk4 = SuratKeluar::where('id_users',$kasipemberdayaan->id)->whereMonth('tanggal_surat',Carbon::now())->count();

                $totalsk = SuratKeluar::count();
                $totalsk1 = SuratKeluar::where('id_users',$sekretaris->id)->count();
                $totalsk2 = SuratKeluar::where('id_users',$kasipemerintahan->id)->count();
                $totalsk3 = SuratKeluar::where('id_users',$kasitrantip->id)->count();
                $totalsk4 = SuratKeluar::where('id_users',$kasipemberdayaan->id)->count();
                // surat keluar end

                // surat pelayanan start
                $todaysp = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysp1 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysp2 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysp3 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysp4 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->whereDate('tanggal_surat',Carbon::today())->count();

                $weeksp = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksp1 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksp2 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksp3 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksp4 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                
                
                $monthsp = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsp1 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsp2 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsp3 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsp4 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->whereMonth('tanggal_surat',Carbon::now())->count();

                $totalsp = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->count();
                $totalsp1 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->count();
                $totalsp2 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->count();
                $totalsp3 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->count();
                $totalsp4 = SuratPelayanan::whereNotIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->count();
                // surat pelayanan end

                // surat vital start
                $todaysv = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysv1 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysv2 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysv3 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->whereDate('tanggal_surat',Carbon::today())->count();
                $todaysv4 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->whereDate('tanggal_surat',Carbon::today())->count();

                $weeksv = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksv1 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksv2 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksv3 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                $weeksv4 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->where('tanggal_surat', '>', Carbon::now()->startOfWeek())->where('tanggal_surat', '<', Carbon::now()->endOfWeek())->count();
                
                
                $monthsv = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsv1 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsv2 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsv3 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->whereMonth('tanggal_surat',Carbon::now())->count();
                $monthsv4 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->whereMonth('tanggal_surat',Carbon::now())->count();

                $totalsv = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->count();
                $totalsv1 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$sekretaris->id)->count();
                $totalsv2 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemerintahan->id)->count();
                $totalsv3 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasitrantip->id)->count();
                $totalsv4 = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan'])->where('id_users',$kasipemberdayaan->id)->count();
                // surat vital end


                // $thisyearsm = SuratMasuk::whereYear('tanggal_terima_surat',Carbon::now()->format('Y'))->count();
                // $monthsmlast = $thisyearsm-$monthsm;
                // $monthsmlast = $thisyearsm;
                
                //surat keluar dashboard
                // $todaysk = SuratKeluar::whereDate('tanggal_surat',Carbon::today())->count();
                // $weeksk =    SuratKeluar::where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                // ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                // ->count();
                // $monthsk = SuratKeluar::whereMonth('tanggal_surat',Carbon::now())->count();
                // $thisyearsk = SuratKeluar::whereYear('tanggal_surat',Carbon::now()->format('Y'))->count();
                // $monthsklast = $thisyearsk-$monthsk;
                // $monthsklast = $thisyearsk;
                
                //surat pelayanan dashboard 2
                // $todaysp = SuratPelayanan::whereDate('tanggal_surat',Carbon::today())->count();
                // $weeksp =    SuratPelayanan::where('tanggal_surat', '>', Carbon::now()->startOfWeek())
                // ->where('tanggal_surat', '<', Carbon::now()->endOfWeek())
                // ->count();
                // $monthsp = SuratPelayanan::whereMonth('tanggal_surat',Carbon::now())->count();
                // $thisyearsp = SuratPelayanan::whereYear('tanggal_surat',Carbon::now()->format('Y'))->count();
                // $monthsplast = $thisyearsp-$monthsp;
                // $monthsplast = $thisyearsp;
                
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
                'todaysm1', 'todaysm2', 'todaysm3','todaysm4',
                'weeksm1', 'weeksm2', 'weeksm3','weeksm4',
                'monthsm1', 'monthsm2', 'monthsm3','monthsm4',
                'totalsm','totalsm1', 'totalsm2', 'totalsm3','totalsm4',

                'todaysk1', 'todaysk2', 'todaysk3','todaysk4',
                'weeksk1', 'weeksk2', 'weeksk3','weeksk4',
                'monthsk1', 'monthsk2', 'monthsk3','monthsk4',
                'totalsk','totalsk1', 'totalsk2', 'totalsk3','totalsk4',

                'todaysp1', 'todaysp2', 'todaysp3','todaysp4',
                'weeksp1', 'weeksp2', 'weeksp3','weeksp4',
                'monthsp1', 'monthsp2', 'monthsp3','monthsp4',
                'totalsp','totalsp1', 'totalsp2', 'totalsp3','totalsp4',

                'todaysv1', 'todaysv2', 'todaysv3','todaysv4',
                'weeksv1', 'weeksv2', 'weeksv3','weeksv4',
                'monthsv1', 'monthsv2', 'monthsv3','monthsv4',
                'totalsv','totalsv1', 'totalsv2', 'totalsv3','totalsv4',
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
