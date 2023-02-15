<?php

namespace App\Http\Controllers;

use App\Models\DashboardUserModel;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'backend.user.index',
            [
                "title" => "Users",

                "user" => DashboardUserModel::All()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create', [
            "title" => "Tambah Data User"
        ]);
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
                'nama' => 'required',
                'ktp' => 'required|min:16|max:16',

                'telepon' => 'required|numeric',
                'email' => 'required|email',
                'level' => 'required|numeric',
                'password' => 'required'
            ],
            [
                'nama.required' => 'Nama Wajib di Isi',
                'ktp.required' => 'KTP Wajib di Isi',
                'ktp.min' => "KTP minimal 16 karakter",
                'ktp.max' => ' KTP maximal 16 karakter',
                'telepon.required' => 'Telepon Wajib di Isi',
                'telepon.numeric' => 'Telepon Wajib diisi Angka',
                'email.required' => 'Email Wajib di Isi',
                'email.email' => 'Format Email yang dituliskan salah',
                'level.required' => 'Level Wajib diisi',
                'level.numeric' => ' Level Hanya angka yang bisa diisi'
            ]
        );
        $data = [
            'nama' => $request->nama,
            'no_ktp' => $request->ktp,
            'email' => $request->email,
            'password' => $request->password,
            'telepon' => $request->telepon,
            'level' => $request->level,

        ];
        DashboardUserModel::create($data);
        return redirect()->to('/user')->with('success', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DashboardUserModel  $dashboardUserModel
     * @return \Illuminate\Http\Response
     */
    public function show(DashboardUserModel $dashboardUserModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DashboardUserModel  $dashboardUserModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Update Data Users',
            'data' => DashboardUserModel::where('id_user', $id)->first()
        ];
        return view('backend.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DashboardUserModel  $dashboardUserModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {

        $request->validate(
            [
                'nama' => 'required',
                'ktp' => 'required|min:16|max:16',

                'telepon' => 'required|numeric',
                'email' => 'required|email',
                'level' => 'required|numeric',
                'password' => 'required'
            ],
            [
                'nama.required' => 'Nama Wajib di Isi',
                'ktp.required' => 'KTP Wajib di Isi',
                'ktp.min' => "KTP minimal 16 karakter",
                'ktp.max' => ' KTP maximal 16 karakter',
                'telepon.required' => 'Telepon Wajib di Isi',
                'telepon.numeric' => 'Telepon Wajib diisi Angka',
                'email.required' => 'Email Wajib di Isi',
                'email.email' => 'Format Email yang dituliskan salah',
                'level.required' => 'Level Wajib diisi',
                'level.numeric' => ' Level Hanya angka yang bisa diisi'
            ]
        );
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'level' => $request->level,
            'password' => $request->password,
        ];
        DashboardUserModel::where('id_user', $id_user)->update($data);
        return redirect()->to('/user')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DashboardUserModel  $dashboardUserModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DashboardUserModel::where('id_user', $id)->delete();
        return redirect('user')->with('success', 'Data Berhasil di Hapus');
    }
}
