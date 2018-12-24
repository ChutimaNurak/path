<?php
namespace App\Http\Controllers;
use App\ExcelrModel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{

    public function update(Request $request, $id_route)
    {       
        $district = $request->input('District');
        $time = $request->input('Time');

        $model = new ExcelrModel();
        $model->uprout($district, $time, $id_route);

        // $district = $request->input('District');
        // $time = $request->input('Time');

        // $model = new ExcelrModel();
        // $model->upjob($district_Sum, $time_Sum, $id_job);

        return redirect('/test');
    }
}
