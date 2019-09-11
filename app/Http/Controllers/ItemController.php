<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Item::orderBy('name','asc')->get();

            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => true,
                'line' => $e->getLine(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'stock' => 'required',
        ]);

        try {
            $data = ([
                'id_category' => 1,
                'name' => $request->name,
                'stock' => $request->stock
            ]);

            $condition = Item::where('slug', Str::slug($request->name))->count();
            if ($condition != 0) {
                $data['slug'] = Str::slug($request->name).'-'.$condition;
            }else{
                $data['slug'] = Str::slug($request->name);
            }
            Item::create($data);

            return response()->json([
                'error' => false,
                'message' => 'Item Has Been Added'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => true,
                'line' => $e->getLine(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $data = Item::where('slug', $slug)->first();

            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => true,
                'line' => $e->getLine(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'stock' =>  'required',
        ]);

        try {
            $data = ([
                'name'          => $request->name,
                'stock'         => $request->stock
            ]);

            $condition = Item::where('slug', Str::slug($request->name))->count();
            if ($condition != 0) {
                $data['slug'] = Str::slug($request->name).'-'.$condition;
            }else{
                $data['slug'] = Str::slug($request->name);
            }

            Item::find($id)->update($data);

            return response()->json([
                'error' => false,
                'message' => 'Item Has Been Updated'
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'error' => true,
                'line' => $e->getLine(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Item::find($id)->delete();

            return response()->json([
                'error' => false,
                'message' => 'Item Has Been Deleted'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => true,
                'line' => $e->getLine(),
                'message' => $e->getMessage()
            ]);
        }
    }
}
