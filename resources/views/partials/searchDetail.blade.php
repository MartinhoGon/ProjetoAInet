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
            					<a href="{{route('requests.groupDepartment')}}" <option name="department_id" value=" {{$dep->id}}"> {{$dep->name}} </option></a>
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
