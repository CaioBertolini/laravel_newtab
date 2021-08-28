<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidaturas;
use App\Models\Pessoas;
use App\Models\Vagas;
use Symfony\Component\ErrorHandler\Debug;

use function Psy\debug;

class Candidatura extends Controller
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
        $vagas = Vagas::all();
        $pessoas = Pessoas::all();
        return view('candidaturas.cadastro', ['vagas' => $vagas, 'pessoas' => $pessoas]);
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
            'id_vaga' => 'required',
            'id_pessoa' => 'required',
        ]);

        $distancias = [
            "AB" => 5,
            "AC" => 12,
            "AD" => 7,
            "AE" => 16,
            "AF" => 16,
            "BC" => 7,
            "BD" => 3,
            "BE" => 11,
            "BF" => 11,
            "CD" => 10,
            "CE" => 4,
            "CF" => 18,
            "DE" => 10,
            "DF" => 8
        ];

        $pessoa_candidatura = Pessoas::find($request->id_pessoa);
        $vagas_candidatura = Vagas::find($request->id_vaga);

        $loc_vaga = $vagas_candidatura->localizacao;
        $niv_vaga = $vagas_candidatura->nivel;
        $loc_pessoa = $pessoa_candidatura->localizacao;
        $niv_pessoa = $pessoa_candidatura->nivel;
        
        $niv = $niv_vaga - $niv_pessoa;
        $N = 100 - 25 * abs($niv);

        if ($loc_vaga == $loc_pessoa){
            $D = 0;
        } else {
            $letras_dist = [$loc_vaga,$loc_pessoa];
            sort($letras_dist);
            $jun_letras = $letras_dist[0].$letras_dist[1];
            $d = $distancias[$jun_letras];
            if ($d <= 5){
                $D = 100;
            } else if ($d <= 10){
                $D = 75;
            } else if ($d <= 15){
                $D = 50;
            } else if ($d <= 20){
                $D = 25;
            } else {
                $D = 0;
            }
        };

        $score = floatval(($N + $D)/2);
        
        Candidaturas::create([
            "id_vaga" => $request->id_vaga,
            "id_pessoa" => $request->id_pessoa,
            "score" => $score,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $candidaturas = Candidaturas::select('id_vaga')->distinct()->get();
        $vagas_id = [];
        foreach ($candidaturas as $candidatura){
            array_push($vagas_id, $candidatura->id_vaga);
        }
        $vagas = Vagas::find($vagas_id);
        return view('candidaturas.mostrar', ['vagas'=> $vagas]);
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
