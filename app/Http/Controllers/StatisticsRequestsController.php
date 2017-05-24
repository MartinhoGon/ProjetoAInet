<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Requests as Pedido;
use Khill\Lavacharts\Lavacharts;
use Lava;

class StatisticsRequestsController extends Controller
{
    public function showStatistics(){


        //total impressoes P&B versus Cores
        $this -> showStatisticsColor();

         //total impressoes, de impressoes por departamento, de impressores no corrente dia
        $this -> showStatisticsTotal();

        //média diária de impressões do corrente mês
        $this -> showStatisticsAVG();
        
        return view('home');

    }

    //total impressoes P&B versus Cores
     public function showStatisticsColor(){
        //sql
        $countBlack = Pedido::where('colored', 0)->count();

        $countTotal = Pedido::count();

        $black=($countBlack/$countTotal)*100;
        $colored = 100-$black;

        //grafico
        $round = Lava::DataTable();

        $round->addStringColumn('Percentagem')
        ->addNumberColumn('Percent')
        ->addRow(['P&B', $black])
        ->addRow(['Cores', $colored]);

        Lava::DonutChart('Coloracao', $round, [
        'title' => 'Percentagem de impressões a Preto e Branco vs a Cores']);

        
    }

    //total impressoes, de impressoes por departamento, de impressores no corrente dia
     public function showStatisticsTotal(){

        $departments = Department::all();

        //sql
        $countTotal = Pedido::count();
        /*
        $countTotalToday = Pedido::where('DATE(created_at)', CURDATE())->count();

        
         faltaODep: funcao recebe id do dep e retorna o total de impressoes do dep*/

        //grafico
        $total = Lava::DataTable();

        $total->addStringColumn('Total')
        ->addNumberColumn('Number')
        ->addRow(['Desde sempre', $countTotal])
        ->addRow(['De hoje', 50]);
        foreach ($departments as $dep)
            $total->addRow([$dep->name, 160]);

        Lava::BarChart('Number', $total, [
        'title' => 'Total de impressões']);


    }

    //média diária de impressões do corrente mês
      public function showStatisticsAVG(){         

      }
}
