<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class pasiencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pasien = DB::table('pasien')
        ->select('*')
        ->get();
        return view('pasien_0183', ['pasien' => $pasien]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tambahpasien_0183');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
     
        return redirect('pasien');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pasien = pasien::find($id);
        return view('editpasien_0183',['pasien' => $pasien]);
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
        //
        $pasien = pasien::find($id);
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        return redirect('pasien');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pasien = pasien::find($id);
        $pasien->delete();

        return redirect('pasien');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new pasienImport(), storage_path('app/public/excel/'.$nama_file));

        $pasien = DB::table('pasien');
        if($import) {
            //redirect
            //return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Diimport!']);
            //return view('0264_Tampil' , ['pasien' => $pasien]); 
            return redirect('/pasien');

        } else {
            //redirect
            //return redirect()->route('.index')->with(['error' => 'Data Gagal Diimport!']);
            //return view('0264_Tampil' , ['pasien' => $pasien]); 
            return redirect('/pasien');

        }
    }
}
