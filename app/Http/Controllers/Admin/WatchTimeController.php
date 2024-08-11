<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WatchTime;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WatchTimeController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $data = WatchTime::with('course')->latest('id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('amount', function ($row) {
                    $watchPercentage = ($row->course->time / $row->watch_time);

                    return $watchPercentage;
                })
                ->rawColumns(['amount'])
                ->make(true);
        }
        return view('admin.watch-time.index');
    }
}
