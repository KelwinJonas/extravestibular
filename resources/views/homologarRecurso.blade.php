@extends('layouts.app')
@section('titulo','Homologar Recurso')
@section('navbar')
    <!-- Home / Detalhes do edital / Homologar Recurso / {{$recurso->cpfEdital}} -->
    <li class="nav-item active">
      <a class="nav-link" style="color: black" href="{{ route('home') }}"
         onclick="event.preventDefault();
                       document.getElementById('VerEditais').submit();">
         {{ __('Home') }}
      </a>
      <form id="VerEditais" action="{{ route('home') }}" method="GET" style="display: none;">

      </form>
    </li>
    <li class="nav-item active">
      <a class="nav-link">/</a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="detalhes" style="color: black" onclick="event.preventDefault(); document.getElementById('detalhesEdital').submit();" >
        {{ __('Detalhes do Edital')}}
      </a>
      @if(Auth::check())
        <form id="detalhesEdital" action="{{route('detalhesEdital')}}" method="GET" style="display: none;">
      @else
        <form id="detalhesEdital" action="{{route('detalhesEditalServidor')}}" method="GET" style="display: none;">
      @endif
          <input type="hidden" name="editalId" value="{{$editalId}}">
          <input type="hidden" name="mytime" value="{{$mytime}}">

        </form>
    </li>
    <li class="nav-item active">
      <a class="nav-link">/</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" style="color: black" href="classificar"
         onclick="event.preventDefault();
                       document.getElementById('classificar').submit();">
         {{ __('Homologar Recurso') }}
      </a>
      <form id="classificar" method="GET" action="{{route('editalEscolhido')}}">
          <input type="hidden" name="editalId" value="{{$editalId}}">
          <input type="hidden" name="tipo" value="homologarRecursos">
      </form>
    </li>
    <li class="nav-item active">
      <a class="nav-link">/</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link">{{$recurso->user->dadosUsuario->cpf}}</a>
    </li>
@endsection
@section('content')
<style>
  .card{
    width: 100%;
  }
  #label{
    margin-left: -23%;
  }
  #paragrafo{
    margin-left: 1%;
    margin-right: 1%;
  }

  @media screen and (max-width:576px){
    #label{

      margin-left: 0%;
    }
    #paragrafo{
    margin-left: -8%;
    margin-right: -5%;
  }

  }
</style>
<div class="container">
  <form method="POST" action="{{ route('homologarRecurso') }}" enctype="multipart/form-data" id="formHomologacao">
    @csrf
      <div class="row justify-content-center">
        <div class="card">
          <div class="card-header">{{ __('Avaliar recurso') }}</div>
          <div class="card-body">
            {{-- row --}}
            <div class="row justify-content-center" id="paragrafo">
              <div class="col-sm-12">
                  <p>
                    <h3 style="text-align:justify;text-justify:inter-word">


                      À Preg,
                      <br><br>
                      Eu, <strong>{{$recurso->user->dadosUsuario->nome}}</strong>, CPF <strong>{{$recurso->user->dadosUsuario->cpf}}</strong>,
                      interponho recurso ao resultado
                      <strong>
                        @if($recurso->tipo == 'taxa')
                          da solicitação de Isenção da Taxa de Inscrição
                        @elseif($recurso->tipo == 'resultado')
                          da seleção para ingresso extra para UFAPE <strong>{{$recurso->curso}}</strong>
                        @else
                          da seleção para ingresso extra para UFAPE <strong>{{$recurso->curso}}</strong>
                        @endif

                      </strong>
                      do edital <strong><?php
                        $nomeEdital = explode(".pdf", $recurso->edital->nome);
                        echo ($nomeEdital[0]);
                       ?></strong>,
                      pelos seguintes motivos: <br><br><strong>{{$recurso->motivo}}</strong>.

                    </h3>
                  </p>


                  {{-- aprovado rejeitado --}}
                  <div class="row justify-content-center">

                      <input onclick="selectCheck('aprovado')" type="radio" name="radioRecurso" value="aprovado"> <h4 style="margin-left:1%">Aceito</h4>

                      <input id="radioIndeferida" @error('motivoRejeicao') checked @enderror style="margin-left:1%" onclick="selectCheck('rejeitado')" type="radio" name="radioRecurso" value="rejeitado"> <h4 style="margin-left:1%">Rejeitado</h4>
                  </div>


                  <div class="form-group" id="motivoRejeicao" style=" display: none;">

                    <label for="motivoRejeicao" class="col-md-4 col-form-label text-md-right"  id="label">{{ __('Justificativa:') }}</label>


                    <div class="col-md-12">
                      <textarea class=" form-control @error('motivoRejeicao') is-invalid @enderror" form ="formHomologacao" name="motivoRejeicao" id="taid" style="width:100%" ></textarea>
                      @error('motivoRejeicao')
                      <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror

                    </div>
                  </div>
                </div>
            </div>{{-- end row --}}


        </div><!-- end card-body-->
      </div><!-- end card-->

      <div class="row justify-content-center" style="margin-top:20px">
          <input type="hidden" name="recursoId" value="{{$recurso->id}}">
          <button id="buttonFinalizar" onclick="event.preventDefault();confirmar();" class="btn  btn-primary btn-primary-lmts" >
            {{ __('Finalizar') }}
          </button>
      </div>
    </form>
  </div>



<script type="text/javascript" >

function confirmar(){
      if(confirm("Tem certeza que deseja finalizar?") == true) {
        document.getElementById("formHomologacao").submit();
     }
    }

function selectCheck(x){
  if(x == 'rejeitado'){
    document.getElementById("motivoRejeicao").style.display = ''
  }
  if(x == 'aprovado'){
    document.getElementById("motivoRejeicao").style.display = 'none'
  }
}
function checkIndeferido(){
  if(document.getElementById("radioIndeferida").checked == true){
    document.getElementById("motivoRejeicao").style.display = ''

  }
}

checkIndeferido();
</script>
@endsection
