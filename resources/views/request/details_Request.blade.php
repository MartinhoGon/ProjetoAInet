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
                    <option value="1">Dell 2145cn Color Laser MFP PS</option>
                    <option value="2">HP Color LaserJet 3700</option>
                    <option value="3">HP Color LaserJet 4700</option>
                    <option value="4">HP Color LaserJet 9500</option>
                    <option value="5">HP Color LaserJet CM6040 MFP</option>
                    <option value="6">HP Color LaserJet CP3525</option>
                    <option value="7">HP Color LaserJet CP4020-CP4520 Series</option>
                    <option value="8">HP Color LaserJet CP6015</option>
                    <option value="9">HP Color LaserJet M551</option>
                    <option value="10">HP Color LaserJet Pro MFP M277</option>
                    <option value="11">HP Color LaserJet 4700</option>
                    <option value="12">HP LaserJet 4350</option>
                    <option value="13">HP LaserJet 5M</option>
                    <option value="14">HP LaserJet 9000 Series</option>
                    <option value="15">HP LaserJet P3005</option>
                     <option value="16">HP LaserJet P4010 Series</option>
                    <option value="17">Pharos Controlled Queue</option>
                    <option value="18">RICOH Aficio MP C6501 PS</option>
                </select>
        </div>
    </body>
</html>
@endsection