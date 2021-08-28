<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagas;
use App\Models\Candidaturas;
use App\Models\Pessoas;

class Vaga extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vagas.cadastro');
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
            'empresa' => 'required',
            'titulo' => 'required',
            'localizacao' => 'required',
            'nivel' => 'required',
            'descricao' => 'required',
        ]);
        
        Vagas::create([
            "empresa" => $request->empresa,
            "titulo" => $request->titulo,
            "localizacao" => $request->localizacao,
            "nivel" => $request->nivel,
            "descricao" => $request->descricao
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Candidaturas
        $candidaturas = Candidaturas::select('id_vaga')->distinct()->get();
        $vagas_id = [];
        foreach ($candidaturas as $candidatura){
            array_push($vagas_id, $candidatura->id_vaga);
        }
        $vagas = Vagas::find($vagas_id);

        $candidatura_pessoa = Candidaturas::where('id_vaga',$id)
            ->select('pessoas.*','candidaturas.score')
            ->join('pessoas', 'pessoas.id', '=', 'candidaturas.id_pessoa')
            ->orderByDesc('score')
            ->get();

        return view('vagas.mostrar', ['candidatura_pessoa' => $candidatura_pessoa, 'vagas'=> $vagas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
