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
            					<a href="{{route('requests.groupDepartment')}}" <option value=" {{$dep->id}}"> {{$dep->name}} </option></a>
             				@endforeach
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

			            	<a   class="letra" href="{{route('requests.orderName')}}">Nome</a>
			            	<a   class="letra" href="{{route('requests.orderDepartment')}}">Departamento</a>

			            </li>
			        </ul>
			</div>
		</td>
		<td>
			<form class="form-search pull-right">
			    <input type="text" class="input-medium search-query">
			    <button type="submit" class="btn letra">Search</button>
			</form>	
		</td>
	</tr>
</table>
