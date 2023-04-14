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
    public function index(Request $request) {

        if ( $request->has('search')) { // jika request menangkap request berupa 'search'
            $data_film = FilmModel::where('nama', 'LIKE', '%' .$request->search. '%')->paginate(3);
        } else {
            $data_film = FilmModel::paginate(3);
        }

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

            $request->file('gambar')->move('foto_film/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('/film')->withSuccess('Data Film Berhasil Ditambahkan!');
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

        $data->nama = $request->nama;
        $data->tgl_tayang = $request->tgl_tayang;
        $data->jml_tayang = $request->jml_tayang;
        $data->rating = $request->rating;
        $data->harga = $request->harga;

        $data->update();
        return redirect('/film')->withSuccess('Data Film Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        FilmModel::where('id', $id)->delete();
        return redirect('/film')->withSuccess('Data Film Berhasil Dihapus');
    }
}
