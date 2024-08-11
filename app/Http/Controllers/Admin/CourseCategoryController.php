<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CourseCategory::latest('id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actions = [];
                    $actions['edit'] = route('course-category.edit', $row->id);
                    $actions['destroy'] = $row->id;
                    
                    return view('admin.layouts.button', $actions);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.course-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string'
        ]);

        try {

            CourseCategory::create($validated);

            $notification = array(
                'success'   => 'Berhasil tambah kelas kategori',
            );


            return redirect()->route('course-category.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('course-category.index')->with(['error' => 'Tambah data gagal! ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail     = CourseCategory::find($id);

        return view('admin.course-category.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'          => 'required|string'
        ]);

        try {
            $detail = CourseCategory::find($id);

            $detail->update($validated);

            $notification = array(
                'success'   => 'Berhasil update kelas kategori',
            );


            return redirect()->route('course-category.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('course-category.index')->with(['error' => 'Update data gagal! ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            CourseCategory::find($id)->delete();

            return response()->json(['status' => 'success']);
        } catch (\Throwable $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    
}
