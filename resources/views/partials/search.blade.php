<table class="pull-right">
	<tr>
		<td>
			<div class="btn-group col-md-pull-12">
			    <button class="btn letra">Ver departamento:</button>
			    <button class="btn dropdown-toggle" data-toggle="dropdown">
			        <span class="caret"></span>
			    </button>
			        <ul class="dropdown-menu">
			            <li>

			           		 @foreach ($departments as $dep)
                    			 <option value=" {{$dep->id}}"> {{$dep->name}} </option>
             				@endforeach
			            	<a   class="letra" href="#">IR A BD BUSCAR TD</a>
			            </li>
			        </ul>
			</div>
		</td>
		<td>
			<div class="btn-group col-md-pull-9">
			    <button class="btn letra">Ordenar por:</button>
			    <button class="btn dropdown-toggle" data-toggle="dropdown">
			        <span class="caret"></span>
			    </button>
			        <ul class="dropdown-menu">
			            <li>
			            	<a   class="letra" href="#">Nome</a>
			            	<a   class="letra" href="#">Departamento</a>

			            </li>
			        </ul>
			</div>
		</td>
	</tr>
</table>