<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Request;
use Khill\Lavacharts\Lavacharts;


class StatisticsRequestsController extends Controller
{
    /*public function showRequests()
    {
        $requests = Requests::all();
        $departments = Department::all();
        return view('home',compact('requests', 'departments'));
    }*/

    public function showStatistics(){
        //$results = [];
        //$stmt = $pdo->query('SELECT count (*) FROM requests where color = tgy');
        //while ($row = $stmt->fetch()) {
        //    $results[] = $row;
        //}

        $lava = new Lavacharts; 
        $round = $lava->DataTable();

        $round->addStringColumn('Percentagem')
        ->addNumberColumn('Percent')
        ->addRow(['P&B', 95])
        ->addRow(['Cores', 5]);

        $lava->DonutChart('Coloracao', $round, [
        'title' => 'Percentagem de impressões a Preto e Branco vs a Cores']);
    }

}


