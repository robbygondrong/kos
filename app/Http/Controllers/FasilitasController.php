<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Http\Requests\StoreFasilitasRequest;
use App\Http\Requests\UpdateFasilitasRequest;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Fasilitas Kamar';
        $data = Fasilitas::all();
        return view('backend.fasilitas.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Fasilitas';

        return view('backend.fasilitas.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFasilitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFasilitasRequest $request)
    {
        $request->validate(
            [
                'nama_fasilitas' => 'required',

            ],
            [

                'nama_fasilitas.required' => 'Nama Fasilitas Wajib di pilih',

            ]
        );

        $data = [
            'nama_fasilitas' =>  $request->nama_fasilitas,

        ];
        Fasilitas::create($data);
        return redirect()->to('/fasilitas')->with('success', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Update Data Users',
            'data' => Fasilitas::where('id_fasilitas', $id)->first()
        ];
        return view('backend.fasilitas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasRequest  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFasilitasRequest $request, $id_fasilitas)
    {
        $request->validate(
            [
                'nama_fasilitas' => 'required',

            ],
            [

                'nama_fasilitas.required' => 'Nama Fasilitas Wajib di pilih',

            ]
        );


        $data = [
            'nama_fasilitas' =>  $request->nama_fasilitas,

        ];
        Fasilitas::where('id_fasilitas', $id_fasilitas)->update($data);
        return redirect()->to('/fasilitas')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        Fasilitas::where('id_fasilitas', $fasilitas)->delete();
        return redirect('fasilitas')->with('success', 'Data Berhasil di Hapus');
    }
}
