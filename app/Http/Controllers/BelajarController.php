<?php

namespace App\Http\Controllers;

use App\Models\Count;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        return view('aritmatika');
    }

    public function tambah()
    {
        $title = "Tambah-tambahan";
        $jumlah = 0;
        $error = null;
        return view('tambah', compact('title', 'jumlah', 'error'));
        // return view('tambah', [$title, $jumlah]);
    }

    public function tambahAction(Request $request)
    {
        $request->validate(
            [
                'angka1' => 'required',
                'angka2' => 'required'
            ]
        );
        // $_POST
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $error = null;
        $jumlah = null;

        if (!is_numeric($angka1) || !is_numeric($angka2)) {
            $error = "Data Harus Numeric";
        } else {
            $jumlah = $angka1  + $angka2;
        }

        // INSERT INTO counts (jenis, angka1, angka2, hasil) VALUES ()
        if ($error == null) {
            Count::create([
                'jenis' => $request->jenis,
                'angka1' => $angka1,
                'angka2' => $angka2,
                'hasil' => $jumlah
            ]);
        }

        // return redirect()->route('')->with('status', "Berhasil Simpan");
        return view('tambah', compact('jumlah', 'error'));
    }

    public function viewHitungan()
    {
        //SELECT * FROM counts;
        $counts = Count::all();

        return view('data-hitungan', compact('counts'));
    }

    public function editDataHitung(string $jenis, string $id)
    {
        $title = "Edit Penambahan";
        $error = null;
        $jumlah = null;
        

        return view('tambah.edit', compact('title', 'error', 'jumlah'));
    }

    public function update($name)
    {
        return "Selamat datang $name";
    }

    public function nuall()
    {
        return "Nuall";
    }
}
