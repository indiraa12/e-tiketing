<?php

namespace App\Http\Controllers;

use App\Models\Bandara;
use App\Models\Type;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class BandaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bandara::all();
        return view('admin.bandara.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        return view('admin.bandara.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['type_id'] = $request->type_id;
        Bandara::create($data);
        return redirect('/admin/bandara')->with('success', 'Tambah Data Sukses!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bandara  $bandara
     * @return \Illuminate\Http\Response
     */
    public function show(Bandara $bandara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bandara  $bandara
     * @return \Illuminate\Http\Response
     */
    public function edit(Bandara $bandara)
    {

        return view('admin.bandara.edit', compact('bandara', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bandara  $bandara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bandara $bandara)
    {
        $data = $request->all();
        $data['id'] = $request->id;
        $bandara->update($data);
        return redirect('/admin/bandara')->with('berhasil', 'Edit Data Sukses!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bandara  $bandara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bandara $bandara)
    {
        $bandara->delete();
        return redirect("/admin/bandara")->with(
            "hapus",
            "Hapus Data Sukses!!!"
        );
    }
}
