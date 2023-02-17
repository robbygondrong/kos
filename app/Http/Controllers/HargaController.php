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
    public function edit(Harga $harga)
    {

        return view('backend.harga.edit', [
            'harga' => $harga,
            'title' => 'Update data title'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHargaRequest  $request
     * @param  \App\Models\Harga $harga
     * @return Response
     */
    public function update(UpdateHargaRequest $request, Harga $harga)
    {
        $title = 'Update Harga Kamar';
        $request->validate(
            ['nominal' => 'required'],
            ['nominal.required' => 'Nominal Wajib di Isi']

        );


        $data = [
            'nominal' => $request->nominal,

        ];

        Harga::where('id_harga', $harga->id_harga)->update($data);
        return redirect()->to('/harga',)->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function destroy(harga $harga)
    {
        Harga::destroy($harga->id_harga);
        return redirect('harga')->with('success', 'Data Berhasil di Hapus');
    }
}
