<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $test = Test::all();
        return view('test.index', ['test' => $test]);
    }
    public function create()
    {
        return view('test.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'test' => 'required',
        ]);

        Test::create([
            'test' => $request->test,
        ]);

        return redirect()->back()
            ->with('success', 'Thread has been created successfully.');

    }
    public function edit()
    {
        return view('test.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'test' => 'required',
        ]);

        $test['test'] = $request->test;
        $test->save();
        return redirect()->route('threads.show',['forum' => $forum->id, 'thread' => $thread->id])
            ->with('success','Thread Has Been updated successfully');
    }

}
