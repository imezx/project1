<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\SiswaModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    //
    public function viewSiswa($id)
    {
        try {
            $siswa = SiswaModel::find($id);
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Gagal menampilkan data siswa.");
        }
        return view("siswa.detail", compact('siswa'));
    }
    public function editSiswa($id)
    {
        try {
            $kelas = KelasModel::all();
            $siswa = SiswaModel::find($id);
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Gagal menampilkan data siswa untuk di edit.");
        }
        return view("siswa.edit", compact('siswa', 'kelas'));
    }
    public function createIndex()
    {
        $kelas = KelasModel::all();
        return view("siswa.add", compact('kelas'));
    }
    public function createSiswa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:siswa|string',
            'nisn' => 'required',
            'kelas' => 'required|integer',
        ], [
            "nama.required" => "Couldn't validate 'nama' field, Try again.",
            "nisn.required" => "Couldn't validate 'nisn' field, Try again.",
            "kelas.required" => "Couldn't validate 'nisn' field, Try again.",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with("error", $validator->errors()->first());
        }
        $siswa = new SiswaModel;
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->kelas_id = $request->kelas;
        $siswa->save();
        return redirect()->route("home.index")->with("success", $request->nama . " berhasil ditambah sebagai 'Siswa'.");
    }
    public function updateSiswa(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'kelas' => 'required|integer',
        ], [
            "nama.required" => "Couldn't validate 'nama' field, Try again.",
            "kelas.required" => "Couldn't validate 'nisn' field, Try again.",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with("error", $validator->errors()->first());
        }
        $siswa = SiswaModel::find($id);
        $siswa->nama = $request->nama;
        $siswa->kelas_id = $request->kelas;
        $siswa->save();
        return redirect()->route("siswa.detail", $siswa->id)->with("success", $request->nama . " berhasil diupdate.");
    }
    public function deleteSiswa($id)
    {
        try {
            SiswaModel::find($id)->delete();
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Gagal menghapus data siswa");
        }
        return redirect()->route("home.index")->with("success", "Data siswa berhasil dihapus.");
    }
}
