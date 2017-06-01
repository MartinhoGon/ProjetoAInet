@extends('master')

@section('pageName', 'Papelaria ESTG')


@section('content')

        <text> As nossas estatísticas</text>

        <form action="{{route('home')}}" method="post" class="form-group">
            {{csrf_field()}}
            <div class="formSpecificDep">
                    <select name="department_id" id="department_id" class="form-control">
                         <!-- escolher departamento para estatistica -->
                        <option value = "0" selected> ESTG</option>
                             @foreach (\App\Department::all() as $dep)
                                <option  value="{{$dep->id}}">{{$dep->name}}</option>
                            @endforeach
                    </select>
            </div>
              <button type="submit" class="btn"> Ver </button>
        </form>

        <div class="formAllDep">
            <div class="form-group">
                 <!--total impressoes P&B versus Cores-->
                    <div id="chart-div"></div>
                    @donutchart('Coloracao', 'chart-div')

                <!--total impressoes, de impressoes por departamento, de impressores no corrente dia-->
                    <div id="poll_div"></div>
                    @barchart('Number', 'poll_div')

                <!--média diária de impressões do corrente mês-->
                    <text><br>Média diária de impressões neste mês: 
                        <span>{{$countTotalUntilToday}}</span> 
                    </text> 
            </div>
        </div>

@endsection