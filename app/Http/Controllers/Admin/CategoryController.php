<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest('id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actions = [];
                    $actions['edit'] = route('category.edit', $row->id);
                    $actions['destroy'] = $row->id;
                    
                    return view('admin.layouts.button', $actions);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'title'         => 'required|string',
            'description'   => 'string',
            'image'         => 'mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            if (isset($validated['image'])) {

                $validated['image']->storeAs('public/image', $validated['image']->hashName());
            
                $validated['image'] = $validated['image']->hashName();
            }
            

            Category::create($validated);

            $notification = array(
                'success'   => 'Berhasil tambah kategori',
            );


            return redirect()->route('category.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('category.index')->with(['error' => 'Tambah data gagal! ' . $e->getMessage()]);
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
        $detail = Category::find($id);

        return view('admin.category.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'title'         => 'required|string',
            'description'   => 'string',
            'image'         => 'mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $detail = Category::find($id);

            if (isset($validated['image'])) {

                $validated['image']->storeAs('public/image', $validated['image']->hashName());
            
                $validated['image'] = $validated['image']->hashName();
            }else{
                $validated['image'] = basename($detail->image);
            }
            
            $detail->update($validated);

            $notification = array(
                'success'   => 'Berhasil update kategori',
            );


            return redirect()->route('category.index')->with($notification);
        } catch (\Throwable $e) {
            return redirect()->route('category.index')->with(['error' => 'Update data gagal! ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $detail =  Category::find($id);
            if ($detail) {
                Storage::disk('local')->delete('public/image/'.basename($detail->image));
                $detail->delete();
            }

            return response()->json(['status' => 'success']);
        } catch (\Throwable $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
