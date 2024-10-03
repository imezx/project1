<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    use HasFactory;

    protected $table = "siswa";

    public function getKelas()
    {
        return $this->belongsTo(KelasModel::class, "kelas_id");
    }
    public function getAbsensi()
    {
        return $this->hasMany(AbsensiModel::class, "siswa_id");
    }
    public function getTotalKehadiran()
    {
        $total = $this->getAbsensi->count();
        if ($total == 0) {
            return "-";
        }
        $hadir = $this->getAbsensi->count();
        return $hadir;
    }
    public function getTotalKehadiranPersentase()
    {
        $total = $this->getAbsensi->count();
        if ($total == 0) {
            return "-";
        }
        $hadir = $this->getAllExcept(4);
        return round(($hadir / $total) * 100, 2) . "%";
    }
    public function getTotalBy($id)
    {
        $total = $this->getAbsensi->count();
        if ($total == 0) {
            return "-";
        }
        $hadir = $this->getAbsensi->where("kehadiran_id", "=", "$id")->count();
        return $hadir;
    }
    public function getAllExcept($id)
    {
        $total = $this->getAbsensi->count();
        if ($total == 0) {
            return "-";
        }
        $hadir = $this->getAbsensi->where("kehadiran_id", "!=", "$id")->count();
        return $hadir;
    }
    public function getByDate($date)
    {
        $total = $this->getAbsensi->count();
        if ($total == 0) {
            return null;
        }
        return $this->getAbsensi->firstWhere("tgl", "=", "$date");
    }
}
