<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffWebRequest;
use App\Http\Requests\UpdateStaffWebRequest;
use App\Models\Location;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class StaffWebController extends Controller
{
    public function staffUpdate(Request $request) {

        try {

            $staff = Staff::find($request->edit_txt_id);

            // Update only if the field is present in the request
            if ($request->filled('edit_txt_new_staff_id')) {
                $request->validate([
                    'edit_txt_new_staff_id' => 'required|numeric|unique:staff,staff_id',
                ]);

                $staff->staff_id = $request->edit_txt_new_staff_id;
            }
            if ($request->filled('edit_txt_staff_name')) {
                $request->validate([
                    'edit_txt_staff_name' => 'required',
                ]);

                $staff->name = $request->edit_txt_staff_name;
            }
            if ($request->filled('edit_txt_staff_status')) {
                $request->validate([
                    'edit_txt_staff_status' => 'required|numeric',
                ]);

                $staff->status = $request->edit_txt_staff_status;
            }
            if ($request->filled('edit_txt_staff_password')) {
                $request->validate([
                    'edit_txt_staff_password' => 'required|min:4',
                ]);

                $staff->password = Hash::make($request->edit_txt_staff_password);
            }


            $staff->save();

            return response()->json(['success' => true, 'message' => 'Staff updated successfully'], 200);


        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the update process
            return response()->json(['success' => false, 'message' => 'Failed to update staff. ' . $e->getMessage()], 500);
        }

    }


    public function staffStore(StoreStaffWebRequest $request) {

        try {

            $staff = new Staff();
            $staff->staff_id = $request->add_txt_staff_id;
            $staff->name = $request->add_txt_staff_name;
            $staff->status = $request->add_txt_staff_status;
            $staff->password = Hash::make($request->add_txt_staff_password);
            $staff->save();

            return response()->json(['success' => true, 'message' => 'Staff created successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the save process
            return response()->json(['success' => false, 'message' => 'Failed to create staff. ' . $e->getMessage()], 500);
        }
    }


    public function attendanceDataTable(Request $request)
    {
        // $startDate = $request->input('start_date', Carbon::now()->startOfDay()->format('Y-m-d H:i:s'));
        // $endDate = $request->input('end_date', Carbon::now())->format('Y-m-d H:i:s');

        $startDate = $request->input('start_date', Carbon::now()->startOfDay()->format('Y-m-d H:i:s'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d H:i:s'));

        $data = Location::whereBetween('locations.datetime', [$startDate, $endDate])
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


    public function staffDataTable()
    {

        $data = Staff::all();

        return DataTables::of($data)->make(true);
    }

    public function staffTable() {
        return view('pages.staff-list');
    }


}
