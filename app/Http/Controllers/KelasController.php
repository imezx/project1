<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    //
    public function viewKelas($id)
    {
        try {
            $kelas = KelasModel::find($id);
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Gagal menampilkan data kelas.");
        }
        return view("kelas.detail", compact('kelas'));
    }
    public function createIndex()
    {
        return view("kelas.add");
    }
    public function createKelas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:kelas|string'
        ], [
            "nama.required" => "Couldn't validate 'nama' field, Try again."
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with("error", $validator->errors()->first());
        }
        $kelas = new KelasModel;
        $kelas->nama = $request->nama;
        $kelas->save();
        return redirect()->route("home.index")->with("success", $request->nama . " berhasil ditambah sebagai 'Kelas'.");
    }
    public function deleteKelas($id)
    {
        try {
            KelasModel::find($id)->delete();
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Gagal menghapus data kelas");
        }
        return redirect()->route("home.index")->with("success", "Data kelas berhasil dihapus.");
    }
}
