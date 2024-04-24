<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class LocationController extends Controller
{
    public function addLocation()
    {
        return view('page.backend.add-location');
    }

    public function manageLocation(Request $request)
    {
        $perPage = $request->input('per_page', 5); // รับค่าจำนวนรายการต่อหน้า หากไม่ได้ระบุค่าให้ใช้ค่าเริ่มต้นคือ 10
        $rec_location = DB::table("location")->paginate($perPage);
        return view('page.backend.location-management', ['rec_location' => $rec_location, 'perPage' => $perPage]);
    }

    public function editLocation(Request $request)
    {
        $rec_location = DB::table("location")->where('t_id', '=', $request->id)->first();
        // dd($rec_location);
        return view('page.backend.edit-location', ['rec_location' => $rec_location]);
    }

    public function insertLocation(Request $request)
    {
        // dd($request);
        $filename = '';
        if ($request->hasfile('LOCATION_PIC')) {
            $file = $request->file('LOCATION_PIC');
            $filesize = $file->getSize();
            $filetype = $file->getClientMimeType();

            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHi') . bin2hex(random_bytes(8)) . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
        }

        DB::table("location")->insert([
            'title' => $request->LOCATION_NAME,
            'detail' => $request->LOCATION_DETAIL,
            'main_pic' => $filename,
            'create_date' => date('Y-m-d h:i:s'),
            'update_date' => date('Y-m-d h:i:s')
        ]);
        return redirect('manage-location');
    }
    public function updateLocation(Request $request)
    {
        // dd($request);
        $filename = '';
        if ($request->hasfile('LOCATION_PIC')) {
            $file = $request->file('LOCATION_PIC');
            $filesize = $file->getSize();
            $filetype = $file->getClientMimeType();

            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHi') . bin2hex(random_bytes(8)) . '.' . $extension;
            $file->move(public_path('/uploads'), $filename);
        }
        $updateData = [
            'title' => $request->LOCATION_NAME,
            'detail' => $request->LOCATION_DETAIL,
            'update_date' => date('Y-m-d h:i:s')
        ];

        // เพิ่มเงื่อนไขเพื่อตรวจสอบว่ามีไฟล์รูปถูกอัปโหลดหรือไม่
        if ($filename !== '') {
            $updateData['main_pic'] = $filename;
        }

        DB::table("location")->where('t_id', '=', $request->T_ID)->update($updateData);

        return redirect('manage-location');
    }

    public function deleteLocation(Request $request)
    {
        // dd($request->id);

        DB::table("location")->where('t_id', '=', $request->id)->delete();
        return redirect('manage-location');
    }
}
