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
        // $sum_dis = $request->input('District_Sum');
        // $sum_time = $request->input('time_Sum');
        $model = new ExcelrModel();
        $model->uprout( $time, $id_route);

        $district = $request->input('District_Sum');
        $time = $request->input('time_Sum');

        $model = new ExcelrModel();
        $model->upjob($district_Sum, $time_Sum);

        return redirect('/test');
    }
}
