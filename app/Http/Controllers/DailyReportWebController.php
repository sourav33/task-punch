<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyReportWebController extends Controller
{
    public function DailyReport() {

        $startDate = Carbon::now()->startOfDay()->format('Y-m-d H:i:s');
        $endDate = Carbon::now()->format('Y-m-d H:i:s');

        $data = Location::whereBetween('locations.datetime', [$startDate, $endDate])
            ->join('staff', 'locations.staff_id', '=', 'staff.staff_id')
            ->select(
                'staff.id',
                'staff.staff_id',
                'staff.name',
                'staff.status',
                'locations.id',
                'locations.type',
                'locations.datetime'
            )
            ->groupBy(
                'staff.id',
                'staff.staff_id',
                'staff.name',
                'staff.status',
                'locations.id',
                'locations.type',
                'locations.datetime'
            )
        ->get();


        return response()->json($data, 200);

    }

    public function index() {


        $startDate = Carbon::now()->startOfDay()->format('Y-m-d H:i:s');
        $endDate = Carbon::now()->format('Y-m-d H:i:s');

        $data = Location::whereBetween('locations.datetime', [$startDate, $endDate])
            ->join('staff', 'locations.staff_id', '=', 'staff.staff_id')
            ->select(
                'staff.id',
                'staff.staff_id',
                'staff.name',
                'staff.status',
                'locations.id',
                'locations.type',
                'locations.datetime'
            )
            ->groupBy(
                'staff.id',
                'staff.staff_id',
                'staff.name',
                'staff.status',
                'locations.id',
                'locations.type',
                'locations.datetime'
            )
        ->get();


        // return view('example.index', compact('data', 'count'));

        return view('pages.daily-report', compact('data'));
    }
}
