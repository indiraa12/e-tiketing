<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $data_pengguna = User::where("username", "LIKE", "%" . $request->search . "%")
                ->where("role_id", 2)
                ->get();
        } else {
            $data_pengguna = User::all()
                ->where("role_id", 2);
        }
        return view("admin.pengguna.index", compact("data_pengguna"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pengguna.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "username" => [
                "required",
                "min:3",
                "max:30",
                "unique:users,username",
            ],
            "password" => "required",
            "min:5",
            "mix:20",
            "name" => "required",
            "alamat_penumpang" => "required",
            "tgl_lahir" => "required",
            "jenis_kelamin" => "required",
            "telepon" => "required",
        ]);

        $pengguna = $request->all();
        $pengguna["password"] = bcrypt($pengguna["password"]);
        User::create($pengguna);
        return redirect("/admin/pengguna")->with(
            "success",
            "Tambah Data Sukses!!"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        // return view("admin.pengguna.edit", compact("pengguna"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        return view("admin.pengguna.edit", compact("pengguna"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            "username" => [
                "required",
                "min:3",
                "max:30",
                "unique:users,username," . $pengguna->id,
            ],
            "password" => "required",
            "min:5",
            "mix:20",
            "name" => "required",
            "alamat_penumpang" => "required",
            "tgl_lahir" => "required",
            "jenis_kelamin" => "required",
            "telepon" => "required",
        ]);
        $data = $request->all();
        if ($request->password) {
            $data["password"] = bcrypt($data["password"]);
        } else {
            unset($data["password"]);
        }
        $pengguna->update($data);
        return redirect("/admin/pengguna")->with(
            "berhasil",
            "Edit Data Sukses!!!"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return redirect("/admin/pengguna")->with(
            "hapus",
            "Hapus Data Sukses!!!"
        );
    }
}
