<?php

namespace App\Http\Controllers\masterdatasurat\suratpelayanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SuratPelayanan;
use Auth;

class SuratvitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        try {
            if($user->role == 'supervisor' && $user->jabatan == 'Kasi Pemerintahan & PP') {
                $data = SuratPelayanan::where('id_users',$user->id)
                ->whereIn('nama_jenis_surat_pelayanan',['Surat Keterangan Pertanahan','Surat Keterangan Lainnya'])
                ->get();
            } else if($user->role == 'supervisor' && $user->jabatan == 'Kasi Pemberdayaan Masyarakat') {
                $data = SuratPelayanan::where('id_users',$user->id)
                ->whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Lainnya'])
                ->get();
            } else {
                $data = SuratPelayanan::whereIn('nama_jenis_surat_pelayanan',['Surat Pernyataan Ahli Waris','Surat Keterangan Cerai Ghaib','Surat Keterangan Pertanahan','Surat Keterangan Lainnya'])
                ->with('users')
                ->get();
            }

            return response()->json(['status' => "show", "message" => "Menampilkan Data" , 'data' => $data]);

        } catch (\Exception $e){

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $date = $request->tanggal_surat;
        $ttl = $request->tanggal_lahir;
        $fixed = date('Y-m-d', strtotime(substr($date,0,10)));
        $fixed_ttl = date('Y-m-d', strtotime(substr($ttl,0,10)));

        $requestData = $request->all();
        if($date) {
            $requestData['tanggal_surat'] = $fixed;
        }
        if($ttl) {
           $requestData['tanggal_lahir'] = $fixed_ttl; 
        }
        $requestData['id_users'] = $user->id;
        
        try {
            SuratPelayanan::create($requestData);

            return response()->json(["status" => "success", "message" => "Berhasil Menambahkan Data"]);

        } catch (\Exception $e){

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages/masterdata/masterdatasurat/suratpelayanan/suratvital');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = $request->tanggal_surat;
        $ttl = $request->tanggal_lahir;
        $fixed = date('Y-m-d', strtotime(substr($date,0,10)));
        $fixed_ttl = date('Y-m-d', strtotime(substr($ttl,0,10)));

        $requestData = $request->all();
        if($date) {
            $requestData['tanggal_surat'] = $fixed;
        }
        if($ttl) {
           $requestData['tanggal_lahir'] = $fixed_ttl; 
        }
        
        try {
            $data = SuratPelayanan::findOrFail($id);
            $data->update($requestData);

            return response()->json(["status" => "success", "message" => "Berhasil Ubah Data"]);

        } catch (\Exception $e){

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = SuratPelayanan::where('id_surat_pelayanan',$id)->delete();

            return response()->json(["status" => "success", "message" => "Berhasil Hapus Data"]);

        } catch (\Exception $e){

            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
}
