<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'room_id' => 'required',
            'room_name' => 'required',
            'room_type' => 'required',
            'location' => 'required'
        ]);
        $input = $request->all();

        Room::create($input);

        //Session::flash('flash_message', 'Room successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view('rooms.show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);

        return view('rooms.edit')->with('room', $room);
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
        $room = Room::findOrFail($id);

        $this->validate($request, [
            'room_id' => 'required',
            'room_name' => 'required',
            'room_type' => 'required',
            'location' => 'required'
        ]);

        $input = $request->all();

        $room->fill($input)->save();

        //Session::flash('flash_message', 'Room successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        $room->delete();

        Session::flash('flash_message', 'Room successfully deleted!');

        return redirect()->route('rooms.index');
    }
}
