<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Requests as Pedido;
use Khill\Lavacharts\Lavacharts;
use Lava;
use Carbon\Carbon;
use DB;

class StatisticsRequestsController extends Controller
{
    public function showStatistics(){


        //total impressoes P&B versus Cores
        $this -> showStatisticsColor();

         //total impressoes, de impressoes por departamento, de impressores no corrente dia
        $this -> showStatisticsTotal();

        //média diária de impressões do corrente mês
       $countTotalUntilToday = $this -> showStatisticsAVG();


        return view('home', compact('countTotalUntilToday'));
    }

    //total impressoes P&B versus Cores
     public function showStatisticsColor(){
        //sql

       $countBlack = Pedido::where('status', 1)->where('colored', 0)->count();                                                   //HEYHEYHEY muito estranho dar 100%

        
        $countTotal = Pedido::where('status', 1)->count();

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

        //sql
        $countTotal = Pedido::where('status', 1)->count();
        $current_timestamp = Carbon::today();
        $countTotalToday = Pedido::where('closed_date', '>=', $current_timestamp)->whereNotNull('closed_date')->count();                     

        //grafico
        $total = Lava::DataTable();

        $total->addStringColumn('Total')
        ->addNumberColumn('Number')
        ->addRow(['Desde sempre', $countTotal])
        ->addRow(['De hoje', $countTotalToday]); 

        $totalPerDepartment = DB::select('select count(a.id) as total,d.id,d.name from requests a inner join users on users.id = a.owner_id inner join departments d where d.id = department_id and a.status=1 group by d.id');

      foreach ($totalPerDepartment as $row)
            $total->addRow([$row->name, $row->total]);                           
    
        Lava::BarChart('Number', $total, [
        'title' => 'Total de impressões']);


    }

    //média diária de impressões do corrente mês
      public function showStatisticsAVG(){  
    //soma Impressoes deste mes e deste ano /diaDeHoje                                                                                                         

        //sql
       $current_timestamp = Carbon::today();
       $initialMonthYear_timestamp = Carbon::createFromDate(null, null, 0);                                       //HEYHEYHEY timezone esta a ler errado
       $dayOfToday = Carbon::now()->day;
        
        $countTotalUntilToday =  Pedido::where('status', 1)->where('created_at', '>=', $initialMonthYear_timestamp)->where('created_at', '<=', $current_timestamp)->count();

        

        $avg = $countTotalUntilToday/$dayOfToday;

        return $avg;

      }

}
