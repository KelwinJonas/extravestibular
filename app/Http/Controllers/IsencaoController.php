<?php

namespace extravestibular\Http\Controllers;

use extravestibular\Isencao;
use Illuminate\Http\Request;
use extravestibular\User;
use Auth;

class IsencaoController extends Controller
{
  public function cadastroIsencao(Request $request){
    Isencao::create([
      'usuarioId'                        => Auth::user()->id,
      'editalId'                         => $request->editalId,
      'tipo'                             => $request->tipo,
      'historicoEscolar'
      'nomeDadoEconomico'                => $request->nomeDadoEconomico,
      'cpfDadoEconomico'                 => $request->cpfDadoEconomico,
      'parentescoDadoEconomico'          => $request->parentescoDadoEconomico,
      'rendaDadoEconomico'               => $request->rendaDadoEconomico,
      'fontePagadoraDadoEconomico'       => $request->fontePagadoraDadoEconomico,
      'nomeNucleoFamiliar'               => $request->nomeNucleoFamiliar,
      'cpfNucleoFamiliar'                => $request->cpfNucleoFamiliar,
      'parentescoNucleoFamiliar'         => $request->parentescoNucleoFamiliar,
      'rendaNucleoFamiliar'              => $request->rendaNucleoFamiliar,
      'fontePagadoraNucleoFamiliar'      => $request->fontePagadoraNucleoFamiliar,
      'nomeNucleoFamiliar1'              => $request->nomeNucleoFamiliar1,
      'cpfNucleoFamiliar1'               => $request->cpfNucleoFamiliar1,
      'parentescoNucleoFamiliar1'        => $request->parentescoNucleoFamiliar1,
      'rendaNucleoFamiliar1'             => $request->rendaNucleoFamiliar1,
      'fontePagadoraNucleoFamiliar1'     => $request->fontePagadoraNucleoFamiliar1,
      'parecer'                          => 'nao',

    ]);
    return redirect()->route('home')->with('jsAlert', 'Isenção requerida com sucesso.');
  }

  public function isencaoEscolhida(Request $request){
    $isencao = Isencao::find($request->isencaoId);
    return view('homologarIsencao', ['isencao' => $isencao]);
  }

  public function homologarIsencao(Request $request){
    $isencao = Isencao::find($request->isencaoId);
    $isencao->parecer = $request->resultado;
    $isencao->save();
    return redirect()->route('home')->with('jsAlert', 'Isenção homologada com sucesso.');

  }

}
