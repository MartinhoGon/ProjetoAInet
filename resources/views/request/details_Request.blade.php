@extends('master')

@section('pageName', 'Detalhes do pedido')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"> <!-- declara a linguagem a usar -->
    <head>
        <meta charset="utf-8">
    </head>    
    <body>
        
         <div class="auth">
            <label for="text" class="col-md-4 control-label">Descrição:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Funcionário que realizou pedido:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar, nomeadamente NOME DEP MAIL TLM*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Data do pedido:</label>
           <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Detalhes do pedido:</label>
           <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar, nomeadmente COLORACAO, PAGINACAO, AGRAFADO, DIMENSAO, PAPEL, LINK FICH, ESTADO*</label>
        </div>
        <div>
            <label for="coment" class="col-md-4 control-label">Comentários:</label>
              <textarea rows="4" cols="20" name="comment" form="usrform"> Faça um comentário...!</textarea>
              <button type="lock" class="btn"> Submeter </button>
           <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar, nomeadmente comentários antigos e suas respostas e botao ao lado de lock*</label>
        </div>
        <div class=request>
            <button type="lock" class="btn"> Bloquear comentário </button>
        </div>
        <div class=request>
            <button type="done" class="btn"> Pedido concluído </button>
            <label for="inputType">Impressora utilizada</label>
                <select name="type" id="inputType" class="form-control">
                    <option disabled selected> -- selecione uma opção -- </option>
                    @foreach ($departments as $dep)
                     <option value=" {{$dep->id}}"> {{$dep->name}} </option>
                     @endforeach
                </select>
        </div>
    </body>
</html>
@endsection