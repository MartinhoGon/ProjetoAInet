@extends('master')

@section('pageName', 'Adicionar/Editar Pedido')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"> <!-- declara a linguagem a usar -->
    <head>
        <meta charset="utf-8">
    </head>    
    <body>
        <div class="request">
             <text> Número de pedido: *nr autom*</text>
        </div>
         <div class="auth">
            <label for="text" class="col-md-4 control-label">Descricao</label>
            <input id="textD" type="text" class="form-control" name="text" required>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Data do pedido</label>
           <text> Data do pedido: *data de hj autom*</text>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Data limite de conclusão do pedido (opcional)</label>
           <input id="dateMax" type="date" class="form-control" name="dateMax" min="dataDoPedido">
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Número de cópias</label>
           <input id="numberCopy" type="number" class="form-control" name="numberCopy" min="1" required="">
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Tipo de tom</label>
           <form>
                <input type="radio" name="color" value="pb" > Preto e Branco<br>
                <input type="radio" name="color" value="color"> Cores<br>
            </form>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Agrupamento de folhas</label>
           <form>
                <input type="radio" name="Gpaper" value="grouped" checked=""> Agrafadas<br>
                <input type="radio" name="Gpaper" value="ungrouped"> Sem agrafos<br>
            </form>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Dimensão do papel</label>
           <form>
                <input type="radio" name="Spaper" value="a4" checked=""> A4<br>
                <input type="radio" name="Spaper" value="a3" > A3<br>
            </form>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Tipo de papel</label>
           <form>
                <input type="radio" name="Tpaper" value="draft" > Rascunho<br>
                <input type="radio" name="Tpaper" value="normal" checked=""> Normal<br>
                <input type="radio" name="Tpaper" value="photo"> Fotográfico<br>
            </form>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Tipo de paginação</label>
           <form>
                <input type="radio" name="Tpage" value="frontBack" checked=""> Frente e verso<br>
                <input type="radio" name="Tpage" value="front"> Página única<br>
            </form>
        </div>
        <div class="auth">
            <label for="file" class="col-md-4 control-label">Conteúdo multimédia</label>
            <input id="file" type="file" class="form-control" name="fileF" required="">
        </div>
        <div class=request>
            <button type="submit" class="btn"> Submeter </button>
        </div>
    </body>
</html>
@endsection