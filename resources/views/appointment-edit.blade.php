@extends('layouts.app')

@section('content')
  <section class="form">
  
    <h2>Edit Appointment</h2>
  
    <form action="{{ route('appointment_update') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $appointment->id }}">
      <fieldset>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $appointment->name }}" required>
      </fieldset>
      <fieldset>
        <label for="appointment_date">Appointment Date</label>
        <input type="datetime" name="appointment_date" id="appointment_date" value="{{ $appointment->appointment_date }}"
          required>
      </fieldset>
      <fieldset>
        <label for="issue">Issue</label>
        <textarea name="issue" id="issue" cols="30" rows="10">{{ $appointment->issue }}</textarea>
      </fieldset>
      <fieldset>
        <label for="number">Contact Number</label>
        <input type="number" name="number" id="number" value="{{ $appointment->number }}">
      </fieldset>
      <fieldset>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" value="{{ $appointment->email }}">
      </fieldset>
      <fieldset>
        <label for="status">Status</label>
        <select name="status" id="status">
          <option value="pending" @if($appointment->status == 'pending') selected @endif>Pending</option>
          <option value="approved" @if($appointment->status == 'approved') selected @endif>Approved</option>
        </select>
      </fieldset>
      <fieldset>
        <input type="submit" value="Save">
      </fieldset>
  
    </form>
  
  </section>
@endsection
