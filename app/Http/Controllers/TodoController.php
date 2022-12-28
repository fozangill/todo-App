<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\GoogleCalendar\Event;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $todo = DB::table('todos')->orderBy('date')->Simplepaginate(3);

        return view('list')->with(compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',

            'description' => 'required',

            'label' => 'required',

            'status' => 'required',

            'date' => 'required',

        ]);

        $startDateTime = Carbon::parse($request->input('date'))->subHours(1);
        $endDateTime = (clone $startDateTime)->addHour();

        $event = Event::create([

            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'startDateTime' => $startDateTime,
            'endDateTime' => $endDateTime

        ]);
        $eventId = $event->id;

        $todo = new Todo();

        $todo->event_id = $eventId;
        $todo->title = $request['title'];
        $todo->description = $request['description'];
        $todo->label = $request['label'];
        $todo->status = $request['status'];
        $todo->date = $request['date'];

        $todo->save();

        return redirect()->route('todo.index')->with('success','Todo event has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);

        return view('show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('edit',compact('todo'));
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
        $request->validate([

            'title' => 'required',

            'description' => 'required',

            'label' => 'required',

            'status' => 'required',

            'date' => 'required'

        ]);

        $startDateTime = Carbon::parse($request->input('date'))->subHours(1);
        $endDateTime = (clone $startDateTime)->addHour();
        $event_id = DB::table('todos')->where('id', $id)->value('event_id');
        $eventId = Event::find($event_id);

        $eventId->update([

            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'startDateTime' => $startDateTime,
            'endDateTime' => $endDateTime

        ]);

        sleep(4);

        $todo = Todo::find($id);

        $todo->update($request->all());

        return redirect()->route('todo.index')->with('success','Todo Event has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event_id = DB::table('todos')->where('id', $id)->value('event_id');
        $event = Event::find($event_id);
        $event->delete();

        Todo::find($id)->delete();

        return redirect()->route('todo.index')->with('success','Todo Event has been deleted successfully');
    }
}
