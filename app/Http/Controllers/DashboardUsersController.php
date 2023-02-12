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

                "user" => DashboardUserModel::user()
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
        $data = [
            'nama' => $request->nama,
            'no_ktp' => $request->ktp,
            'email' => $request->email,
            'password' => $request->password,
            'telepon' => $request->telepon,
            'nama' => $request->nama,

        ];
        DashboardUserModel::create($data);
        return redirect('/penghuni');
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
    public function edit(DashboardUserModel $dashboardUserModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DashboardUserModel  $dashboardUserModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashboardUserModel $dashboardUserModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DashboardUserModel  $dashboardUserModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashboardUserModel $dashboardUserModel)
    {
        //
    }
}
