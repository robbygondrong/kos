<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Http\Requests\StoreHargaRequest;
use App\Http\Requests\UpdateHargaRequest;
use Illuminate\Http\Response;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.harga.index', [
            "title" => "Harga Kamar",
            "data" => Harga::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view(
            'backend.harga.create',
            [
                "title" => "Tambah Harga Kamar"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHargaRequest $request)
    {
        $request->validate(
            ['nominal' => 'required'],
            ['nominal.required' => 'Nominal Wajib di Isi']
        );
        $data = [
            'nominal' => $request->nominal
        ];
        Harga::create($data);
        return redirect()->to('/harga')->with('success', 'Tambah Harga Kamar Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function show(Harga $harga)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Update Harga Kamar',
            'data' => Harga::where('id_kamar', $id)->first()
        ];
        return view('backend.harga.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHargaRequest  $request
     * @param  \App\Models\Harga $harga
     * @return Response
     */
    public function update(UpdateHargaRequest $request, $id)
    {
        $request->validate(
            ['nominal' => 'required'],
            ['nominal.required' => 'Nominal Wajib di Isi']

        );

        $data = [
            'nominal' => $request->nominal,

        ];
        Harga::where('id_kamar', $id)->update($data);
        return redirect()->to('/harga')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Harga::where('id_kamar', $id)->delete();
        return redirect('harga')->with('success', 'Data Berhasil di Hapus');
    }
}
