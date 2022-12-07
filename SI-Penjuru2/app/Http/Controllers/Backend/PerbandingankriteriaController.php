<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Perbandingankriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerbandingankriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = DB::table('admin')->join('users', 'admin.user_id', '=', 'users.id')->find(Auth::user()->id);
        $guru = DB::table('guru')->join('users', 'guru.user_id', '=', 'users.id')->find(Auth::user()->id);
        $wali = DB::table('wali')->join('users', 'wali.user_id', '=', 'users.id')->find(Auth::user()->id);
        $kriteria = Kriteria::all();
        $perbandingan = DB::table('kriteria')->get()->count();
        return view('backend/perhitungan.perbandingankriteria', compact('admin', 'guru', 'wali','kriteria','perbandingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kriteria1 = $request->input('tkriteria');
        $kriteria2 = $request->input('tkriteria2');
        foreach ($request->pkriteria as $key => $value) {
            $nilaiperbandingan = new Perbandingankriteria;
            if (isset($nilaiperbandingan->kriteria_pertama)) { 
                $nilaiperbandingan->kriteria_pertama = $kriteria1[$key];
            }
            $nilaiperbandingan->kriteria_pertama = $kriteria1[$key];
            $nilaiperbandingan->value = $value;
            $nilaiperbandingan->kriteria_kedua = $kriteria2[$key];
            $nilaiperbandingan->save();
        }
        return back();
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
    }
}
