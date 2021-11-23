@extends('layouts.app')
@section('titulo','Novo Edital')
@section('navbar')
    <!-- Home / Novo Edital -->
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
      <a class="nav-link" >
        {{ __('Novo Edital')}}
      </a>

    </li>
@endsection
@section('content')
<style media="screen">
  /* #checkPublicarEdital{
    margin-left:16%;
  } */
  .checkbox{
    display: table;
  }
  @media screen and (max-width: 576px){
    #checkPublicarEdital{
      margin-left: 0;
    }
  }
</style>

<div class="container">
  <form id="formCadastro" method="POST" action="{{ route('cadastroEditarEdital') }}" enctype="multipart/form-data">
    @csrf
    <!-- row card arquivo -->
    <div class="row justify-content-center">
      <!-- card arquivo -->
      <div class="card" style="width:100%">
        <div class="card-header">
          Arquivo
        </div>
        <!-- card body -->
        <div class="card-body">
          <!-- row nome -->
          <div class="row justify-content-center">
            <!-- nome -->
            <div class="col-sm-9">
              <label for="nome" class="field a-field a-field_a2 page__field" style="width: 100%;">
                <span class="a-field__label-wrap">
                  <span class="a-field__label">Nome do edital*</span>
                </span>
                  <input value="<?php
                    $nomeEdital = explode(".pdf", $edital->nome);
                    echo ($nomeEdital[0]);
                   ?>"  id="nome" disabled type="text" name="nome" autofocus class="form-control @error('nome') is-invalid @enderror field__input a-field__input" placeholder="Nome do edital*">
              </label>
              @error('nome')
              <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div><!-- end nome -->
          </div><!-- end row nome -->

          <!-- row descricao -->
          <div class="row justify-content-center">
            <!-- descricao -->
            <div class="col-sm-9">
              <label for="descricao" class="field a-field a-field_a2 page__field" style="width: 100%;">
                <span class="a-field__label-wrap">
                  <span class="a-field__label">Descrição do edital*</span>
                </span>
                <textarea class="form-control @error('descricao') is-invalid @enderror" form="formCadastro" name="descricao" id="taid" style="width:100%" >{{ old('descricao', $edital->descricao) }}</textarea>
              </label>
              @error('descricao')
              <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div><!-- end descricao -->
          </div><!-- end row descricao -->

          <!-- row input file -->
          <div class="row justify-content-center">
            <div class="col-sm-3"style="">
              <label for="pdfEdital" class=" col-form-label " style="margin-top: 20px; font-weight: bold;">
                {{ __('Arquivo do Edital:') }}
              </label>
              <a href="{{ route('download', ['file' => $edital->pdfEdital])}}" target="_new">Arquivo atual</a>
            </div>

            <div class="col-sm-6" style="margin-top: 20px;">
              <div class="custom-file">
                <input type="file" class="filestyle" data-placeholder="Para editar, envie um arquivo" data-text="Selecionar" data-btnClass="btn-primary-lmts" name="pdfEdital">
              </div>
              @error('pdfEdital')
              <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div><!-- end row input file -->
          <!-- row publicar edital -->
          <div class="row justify-content-center">
            <div id="checkPublicarEdital" class="col-sm-9">
                <input id="publicarEdital" @if($edital->publicado == 'sim') checked @endif class=""name="publicado" type="checkbox" value="sim" style=" margin-top:10px;">
                <label for="publicarEdital" class="col-form-label text-md-right" style=" margin-top: 9px; font-weight: bold">{{old('publicado') }}{{__('Publicar o Edital') }}</label>
            </div>
          </div><!-- end row publicar edital -->
        </div><!--end card body -->
      </div><!-- card arquivo -->
    </div><!-- end row card arquivo -->

    <!-- row card datas -->
    <div class="row" style="margin-top:20px;">
      <div class="card" style="width:100%">
        <div class="card-header">
          Datas
        </div>
        <div class="card-body">
          <!-- table datas -->
          <table class="table-responsive table table-ordered table-hover justify-content-center">
            <tr>
              <th style="width: 50rem"> Descrição </th>
              <th style="width: 20rem"> Data de Início </th>
              <th style="width: 20rem"> Data de Encerramento </th>
            </tr>
            <tr>
              <td>
                <a style="font-weight: bold;">{{__('Período de Isenção da Taxa de Inscrição*: ')}}</a>
              </td>
              <td>
                <label for="inicioIsencao" class="field a-field a-field_a2 page__field">
                  <input value="{{ old('inicioIsencao', $edital->inicioIsencao) }}" id="inicioIsencao" type="date" name="inicioIsencao" autofocus class="form-control @error('inicioIsencao') is-invalid @enderror field__input a-field__input" style="width: 10rem; height:100%">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('inicioIsencao')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="fimIsencao" class="field a-field a-field_a2 page__field" style="margin-left: 25px;">
                  <input value="{{ old('fimIsencao', $edital->fimIsencao) }}" id="fimIsencao" type="date" name="fimIsencao" autofocus class="form-control @error('fimIsencao') is-invalid @enderror field__input a-field__input" style="width: 10rem; height:100%">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('fimIsencao')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;margin-left: 25px;" >
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
            <tr>
              <td>
                <a style="font-weight: bold;">{{__('Período de Recurso da Isenção da Taxa de Inscrição*: ')}}</a>
              </td>
              <td>
                <label for="inicioRecursoIsencao" class="field a-field a-field_a2 page__field">
                  <input value="{{ old('inicioRecursoIsencao', $edital->inicioRecursoIsencao) }}" id="inicioRecursoIsencao" type="date" name="inicioRecursoIsencao" autofocus class="form-control @error('inicioRecursoIsencao') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('inicioRecursoIsencao')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="fimRecursoIsencao" class="field a-field a-field_a2 page__field" style="margin-left: 25px;">
                  <input value="{{ old('fimRecursoIsencao', $edital->fimRecursoIsencao) }}" id="fimRecursoIsencao" type="date" name="fimRecursoIsencao" autofocus class="form-control @error('fimRecursoIsencao') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('fimRecursoIsencao')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;margin-left: 25px;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
            <tr>
              <td>
                <a style="font-weight: bold;">{{__('Período de Inscrições*: ')}}</a>
              </td>
              <td>
                <label for="inicioInscricoes" class="field a-field a-field_a2 page__field">
                  <input value="{{ old('inicioInscricoes', $edital->inicioInscricoes) }}" id="inicioInscricoes" type="date" name="inicioInscricoes" autofocus class="form-control @error('inicioInscricoes') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('inicioInscricoes')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="fimInscricoes" class="field a-field a-field_a2 page__field" style="margin-left: 25px;">
                  <input value="{{ old('fimInscricoes', $edital->fimInscricoes) }}" id="fimInscricoes" type="date" name="fimInscricoes" autofocus class="form-control @error('fimInscricoes') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('fimInscricoes')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;margin-left: 25px;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
            <tr>
              <td>
                <a style="font-weight: bold;">{{__('Período de Recurso da Inscrição*: ')}}</a>
              </td>
              <td>
                <label for="inicioRecurso" class="field a-field a-field_a2 page__field">
                  <input value="{{ old('inicioRecurso', $edital->inicioRecurso) }}" id="inicioRecurso" type="date" name="inicioRecurso" autofocus class="form-control @error('inicioRecurso') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('inicioRecurso')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="fimRecurso" class="field a-field a-field_a2 page__field" style="margin-left: 25px;">
                  <input value="{{ old('fimRecurso', $edital->fimRecurso) }}" id="fimRecurso" type="date" name="fimRecurso" autofocus class="form-control @error('fimRecurso') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('fimRecurso')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;margin-left: 25px;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
            <tr>
              <td>
                <a style="font-weight: bold;">{{__('Data do Resultado Preliminar*: ')}}</a>
              </td>
              <td>
              </td>
              <td>
                <label for="resultado" class="field a-field a-field_a2 page__field" style="margin-left: 25px;">
                  <input value="{{ old('resultado', $edital->resultado) }}" id="fimRecurso" type="date" name="resultado" autofocus class="form-control @error('resultado') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('resultado')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;margin-left: 25px;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
            <tr>
              <td>
                <a style="font-weight: bold;">{{__('Período do Recurso do Resultado*: ')}}</a>
              </td>
              <td>
                <label for="inicioRecursoResultado" class="field a-field a-field_a2 page__field">
                  <input value="{{ old('inicioRecursoResultado', $edital->inicioRecursoResultado) }}" id="inicioRecursoResultado" type="date" name="inicioRecursoResultado" autofocus class="form-control @error('inicioRecursoResultado') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('inicioRecursoResultado')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="fimRecursoResultado" class="field a-field a-field_a2 page__field" style="margin-left: 25px;">
                  <input value="{{ old('fimRecursoResultado', $edital->fimRecursoResultado) }}" id="fimRecurso" type="date" name="fimRecursoResultado" autofocus class="form-control @error('fimRecursoResultado') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('fimRecursoResultado')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;margin-left: 25px;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
            <tr>
              <td>
                <a style="font-weight: bold;">{{__('Data do Resultado*: ')}}</a>
              </td>
              <td>
              </td>
              <td>
                <label for="resultadoFinal" class="field a-field a-field_a2 page__field" style="margin-left: 25px;">
                  <input value="{{ old('resultadoFinal', $edital->resultadoFinal) }}" id="fimRecurso" type="date" name="resultadoFinal" autofocus class="form-control @error('resultadoFinal') is-invalid @enderror field__input a-field__input"  style="width: 10rem;">
                  <span class="a-field__label-wrap">
                    <span class="a-field__label"></span>
                  </span>
                </label>
                @error('resultadoFinal')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;margin-left: 25px;">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
          </table><!-- end table datas -->



        </div><!-- end card-body-->
      </div><!-- end card-->
    </div><!-- end row card datas -->

    <!-- row card vagas por curso -->
    <div class="row" style="margin-top:20px;">
      <div class="card" style="width:100%">
        <div class="card-header">
          Vagas por Curso
        </div>
        @error('checkVagasExistentes')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Um edital precisa de pelo menos um curso com vagas disponíveis.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @enderror
        <div class="card-body">
          <table class="table table-responsive table-ordered table-hover justify-content-center" style="width:100%">
            <tr>
              <th> Campus </th>
              <th> Departamento </th>
              <th> Curso </th>
              <th> Vagas Disponíveis </th>
              <th style="width: 5rem; "> Manhã </th>
              <th style="width: 5rem; "> Tarde </th>
              <th style="width: 5rem; "> Noite </th>
              <th style="width: 5rem; "> Integral </th>
              <th style="width: 5rem; "> Especial </th>
            </tr>
            <?php //cursos
            // dd($cursos);
            $i = 1;

            foreach ($cursos as $curso):
              $flagExisteVaga = false;
              $vagaManha = '';
              $vagaTarde = '';
              $vagaNoite = '';
              $vagaIntegral = '';
              $vagaEspecial = '';
            ?>
            <tr>
              <td>
                {{ $curso['campus'] }}
              </td>
              <td>
                {{ $curso['departamento'] }}
              </td>
              <td>
                {{ $curso['nome'] }}
              </td>
              <td>
                <input style="margin-top:20%" id="checkbox{{$i}}" onclick="vagas({{$i}})" name="checkbox{{$i}}" <?php foreach ($vagasDisponiveis as $key) {
                  if($key['id'] == $curso['id']){
                    $flagExisteVaga = true;
                    $vagaManha = $key['vagas'][0];
                    $vagaTarde = $key['vagas'][1];
                    $vagaNoite = $key['vagas'][2];
                    $vagaIntegral = $key['vagas'][3];
                    $vagaEspecial = $key['vagas'][4];


                    echo('checked');
                  }

                }?> type="checkbox" value="{{$curso['id']}}">
              </td>


              <td>
                <label for="manha{{$i}}" class="field a-field a-field_a2 page__field" id="labelManha{{$i}}" style="display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>; margin-top: 10px" >
                  <input <?php if(!$flagExisteVaga){echo('disabled');}  ?> value="<?php if($flagExisteVaga){ echo($vagaManha);} ?>" id="manha{{$i}}" type="text" name="manha{{$i}}" class="field__input a-field__input" style="width: 5rem; display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>;" placeholder="Manhã">
                </label>
                @error('manha' . $i)
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="tarde{{$i}}" class="field a-field a-field_a2 page__field" id="labelTarde{{$i}}" style="display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>; margin-top: 10px" >
                  <input <?php if(!$flagExisteVaga){echo('disabled');}  ?> value="<?php if($flagExisteVaga){ echo($vagaTarde);} ?>" id="tarde{{$i}}" type="text" name="tarde{{$i}}" class="field__input a-field__input" style="width: 5rem; display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>;" placeholder="Tarde">
                </label>
                @error('tarde' . $i)
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="noite{{$i}}" class="field a-field a-field_a2 page__field" id="labelNoite{{$i}}" style="display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>; margin-top: 10px" >
                  <input <?php if(!$flagExisteVaga){echo('disabled');}  ?> value="<?php if($flagExisteVaga){ echo($vagaNoite);} ?>" id="noite{{$i}}" type="text" name="noite{{$i}}" class="field__input a-field__input" style="width: 5rem; display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>;" placeholder="Noite">
                </label>
                @error('noite' . $i)
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="integral{{$i}}" class="field a-field a-field_a2 page__field" id="labelIntegral{{$i}}" style="display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>; margin-top: 10px" >
                  <input <?php if(!$flagExisteVaga){echo('disabled');}  ?> value="<?php if($flagExisteVaga){ echo($vagaIntegral);} ?>" id="integral{{$i}}" type="text" name="integral{{$i}}" class="field__input a-field__input" style="width: 5rem; display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>;" placeholder="Integral">
                </label>
                @error('integral' . $i)
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
              <td>
                <label for="especial{{$i}}" class="field a-field a-field_a2 page__field" id="labelEspecial{{$i}}" style="display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>; margin-top: 10px" >
                  <input <?php if(!$flagExisteVaga){echo('disabled');}  ?> value="<?php if($flagExisteVaga){ echo($vagaEspecial);} ?>" id="especial{{$i}}" type="text" name="especial{{$i}}" class="field__input a-field__input" style="width: 5rem; display: <?php if($flagExisteVaga == true){echo('block');} else{echo('none');} ?>;" placeholder="Especial">
                </label>
                @error('especial' . $i)
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </td>
            </tr>
            <?php
            $i++;
            endforeach;
            ?>
          </table>
        </div><!-- end card-body-->

      </div><!-- end card -->

    </div><!-- end row card vagas por curso -->

    <!-- row botão finalizar -->
    <div class="form-group row justify-content-center" style=""> <!-- button -->
        <div class="">
            <input type="hidden" name="nCursos" value="{{$i}}">
            <input id="checkVagasExistentes" type="hidden" name="checkVagasExistentes" value="ok">
            <input type="hidden" name="editalId" value="{{$editalId}}">
            <button onclick="event.preventDefault();confirmar();" class="btn btn-primary btn-primary-lmts"  style="height: 50px;width: 120px;margin-top: 20px; margin-bottom: 40px;">
                {{ __('Finalizar') }}
            </button>

        </div>
    </div>
  </form>
</div><!-- end container-->
@endsection

<script type="text/javascript" >

  function existemVagas(){
    document.getElementById("checkVagasExistentes").value = "ok";
  }


  function vagas(x) {
    existemVagas();
    var str = "labelManha";
    var labelManha = str.concat(x);
    var str = "labelTarde";
    var labelTarde = str.concat(x);
    var str = "labelNoite";
    var labelNoite = str.concat(x);
    var str = "labelIntegral";
    var labelIntegral = str.concat(x);
    var str = "labelEspecial";
    var labelEspecial = str.concat(x);
    str = "manha";
    var manha = str.concat(x);
    str = "tarde";
    var tarde = str.concat(x);
    str = "noite";
    var noite = str.concat(x);
    str = "integral";
    var integral = str.concat(x);
    str = "especial";
    var especial = str.concat(x);
  	if (document.getElementById("checkbox" + x).checked == true) {
      document.getElementById(manha).style.display = "";
      document.getElementById(tarde).style.display = "";
      document.getElementById(noite).style.display = "";
      document.getElementById(integral).style.display = "";
      document.getElementById(especial).style.display = "";

      document.getElementById(labelManha).style.display = "";
      document.getElementById(labelTarde).style.display = "";
      document.getElementById(labelNoite).style.display = "";
      document.getElementById(labelIntegral).style.display = "";
      document.getElementById(labelEspecial).style.display = "";

      document.getElementById(manha).value = "";
      document.getElementById(tarde).value = "";
      document.getElementById(noite).value = "";
      document.getElementById(integral).value = "";
      document.getElementById(especial).value = "";

      document.getElementById(manha).disabled = "";
      document.getElementById(tarde).disabled = "";
      document.getElementById(noite).disabled = "";
      document.getElementById(integral).disabled = "";
      document.getElementById(especial).disabled = "";

  	}
    else{
      document.getElementById(manha).style.display = "none";
      document.getElementById(tarde).style.display = "none";
      document.getElementById(noite).style.display = "none";
      document.getElementById(integral).style.display = "none";
      document.getElementById(especial).style.display = "none";

      document.getElementById(labelManha).style.display = "none";
      document.getElementById(labelTarde).style.display = "none";
      document.getElementById(labelNoite).style.display = "none";
      document.getElementById(labelIntegral).style.display = "none";
      document.getElementById(labelEspecial).style.display = "none";

      document.getElementById(manha).value = "#";
      document.getElementById(tarde).value = "#";
      document.getElementById(noite).value = "#";
      document.getElementById(integral).value = "#";
      document.getElementById(especial).value = "#";

      document.getElementById(manha).disabled = "true";
      document.getElementById(tarde).disabled = "true";
      document.getElementById(noite).disabled = "true";
      document.getElementById(integral).disabled = "true";
      document.getElementById(especial).disabled = "true";
    }

  }

  function confirmar(){
    if(confirm("Tem certeza que deseja finalizar?") == true) {
      document.getElementById("formCadastro").submit();
   }
  }


</script>
