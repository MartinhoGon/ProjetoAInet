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
            					<a href="{{route('users.groupDepartment')}}" <option value=" {{$dep->id}}"> {{$dep->name}} </option></a>
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

			            	<a   class="letra" href="{{route('users.orderName')}}">Nome</a>
			            	<a   class="letra" href="{{route('users.orderDepartment')}}">Departamento</a>

			            </li>
			        </ul>
			</div>
		</td>
	</tr>
</table>