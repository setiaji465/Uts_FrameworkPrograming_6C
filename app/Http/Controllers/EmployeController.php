<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\List_;

class EmployeController extends Controller
{
    public function list()
    {
        $hasil = DB::select('select * from employe');
        return view('list-pegawai', ['data' => $hasil]);
    }
    public function simpan(Request $req)
    {
        DB::insert(
            'insert into employe (nip,nama, alamat) values (?, ?, ?)',
            [$req->nip, $req->nama, $req->alamat]
        );
        $hasil = DB::select('select * from employe');
        return view('list-pegawai', ['data' => $hasil]);
    }
    public function hapus($req)
    {
        Log::info('proses hapus dengan id=' . $req);
        DB::delete('delete from employe where id = ?', [$req]);

        $hasil = DB::select('select * from employe');
        return view('list-pegawai', ['data' => $hasil]);
    }
    public function ubah($req)
    {
        $hasil = DB::select('select * from employe where id = ?', [$req]);
        return view('form-ubah', ['data' => $hasil]);
    }
    public function rubah(Request $req)
    {
        Log::info('Hallo');
        Log::info($req);
        DB::update(
            'update employe set ' .
                'nip=?, ' .
                'nama=?, ' .
                'alamat=? where id=? ',
            [
                $req->nip,
                $req->nama,
                $req->alamat,
                $req->id
            ]
        );
        $hasil = DB::select('select * from employe');
        return view('list-pegawai', ['data' => $hasil]);
    }
}

