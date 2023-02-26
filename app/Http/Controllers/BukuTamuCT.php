<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BukuTamu;

use Illuminate\Support\Str;
use Carbon\Carbon;

class BukuTamuCT extends Controller
{
    public function GetBukuTamu(Request $req, String $wedding_code)
    {
        return BukuTamu::where('wedding_code', $wedding_code)->orderBy('created_at', 'DESC')->paginate();
    }
    
    public function InsertBukuTamu(Request $req)
    {
        $validated = $req->validate([
            "name" => 'required',
            "pesan" => 'required',
            "status_kehadiran" => 'required',
            "name_params" => 'required',
            "wedding_code" => 'required',
        ]);
        try {
            $body = $req->all();
            $body["buku_tamu_id"] = Str::uuid();
            $body["created_at"] = Carbon::now('Asia/Jakarta');
            BukuTamu::insert($body);
            return response()->json([
                "state" => true,
                "message" => "Pesan berhasil di simpan",
                "data" => $body,
            ], 200);
        } catch (\Throwable $th) {
        dd($th);
            return response()->json([
                "state" => false,
                "message" => "Pesan Gagal di simpan",
                "err" => $th->getMessage(),
            ], 500);
        }
    }
}
