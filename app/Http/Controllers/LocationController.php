<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Requests\CheckStaffAttendanceRequest;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function punchIn(StoreLocationRequest $request)
    {
        $location = new Location();
        $location->staff_id = $request->staff_id;
        $location->type = 1;
        $location->datetime = $request->datetime;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();

        return response()->json(['success' => true, 'message' => 'Location saved successfully'], 201);


    }
    public function punchOut(StoreLocationRequest $request)
    {
        $location = new Location();
        $location->staff_id = $request->staff_id;
        $location->type = 0;
        $location->datetime = $request->datetime;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();

        return response()->json(['success' => true, 'message' => 'Location saved successfully'], 201);


    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        //
    }

    public function staffAttendance(CheckStaffAttendanceRequest $request)
    {
        $staffId = $request->staff_id;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $data = Location::whereBetween('locations.datetime', [$startDate, $endDate])
                        ->where("locations.staff_id", $staffId)
                        ->select(
                            'locations.id',
                            'locations.staff_id',
                            'locations.type',
                            'locations.datetime',
                            'locations.latitude',
                            'locations.longitude'
                            )
        ->get();

        return response()->json($data, 200);
    }

}
