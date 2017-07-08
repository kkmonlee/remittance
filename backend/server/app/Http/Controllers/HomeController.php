<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Volunteer;
use App\EventCheck;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function postEvent(Request $request)
    {
        $this->validate($request, [
            'latitude' => 'required',
            'longitude' => 'required',
            'event_name' => 'required',
            'event_description' => 'required',
        ]);

        Event::create([
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'event_name' => $request['event_name'],
            'event_description' => $request['event_description'],
        ]);
        return redirect()->back();
    }

    public function getVolunteer() {
        $volunteer = new Volunteer();
        return view('band', ['volunteer' => $volunteer->all()]);
    }

    public function postVolunteer(Request $request) {
        EventCheck::create([
            'UserID' => $request['userID'],
            'BandID' => $request['bandID']
        ]);
        return redirect()->back();
    }

    public function showEvent() {
        $eventChecks = new EventCheck();
        return view('show', ['eventChecks' => $eventChecks->all()]);
    }
}
