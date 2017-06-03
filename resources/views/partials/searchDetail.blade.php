<table class="pull-right">
	<tr>
		<td>
        <div class="btn-group col-md-pull-9">
			<form action="{{route('requests.groupDepartment')}}" method="post" class="form-group">
          {{csrf_field()}}
          <div class="form-group">
            					
                                <select name="department_id" id="department_id" class="form-control">
                                            <option value = "1" selected> Ciências Jurídicas</option>
                                            <option value = "2" selected> Ciências da Linguagem</option>
                                            <option value = "3" selected> Engenharia do Ambiente</option>
                                            <option value = "4" selected> Engenharia Civil</option>
                                            <option value = "5" selected> Engenharia Eletrotécnica</option>
                                            <option value = "6" selected> Engenharia Informática</option>
                                            <option value = "7" selected> Engenharia Mecânica</option>
                                            <option value = "8" selected> Gestão e Economia</option>
                                            <option value = "9" selected> Matemática</option>
                                </select>
          </div>
          <div class="form-group">
                  <button type="submit" class="btn-xs btn-success" name="ok">Procurar</button>
          </div>
          </form>
        </form>
			    
		</td>
		<td>
			<div class="btn-group col-md-pull-9">
			    <button class="btn letra">Ordenar por:</button>
			    <button class="btn dropdown-toggle" data-toggle="dropdown">
			        <span class="caret"></span>
			    </button>
			        <ul class="dropdown-menu">
			            <li>

			            	<a   class="letra" href="{{route('requests.orderName')}}">Nome</a>
			            	<a   class="letra" href="{{route('requests.orderDepartment')}}">Departamento</a>

			            </li>
			        </ul>
			</div>
		</td>
		<td>
			<form action="/search" method="POST" role="search">
    		{{ csrf_field() }}
    			<div class="input-group">
        			<input type="text" class="form-control" name="q"
            		placeholder="Search users"> <span class="input-group-btn">
            	<button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
		</td>
	</tr>
</table>
