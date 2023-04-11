<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = PegawaiModel::all();
        return view('pegawai.pegawai')
                        ->with('pegawai',$pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create_pegawai')
        ->with('url_form',url('/pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nama' => 'required|string|max:50',
            'id_pegawai' => 'required|string|max:5',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,13',

        ]);

        $data = PegawaiModel::create($request->except(['_token']));
        return redirect('pegawai')
            ->with('success','pegawai berhasil ditambhakan');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(PegawaiModel $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai =PegawaiModel::find($id);
        return view('pegawai.create')
                    ->with('pegawai',$pegawai)
                    ->with('url_form',url('/pegawai/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request ->validate([
            'nama'=> 'required|string|max:50',
            'id_pegawai'=> 'required|string|max:10|unique:pegawai,nim,'.$id,
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,13',

        ]);

        $data = PegawaiModel::where('id', '=', $id)->update($request->except(['token','_method']));
        return redirect('pegawai')
            ->with('success','pegawai berhasil ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(PegawaiModel $pegawai)
    {
        PegawaiModel::where('id', '=', $id)->delete();
        return redirect('pegawai')
        ->with('succes', 'pegawai berhasil ditambhkan ');
    }
}
