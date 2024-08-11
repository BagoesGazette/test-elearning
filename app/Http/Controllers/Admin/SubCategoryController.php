<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SubCategory::with('category')->latest('id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actions = [];
                    $actions['edit'] = route('sub-category.edit', $row->id);
                    $actions['destroy'] = $row->id;
                    
                    return view('admin.layouts.button', $actions);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.sub-category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'   => 'required',
            'title'         => 'required|string',
            'description'   => 'required|string'
        ]);

        try {

            SubCategory::create($validated);

            $notification = array(
                'success'   => 'Berhasil tambah sub kategori',
            );


            return redirect()->route('sub-category.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('sub-category.index')->with(['error' => 'Tambah data gagal! ' . $e->getMessage()]);
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
        $detail     = SubCategory::find($id);
        $category   = Category::all();

        return view('admin.sub-category.edit', compact('detail', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id'   => 'required',
            'title'         => 'required|string',
            'description'   => 'required|string'
        ]);

        try {

            $detail = SubCategory::find($id);

            $detail->update($validated);

            $notification = array(
                'success'   => 'Berhasil update sub kategori',
            );


            return redirect()->route('sub-category.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('sub-category.index')->with(['error' => 'Update data gagal! ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            SubCategory::find($id)->delete();

            return response()->json(['status' => 'success']);
        } catch (\Throwable $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
