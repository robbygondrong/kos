<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardUsersController;
use App\Models\DashboardUserModel;

class PenghuniController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penghuni::with('user')->get();
        return view('backend.penghuni.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'backend.penghuni.create',
            [
                "title" => "Tambah Data User",
                "data" => DashboardUserModel::where('level', '=', 0)->get()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required',

            ],
            [

                'user_id.required' => 'User Wajib di pilih',

            ]
        );

        $data = [
            'user_id' =>  $request->user_id,

        ];
        Penghuni::create($data);
        return redirect()->to('/penghuni')->with('success', 'Berhasil Tambah Data');
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

        $data = [
            'title' => 'Update Data Users',
            'data' => Penghuni::where('id_penghuni', $id)->first(),
            'user' => DashboardUserModel::where('level', '=', 0)->get()
        ];
        return view('backend.penghuni.edit', $data);
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
        $request->validate(
            [
                'user_id' => 'required',

            ],
            [

                'user_id.required' => 'user_id Wajib di Pilih',

            ]
        );

        $data = [
            'user_id' => $request->user_id,
        ];
        Penghuni::where('id_penghuni', $id)->update($data);
        return redirect()->to('/penghuni')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penghuni::where('id_penghuni', $id)->delete();
        return redirect('penghuni')->with('success', 'Data Berhasil di Hapus');
    }
}
