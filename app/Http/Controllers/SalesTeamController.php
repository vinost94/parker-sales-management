<?php

namespace App\Http\Controllers;

use App\Models\SalesTeam;
use Illuminate\Http\Request;

class SalesTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $salesteams = SalesTeam::myteam()->get();
        return view('dashboard', ['salesteams' => $salesteams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validated = request()->validate([
            'fullname' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'route_id' => 'required',
            'joined_at' => 'required',
            'comment' => 'required',
        ]);
        $data = request()->all();
        if (SalesTeam::where('email', $data['email'])->count()) {
            return back()->withErrors(['error' => 'Email Address exists!']);
        }
        $data['manager_id'] = auth()->id();
        SalesTeam::create($data);
        return back()->with('message', 'Successfully created!');
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
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $salesTeam = SalesTeam::findorfail($id);
        return response()->json($salesTeam->load(['route']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesTeam $salesTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        // 'manager_id', '', '', '', '', '', ''
        $validated = request()->validate([
            'fullname' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'route_id' => 'required',
            'joined_at' => 'required',
            'comment' => 'required',
        ]);
        $salesTeam = SalesTeam::findorfail(request()->id);
        $salesTeam->update(request()->all());
        return back()->with(['success', 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesTeam  $salesTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salesTeam = SalesTeam::findorfail($id);
        $message = $salesTeam->fullname.' removed from your team';
        $salesTeam->delete();
        return response()->json(['message' => $message]);
    }
}
