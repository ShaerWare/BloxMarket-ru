<?php

namespace App\Http\Controllers;

use App\Models\Futer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Configuration\Middleware;


class FuterController extends Controller
{
    public static function middleware(): array
    {
        return [
            //new Middleware('permission:product-list|product-create|product-edit|product-delete', only: ['index', 'show']),
            new Middleware('permission:product-create', only: ['create', 'store']),
            new Middleware('permission:product-edit', only: ['edit', 'update']),
            new Middleware('permission:product-delete', only: ['destroy']),
        ];
    }
    /**
     * Отобразить список ресурсов.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $futers = Futer::latest()->paginate(5);
        return view('futers.index', compact('futers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('futers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Futer::create($request->all());

        return redirect()->route('futers.index')
            ->with('success', 'Futer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Futer $futer)
    {
        return view('futers.show', compact('futer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Futer $futer)
    {
        return view('futers.edit', compact('futer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Futer $futer)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $futer->update($request->all());

        return redirect()->route('futers.index')
            ->with('success', 'futer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Futer $futer)
    {
        $futer->delete();

        return redirect()->route('futers.index')
            ->with('success', 'futer deleted successfully');
    }
}
