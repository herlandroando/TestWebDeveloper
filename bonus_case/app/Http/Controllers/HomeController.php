<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $instances = \App\Models\Instance::query();
        if ($request->has('q')) {
            $instances->where('name', 'like', '%' . $request->input('q') . '%');
        }
        $instances = $instances->paginate(10);

        return view('dashboard', [
            'instances' => $instances,
        ]);
    }

    public function create()
    {
        return view('instance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        $instance = new \App\Models\Instance();
        $instance->name = $request->input('name');
        $instance->city = $request->input('city');
        $instance->save();

        return redirect()->route('dashboard');
    }

    public function edit(\App\Models\Instance $instance)
    {
        return view('instance.edit', [
            'instance' => $instance,
        ]);
    }

    public function update(Request $request, \App\Models\Instance $instance)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        $instance->name = $request->input('name');
        $instance->city = $request->input('city');
        $instance->save();

        return redirect()->route('dashboard');
    }

    public function delete(\App\Models\Instance $instance)
    {
        $instance->delete();

        return redirect()->route('dashboard');
    }

    public function show(\App\Models\Instance $instance)
    {
        return view('instance.show', [
            'instance' => $instance,
        ]);
    }
}
