<?php

namespace App\Http\Controllers;

use App\Models\AbsensiModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    //
    public function precreateAbsensi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required|integer',
            'tanggal' => 'required|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with("error", $validator->errors()->first());
        }
        $siswa = SiswaModel::where("kelas_id", $request->kelas)->get();
        $tgl = $request->tanggal;
        return view("absensi.add", compact('siswa', 'tgl'));
    }
    public function createAbsensi(Request $request, $id)
    {
        if (!isset($id)) {
            return redirect()->route('home.index')->with("error", "Invalid request.");
        }
        $updated = 0;
        foreach ($request->except("_token") as $nama => $val) {
            $siswa = SiswaModel::firstWhere("nama", $nama);
            if ($val <= 0 || !$siswa) {
                continue;
            }
            try {
                $absensi = AbsensiModel::where("siswa_id", $siswa->id)->where("tgl", $id)->first();
                if ($absensi) {
                    if ($absensi->kehadiran_id == $val) {
                        continue;
                    }
                    $absensi->update([
                        "kehadiran_id" => "$val",
                    ]);
                    $updated++;
                } else {
                    $create = new AbsensiModel;
                    $create->siswa_id = $siswa->id;
                    $create->kehadiran_id = $val;
                    $create->tgl = $id;
                    $create->kelas_id = $siswa->kelas_id;
                    $create->save();
                    $updated++;
                }
            } catch (Exception) {
                continue;
            }
        }
        if ($updated == 0) {
            return redirect()->route("home.index")->with("warning", "No siswa updated.");
        }
        return redirect()->route("home.index")->with("success", "Updated #$updated siswa.");
    }
    public function precreateIndex()
    {
        $kelas = KelasModel::all();
        return view("absensi.pre", compact('kelas'));
    }
    public function createIndex()
    {
        return view("absensi.add");
    }
}
