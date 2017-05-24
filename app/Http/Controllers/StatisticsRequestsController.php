<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Request as Pedido;
use Khill\Lavacharts\Lavacharts;

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

        $lava = new Lavacharts; 
        $round = $lava->DataTable();

        $round->addStringColumn('Percentagem')
        ->addNumberColumn('Percent')
        ->addRow(['P&B', 95])
        ->addRow(['Cores', 5]);

        $lava->DonutChart('Coloracao', $round, [
        'title' => 'Percentagem de impressões a Preto e Branco vs a Cores']);

        
    }

    //total impressoes, de impressoes por departamento, de impressores no corrente dia
     public function showStatisticsTotal(){
        $departments = Department::all();

        $lava = new Lavacharts; 
        $total = $lava->DataTable();

        $total->addStringColumn('Total')
        ->addNumberColumn('Number')
        ->addRow(['Desde sempre', 200])
        ->addRow(['De hoje', 50]);
        foreach ($departments as $dep)
            $total->addRow(['Departamento de $dep->name', 160]);

        $lava->BarChart('Number', $total, [
        'title' => 'Total de impressões']);


    }

    //média diária de impressões do corrente mês
      public function showStatisticsAVG(){
        
         

      }
}
