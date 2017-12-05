$( "a" ).click(function() {
  switch (this.id) {
    case 'btn_vuelo':
    $('#buscar_hotel').hide();
    $('#buscar_auto').hide();
    $('#buscar_vuelo').show();
    break;

    case 'btn_hotel':
    $('#buscar_vuelo').hide();
    $('#buscar_auto').hide();
    $('#buscar_hotel').show();
    break;

    case 'btn_auto':
    $('#buscar_hotel').hide();
    $('#buscar_vuelo').hide();
    $('#buscar_auto').show();
    break;

    default:

  }
});
