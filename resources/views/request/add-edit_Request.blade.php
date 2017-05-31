
<div class="form-group">
    <label for="inputDescription">Descricao</label>
    <input
        type="text" class="form-control"
        name="description" id="inputDescription"
        placeholder="Descricao" value="{{old('description', $requests->description)}}" />
</div>
<div class="form-group">
    <label for="inputDataLimite">Data limite de conclusão do pedido (opcional)</label>
    <input
        type="date" class="form-control"
        name="due_date" id="inputDataLimite"
        placeholder="DataLimite" value="{{old('due_date', $requests->due_date)}}" />
</div>
<div class="form-group">
    <label for="inputNumeroCopias">Número de cópias</label>
    <input
        type="number" class="form-control" min="1" required=""
        name="quantity" id="inputNumeroCopias"
        placeholder="NumeroCopias" value="{{old('quantity', $requests->quantity)}}" />
</div>
<div class="form-group">
    <label for="text" class="col-md-4 control-label">Tipo de tom</label>
        <p><input type="radio" name="colored" value="0" checked=""> Preto e Branco</>
        <input type="radio" name="colored" value="1"> Cores</p>
</div>
<div class="form-group">
    <label for="text" class="col-md-4 control-label">Agrupamento de folhas</label>
        <p><input type="radio" name="stapled" value="1" checked=""> Agrafadas</>
        <input type="radio" name="stapled" value="0"> Sem agrafos</p>
</div>
<div class="form-group">
            <label for="text" class="col-md-4 control-label">Dimensão do papel</label>
                <p><input type="radio" name="paper_size" value="4" checked=""> A4</>
                <input type="radio" name="paper_size" value="3" > A3</p>
</div>
<div class="form-group">
            <label for="text" class="col-md-4 control-label">Tipo de papel</label>
                <p><input type="radio" name="paper_type" value="0" checked=""> Rascunho</>
                <input type="radio" name="paper_type" value="1" > Normal</>
                <input type="radio" name="paper_type" value="2"> Fotográfico</p>
</div>       
<div class="form-group">
            <label for="text" class="col-md-4 control-label">Tipo de paginação</label>
                <p><input type="radio" name="front_back" value="1" checked=""> Frente e verso</>
                <input type="radio" name="front_back" value="0"> Página única</p>
</div>
<div class="form-group">
    <label for="inputFoto">Conteúdo multimédia</label>
    <input
        type="file" class="form-control"
        name="file" id="inputFoto"
        placeholder="File" value="{{old('file', $requests->file)}}" />
</div>       
requests