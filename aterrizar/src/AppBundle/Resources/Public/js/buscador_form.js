$( document ).ready(function() {

var id = $( "#servicio" ).attr( "data-id" );

ocultar(id);

$( "a" ).click(function() {
  ocultar(this.id);
});

function ocultar(id) {
  switch (id) {

    case 'btn_vuelo':

    $('#buscar_hotel').hide();
    $('#buscar_auto').hide();
    $('#buscar_vuelo').show();

    $('#btn_hotel').parent('li').removeClass('active');
    $('#btn_auto').parent('li').removeClass('active');
    $('#btn_vuelo').parent('li').addClass('active');

    break;

    case 'btn_hotel':
    $('#buscar_vuelo').hide();
    $('#buscar_auto').hide();
    $('#buscar_hotel').show();
    $('#btn_auto').parent('li').removeClass('active');
    $('#btn_vuelo').parent('li').removeClass('active');
    $('#btn_hotel').parent('li').addClass('active');
    break;

    case 'btn_auto':
    $('#buscar_hotel').hide();
    $('#buscar_vuelo').hide();
    $('#buscar_auto').show();
    $('#btn_hotel').parent('li').removeClass('active');
    $('#btn_vuelo').parent('li').removeClass('active');
    $('#btn_auto').parent('li').addClass('active');
    break;

    default:
  }
}
});
