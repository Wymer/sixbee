<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Redirect;


class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->notice = '';
    }
    
    public function create()
    {
        return view('appointment-create');
    }
    
    public function view() {

      $appointments = Appointment::all();

      return view('appointment-list', ['notice' => $this->notice, 'appointments' => $appointments]);
    }

    public function store(Request $request)
    {

      $appointment = new Appointment;
      $appointment->name = $request->name;
      $appointment->appointment_date = \Carbon\Carbon::parse($request->appointment_date);
      $appointment->issue = $request->issue;
      $appointment->number = $request->number;
      $appointment->email = $request->email;
      $appointment->status = 'pending';

      $this->notice = 'saved';

      $appointment->save();
      return view('appointment-create', ['notice' => $this->notice, 'appointment' => $appointment]);
    }

    public function approve(Request $request) {

      $appointments = Appointment::all();
      $appointment = Appointment::find($request->id);
      $appointment->status = 'approved';
      $appointment->save();

      $this->notice = 'Approved';

      return redirect()->route('appointment_list', ['notice' => $this->notice, 'appointment' => $appointment, 'appointments' => $appointments]);
      
    }

    public function edit(string $id) {

      $appointment = Appointment::find($id);
      return view('appointment-edit', ['notice' => $this->notice, 'appointment' => $appointment]);

    }

    public function update(Request $request) {

      $appointment = Appointment::find($request->id);

      $appointment->name = $request->name;
      $appointment->appointment_date = \Carbon\Carbon::parse($request->appointment_date);
      $appointment->issue = $request->issue;
      $appointment->number = $request->number;
      $appointment->email = $request->email;
      $appointment->status = $request->status;

      $appointment->save();
      $this->notice = 'saved';

      $appointments = Appointment::all();

      return Redirect::route('appointment_list', ['notice' => $this->notice, 'appointment' => $appointment, 'appointments' => $appointments]);

    }

    public function delete(Request $request) {

      $appointments = Appointment::all();
      $appointment = Appointment::find($request->id);

      Appointment::destroy($request->id);

      $this->notice = 'deleted';

      return Redirect::route('appointment_list', ['notice' => $this->notice, 'appointment' => $appointment, 'appointments' => $appointments]);

    }
}
