@if (Request::get('notice'))
    
  <section class="notices">

    <span>Appointment ID: {{ Request::get('appointment') }} has been {{ Request::get('notice') }}</span>

  </section>
@elseif (!empty($notice))

  <section class="notices">

    <span>Your appointment has been {{ $notice }}, your appointment is: {{ $appointment->appointment_date }}</span>

  </section>

@endif
