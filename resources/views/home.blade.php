@extends('master')

@section('pageName', 'Papelaria ESTG')

@section('content')

        <div class="fromDep">
             <!-- escolher departamento para estatistica -->
             <text> As nossas estatísticas </text>

             <!--total impressoes P&B versus Cores-->
                <div id="chart-div"></div>
                @donutchart('Coloracao', 'chart-div')

            <!--total impressoes, de impressoes por departamento, de impressores no corrente dia-->
                <div id="poll_div"></div>
                @barchart('Number', 'poll_div')
            <!--média diária de impressões do corrente mês-->
                <text><br>Média diária de impressões neste mês: </text> 
                <!--showStatisticsAVG()-->

@endsection