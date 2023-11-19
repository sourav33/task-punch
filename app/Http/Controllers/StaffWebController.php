<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StaffWebController extends Controller
{

    public function attendanceDataTable(Request $request)
    {
        // $startDate = $request->input('start_date', Carbon::now()->startOfDay()->format('Y-m-d H:i:s'));
        // $endDate = $request->input('end_date', Carbon::now())->format('Y-m-d H:i:s');

        $startDate = $request->input('start_date', Carbon::now()->startOfDay()->format('Y-m-d H:i:s'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d H:i:s'));

        $data = Location::whereBetween('datetime', [$startDate, $endDate])
            ->join('staff', 'locations.staff_id', '=', 'staff.staff_id')
            ->select(
                'staff.id',
                'staff.staff_id',
                'staff.name',
                'locations.id',
                'locations.type',
                'locations.datetime'
            )
            ->groupBy(
                'staff.id',
                'staff.staff_id',
                'staff.name',
                'locations.id',
                'locations.type',
                'locations.datetime'
            )
        ->get();

        return DataTables::of($data)->make(true);
    }

    public function attendanceTable() {
        return view('pages.attendance-list');
    }


    public function staffDataTable(Request $request)
    {

        $data = Staff::all();

        return DataTables::of($data)->make(true);
    }

    public function staffTable() {
        return view('pages.staff-list');
    }


}
