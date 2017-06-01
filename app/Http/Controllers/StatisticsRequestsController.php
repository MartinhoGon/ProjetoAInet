<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Request as Pedido;
use Khill\Lavacharts\Lavacharts;
use Lava;
use Carbon\Carbon;
use DB;

class StatisticsRequestsController extends Controller
{

 /* public function receiveValue(Request $req)
  {

      $id = $req->department_id;
  }*/


    public function showStatistics(Request $req)
    {

        $id = $req->department_id;

        //total impressoes P&B versus Cores
        $this -> showStatisticsColor($id);

         //total impressoes, de impressoes por departamento, de impressores no corrente dia
        $this -> showStatisticsTotal($id);

        //média diária de impressões do corrente mês
       $countTotalUntilToday = $this -> showStatisticsAVG($id);


        return view('home', compact('countTotalUntilToday'));

    }


    //total impressoes P&B versus Cores
     public function showStatisticsColor($id)
     {

      $countBlack =0;
      $countTotal = 0;

      if($id == 0){
        $countBlack = Pedido::where('status', 1)->where('colored', 0)->count();                                           
        $countTotal = Pedido::where('status', 1)->count();
      }
      else{
        $searchBlack = DB::select('select count(a.id) as total, d.id as id from requests a inner join users on users.id = a.owner_id inner join departments d on d.id = department_id and a.status=1 and a.colored=0 group by d.id');
        foreach ($searchBlack as $row)
            if($id ==  $row->id){
              $countBlack = $row->total;
            }                
        $searchTotal = DB::select('select count(a.id) as total, d.id as id from requests a inner join users on users.id = a.owner_id inner join departments d on d.id = department_id and a.status=1 group by d.id');
        foreach ($searchTotal as $rowT)
            if($id ==  $rowT->id){
              $countTotal = $rowT->total;
            } 
      }
      if($countTotal==0){ //para contornar a indeterminacao matematica de 0/0
          $black=0;
          $colored=0;
      }
      else{
        $black=($countBlack/$countTotal)*100;
        $colored = 100-$black;
      }
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
     public function showStatisticsTotal($id)
     {
        $countTotal=0;
        $countTotalToday=0;
         $current_timestamp = Carbon::today();

        if($id==0){
        $countTotal = Pedido::where('status', 1)->count();
        $countTotalToday = Pedido::where('closed_date', '>=', $current_timestamp)->whereNotNull('closed_date')->count();      

         //grafico
        $total = Lava::DataTable();

        $total->addStringColumn('Total')
        ->addNumberColumn('Number')
        ->addRow(['Desde sempre', $countTotal])
        ->addRow(['De hoje', $countTotalToday]); 

        $totalPerDepartment = DB::select('select count(a.id) as total,d.id,d.name from requests a inner join users on users.id = a.owner_id inner join departments d on d.id = department_id and a.status=1 group by d.id');

      foreach ($totalPerDepartment as $row)
            $total->addRow([$row->name, $row->total]);

        
      }


        else{
         $countTotal = DB::select('select count(a.id) as total, d.id as id from requests a inner join users on users.id = a.owner_id inner join departments d on d.id = users.department_id  where a.status = 1 and d.id = ? group by d.id', [$id]);
        $countTotalToday = DB::select('select count(a.id) as total, d.id as id from requests a inner join users on users.id = a.owner_id inner join departments d on d.id = department_id and a.status=1  where a.closed_date >= ? and d.id = ? group by d.id', [$current_timestamp, $id]);
        
      
         //grafico
        $total = Lava::DataTable();

        $total->addStringColumn('Total')
        ->addNumberColumn('Number')
        ->addRow(['Desde sempre', empty($countTotal)? 0 : $countTotal[0]])
        ->addRow(['De hoje', empty($countTotalToday)? 0 : $countTotalToday[0]]); 

      }                     
    
        Lava::BarChart('Number', $total, [
        'title' => 'Total de impressões']);


    }

    //média diária de impressões do corrente mês
      public function showStatisticsAVG($id)
      {  
    //soma Impressoes deste mes e deste ano /diaDeHoje                                                                                                         

        $countTotalUntilToday =0;
        //sql
       $current_timestamp = Carbon::today();
       $initialMonthYear_timestamp = Carbon::now()->startOfMonth();      
       $dayOfToday = Carbon::now()->day;

       if($id==0){
        $countTotalUntilToday =  Pedido::where('status', 1)->where('closed_date', '>=', $initialMonthYear_timestamp)->where('closed_date', '<=', $current_timestamp)->count(); 
       }
      else{
        $countTotalUntilToday =  DB::select('select count(a.id) as total, d.id as id from requests a inner join users on users.id = a.owner_id inner join departments d on d.id = department_id and a.status=1  where a.closed_date between ? and ? and d.id=? group by d.id', [$initialMonthYear_timestamp, $current_timestamp, $id]);
      }
       
       $totalUntilToday=empty($countTotalUntilToday)? 0 : $countTotalUntilToday[0];
        $avg = round($totalUntilToday/$dayOfToday);

        return $avg;

      }

}
