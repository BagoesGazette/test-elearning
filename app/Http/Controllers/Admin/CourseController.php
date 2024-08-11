<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Subscription;
use App\Models\User;
use App\Models\WatchTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::with('category', 'mentor')->latest('id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actions = [];
                    $actions['edit'] = route('course.edit', $row->id);
                    $actions['destroy'] = $row->id;
                    
                    return view('admin.layouts.button', $actions);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category   = CourseCategory::all();
        $mentor     = User::role('mentor')->get();

        return view('admin.course.create', compact('category', 'mentor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_category_id'    => 'required',
            'title'                 => 'required|string',
            'mentor_id'             => 'required',
            'job'                   => 'required',
            'time'                  => 'required',
            'image'                 => 'mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            if (isset($validated['image'])) {

                $validated['image']->storeAs('public/course', $validated['image']->hashName());
            
                $validated['image'] = $validated['image']->hashName();
            }
            

            Course::create($validated);

            $notification = array(
                'success'   => 'Berhasil tambah kelas',
            );


            return redirect()->route('course.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('course.index')->with(['error' => 'Tambah data gagal! ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail     = Course::find($id);
        
        return view('admin.course.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category   = CourseCategory::all();
        $detail     = Course::find($id);
        $mentor     = User::role('mentor')->get();

        return view('admin.course.edit', compact('category', 'detail', 'mentor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'course_category_id'    => 'required',
            'title'                 => 'required|string',
            'mentor_id'             => 'required',
            'job'                   => 'required',
            'time'                  => 'required',
            'image'                 => 'mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $detail = Course::find($id);

            if (isset($validated['image'])) {

                $validated['image']->storeAs('public/course', $validated['image']->hashName());
            
                $validated['image'] = $validated['image']->hashName();
            }else{
                $validated['image'] = basename($detail->image);
            }
            
            $detail->update($validated);

            $notification = array(
                'success'   => 'Berhasil update kelas',
            );


            return redirect()->route('course.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('course.index')->with(['error' => 'Update data gagal! ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $detail =  Course::find($id);
            if ($detail) {
                Storage::disk('local')->delete('public/course/'.basename($detail->image));
                $detail->delete();
            }

            return response()->json(['status' => 'success']);
        } catch (\Throwable $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function mentor(Request $request)
    {
        $data = $this->calculateMentorEarnings();
   
        return view('admin.course.mentor', compact('data'));
    }

    private function calculateMentorEarnings()
    {
        // Harga awal langganan
        $subscriptionPrice = 69000;
        
        // Biaya admin, PPN, dll (20% dari harga awal)
        $adminFees = $subscriptionPrice * 0.20;
        
        // Harga bersih setelah dipotong biaya
        $netAmount = $subscriptionPrice - $adminFees;
        
        // Bagian mentor dari harga bersih
        $mentorShare = $netAmount / 2;
        
        // Mengambil total waktu tonton oleh user untuk semua kelas dalam satu bulan
        $totalWatchTime = WatchTime::
            whereMonth('created_at', now()->month)
            ->sum('watch_time');
        
        // Memastikan ada total waktu tonton untuk perhitungan
        if ($totalWatchTime == 0) {
            return "No watch time recorded for this user.";
        }
        
        // Ambil semua record waktu tonton oleh user dalam bulan tersebut
        $watchTimes = WatchTime::
            whereMonth('created_at', now()->month)
            ->get();
        
        $earnings = [];

        // Hitung earnings untuk setiap kelas
        foreach ($watchTimes as $watchTime) {
            $course = $watchTime->course;
            
            // Hitung persentase waktu tonton untuk kelas ini
            $watchPercentage = ($watchTime->watch_time / $totalWatchTime) * 100;
            
            // Hitung earnings untuk mentor
            $mentorEarnings = ($watchPercentage / 100) * $mentorShare;

            // Simpan hasil earnings
            $earnings[] = [
                'id'=> $watchTime->id,
                'users' => $watchTime->user->name, 
                'mentor' => $course->mentor->name, 
                'course_title' => $course->title,
                'watch_time' => $watchTime->watch_time,
                'percentage' => $watchPercentage,
                'earnings' => $mentorEarnings
            ];

        }

        return $earnings;
    }

}
