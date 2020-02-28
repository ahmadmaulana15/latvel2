<?php

namespace App\Http\Controllers;

use App\Wali;
use Illuminate\Http\Request;
use App\Mahasiswa;
class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wali = Wali::with('mahasiswa')->get();
        return view('wali.index',compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = Mahasiswa::all();
        return view('wali.create',compact('mhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wali = new Wali();
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index')->with(['message'=>'Data Berhasil Di Buat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = Mahasiswa::get();
        $wali = Wali::findOrFail($id);
        return view('wali.show',compact('mhs','wali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Mahasiswa::all();
        $wali = Wali::findOrFail($id);
        return view('wali.edit',compact('mhs','wali'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wali =  Wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index')->with(['message'=>'Data Berhasil Di Buat']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wali = Wali::findOrFail($id)->delete();
        return redirect()->route('wali.index')->with(['message'=>'data berhasil dihapus']);
    }
}
