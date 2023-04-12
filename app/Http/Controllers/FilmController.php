<?php

namespace App\Http\Controllers;

use App\Models\FilmModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // method ini berguna untu menampilkan data film yang sudah terinputkan
        // ambil semua data yang tersimpan di database
        $data_film = FilmModel::all();
        return view('film.film')->with('data_film', $data_film);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('film.create_film')->with('url_form', url('/film'));
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
            'kode_film' => 'required|string|max:5|unique:film,kode_film',
            'gambar' => 'required',
            'nama' => 'required|string|max:50',
            'tgl_tayang' => 'required|date',
            'jml_tayang' => 'required',
            'rating' => 'required',
            'harga' => 'required'
        ]);

        $data = FilmModel::create($request->all());

        if ( $request->hasFile('gambar') ) {

            // jika user menginputkan gambar, maka pindahkan gambar tersebut di sutau folder dengan nama aslis dari file gambasr tersebut
            $request->file('gambar')->move('foto_film/', $request->file('gambar')->getClientOriginalName());

            // jika gamabr sudah berhasil didapatkan, ambil nama dari file gambar tersebut
            $data->gambar = $request->file('gambar')->getClientOriginalName();

            // lalu simpan gambarnya ke dalam database
            $data->save();
        }
        return redirect('/film')->with('berhasil', 'Data Film Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(FilmModel $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {

        $data_film = FilmModel::find($id);
        return view('film.edit', ['data_film' => $data_film, 'url_form' => url('/film/' . $id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request->validate([
            'kode_film' => 'required|string|max:5|unique:film,kode_film,' . $id,
            'gambar' => 'required',
            'nama' => 'required|string|max:50',
            'tgl_tayang' => 'required|date',
            'jml_tayang' => 'required',
            'rating' => 'required',
            'harga' => 'required'
        ]);

        // $data = FilmModel::where('id', $id)->update($request->except('_token', '_method'));
        $data = FilmModel::find($id);

        if ( $request->hasFile('gambar') ) {

            // jika user menginputkan gambar, maka pindahkan gambar tersebut di sutau folder dengan nama aslis dari file gambasr tersebut
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalName();
            $file->move('foto_film/', $extention);
            $data->gambar = $extention;
        }

        $data->update();
        return redirect('/film')->with('berhasil', 'Data Film Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        FilmModel::where('id', $id)->delete();
        return redirect('/film')->with('berhasil', 'Data Film Berhasil Dihapus!');
    }
}
