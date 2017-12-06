/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year,
  today: 'Hoy',
  clear: 'Limpiar',
  close: 'Seleccionar',
  format: 'mm/dd/yyyy',
  closeOnSelect: false // Close upon selecting a date,
});

// function checkDate(form) {
//   if ($('.datepicker').val() == '') {
//     $('.datepicker').addClass('invalid');
//     return false;
//   } else {
//     $('.datepicker').removeClass('invalid');
//     return true;
//   }
// }
//
// $('form').submit(function() {
//   return checkDate(this);
// });

// $('.datepicker').change(function() {
//   checkDate();
// });


$("#opciones input[type='radio']").click(function(){
    if (this.id == "soloida") {
      $('#regreso').prop('disabled', true);
    } else {
      $('#regreso').prop('disabled', false);
    }
    $('#origen').focus();
});
