import './bootstrap';
import flatpickr from "flatpickr";


const datePickerSelector = document.querySelector('#appointment_date');

flatpickr(datePickerSelector, {
  enableTime: true,
});
