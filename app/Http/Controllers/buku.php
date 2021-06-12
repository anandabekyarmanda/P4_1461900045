<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class buku extends Controller
{
    public function index(){
        $buku = DB::table('buku') 
        -> join ('jenis_buku','buku.id','=','jenis_buku.id') 
        -> select ('buku.id','buku.judul','buku.tahun_terbit','jenis_buku.jenis')
        ->get();
        return view('tampilan0045',['buku'=> $buku]);
    }
    public function ekspor() 
    {
        return Excel::download(new UsersExport, 'Data_1461900045.xlsx');
    }
    
}
