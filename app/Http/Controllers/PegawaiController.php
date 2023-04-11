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
    public function index() {

        $data_pegawai = PegawaiModel::all();
        return view('pegawai.pegawai')->with('data_pegawai', $data_pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pegawai.create_pegawai')->with('url_form', url('/pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'kode_pegawai' => 'required|string|max:10',
            'gambar' => 'required',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'jabatan' => 'required|max:50',
            'no_telp' => 'required|digits_between:6,13',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:50',
            'alamat' => 'required',

        ]);

        $data = PegawaiModel::create($request->all());

        if ( $request->hasFile('gambar') ) {

            // jika user menginputkan gambar, maka pindahkan gambar tersebut di sutau folder dengan nama aslis dari file gambasr tersebut
            $request->file('gambar')->move('foto_pegawai/', $request->file('gambar')->getClientOriginalName());

            // jika gamabr sudah berhasil didapatkan, ambil nama dari file gambar tersebut
            $data->gambar = $request->file('gambar')->getClientOriginalName();

            // lalu simpan gambarnya ke dalam database
            $data->save();
        }
        return redirect('/pegawai')->with('berhasil', 'Data Pegawai Berhasil Ditambahkan!');
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
    public function edit($id) {

        $data_pegawai = PegawaiModel::find($id);
        return view('pegawai.edit', ['data_pegawai' => $data_pegawai, 'url_form' => url('/pegawai/' . $id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request ->validate([
            'nama' => 'required|string|max:50',
            'kode_pegawai' => 'required|string|max:5',
            'gambar' => 'required',
            'jk' => 'required|in:l,p',
            'jabatan' => 'required|max:50',
            'no_telp' => 'required|digits_between:6,13',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:50',
            'alamat' => 'required',

        ]);

        // $data = FilmModel::where('id', $id)->update($request->except('_token', '_method'));
        $data = PegawaiModel::find($id);

        if ( $request->hasFile('gambar') ) {

            // jika user menginputkan gambar, maka pindahkan gambar tersebut di sutau folder dengan nama aslis dari file gambasr tersebut
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $file->move('foto_pegawai/', $extention);
            $data->gambar = $extention;
        }

        $data->update();
        return redirect('/pegawai')->with('berhasil', 'Data Pegawai Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        PegawaiModel::where('id', '=', $id)->delete();
        return redirect('pegawai')->with('succes', 'Data Pegawai Berhasil Dihapus!');

    }
}
