@extends('master')

@section('pageName', 'Adicionar/Editar Pedido')

@section('content')
    <form action="{{route('requests.store')}}" method="post" class="form-group">
        {{csrf_field()}}
         <div class="form-group">
            <label for="text" class="col-md-4 control-label">Descricao</label>
            <input id="textD" type="text" class="form-control" name="text" required>
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Data do pedido</label>
           <text> Data do pedido: *data de hj autom*</text>
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Data limite de conclusão do pedido (opcional)</label>
           <input id="dateMax" type="date" class="form-control" name="dateMax" min="dataDoPedido">
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Número de cópias</label>
           <input id="numberCopy" type="number" class="form-control" name="numberCopy" min="1" required="">
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Tipo de tom</label>
                <br><input type="radio" name="color" value="pb" > Preto e Branco<br>
                <input type="radio" name="color" value="color"> Cores<br>
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Agrupamento de folhas</label>
                <br><input type="radio" name="Gpaper" value="grouped" checked=""> Agrafadas<br>
                <input type="radio" name="Gpaper" value="ungrouped"> Sem agrafos<br>
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Dimensão do papel</label>
                <br><input type="radio" name="paper_sizer" value="a4" checked=""> A4<br>
                <input type="radio" name="paper_sizer" value="a3" > A3<br>
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Tipo de papel</label>
                <br><input type="radio" name="paper_type" value="draft" > Rascunho<br>
                <input type="radio" name="paper_type" value="normal" checked=""> Normal<br>
                <input type="radio" name="paper_type" value="photo"> Fotográfico<br>
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Tipo de paginação</label>
                <br><input type="radio" name="pageType" value="frontBack" checked=""> Frente e verso<br>
                <input type="radio" name="pageType" value="front"> Página única<br>
        </div>
        <div class="form-group">
            <label for="file" class="col-md-4 control-label">Conteúdo multimédia</label>
            <input id="file" type="file" class="form-control" name="fileF" required="">
        </div>
        <div class=request>
            <button type="submit" class="btn btn-success"> Submeter </button>
            <a class="btn btn-default" href="{{route('requests.showRequests')}}">Cancel</a>
        </div>
    </form>
@endsection