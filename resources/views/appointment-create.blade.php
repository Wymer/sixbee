@extends('layouts.app')

@section('content')

  @include('components.notices')

  <section class="form">

    <h2>Create Appointment</h2>

    <form action="{{ route('appointment_submit') }}" method="post">
      @csrf
      <fieldset>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
      </fieldset>
      <fieldset>
        <label for="appointment_date">Appointment Date</label>
        <input type="datetime" name="appointment_date" id="appointment_date" required>
      </fieldset>
      <fieldset>
        <label for="issue">Issue</label>
        <textarea name="issue" id="issue" cols="30" rows="10"></textarea>
      </fieldset>
      <fieldset>
        <label for="number">Contact Number</label>
        <input type="number" name="number" id="number">
      </fieldset>
      <fieldset>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email">
      </fieldset>
      <fieldset>
        <input type="submit" value="Book">
      </fieldset>

    </form>

  </section>
@endsection
