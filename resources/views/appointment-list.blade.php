@extends('layouts.app')

@section('content')
  @include('components.notices')

  <section
    class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
  
    <table>
      <thead>
        <tr>
          <td>Name</td>
          <td>Appointment Date & Time</td>
          <td>Issue</td>
          <td>Contact Number</td>
          <td>Email Address</td>
          <td>Status</td>
          <td>Actions</td>
        </tr>
      </thead>
  
      <tbody>
        @foreach ($appointments as $appointment)
  
        <tr class="{{ $appointment->status }}">
          <td>
            {{ $appointment->name }}
          </td>
  
          <td>{{ $appointment->appointment_date }}</td>
  
          <td>{{ $appointment->issue }}</td>
  
          <td>{{ $appointment->number }}</td>
  
          <td>{{ $appointment->email }}</td>
  
          <td>{{ $appointment->status }}</td>
  
          <td>
            <div class="table__actions">
              @if ($appointment->status != 'approved')
                <form class="table__approve" action="{{ route('appointment_approve') }}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $appointment->id}}">
                  <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                      <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                      <path
                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    <span>Approve</span>
                  </button>
                </form>
              @endif
    
              <form class="table__delete" action="{{ route('appointment_delete') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $appointment->id}}">
                <button type="submit">delete</button>
              </form>
    
              <a href="{{ route('appointment_edit', $appointment->id) }}" class="table__edit">edit</a>
            </div>
          </td>
  
  
        </tr>
  
        @endforeach
      </tbody>
  
  
    </table>
  
  
  </section>

@endsection
