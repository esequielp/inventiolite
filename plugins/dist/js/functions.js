$("#twitter").hide();
$("#twitter2").hide();
$("#twitter3").hide();

$( "button" ).click(function() {
  $( "#twitter" ).toggle( "slow" );
  $( "#twitter2" ).toggle( "slow" );
  $( "#twitter3" ).toggle( "slow" );
});

 /* activate the carousel */
   $("#modal-carousel").carousel({interval:false});

   /* change modal title when slide changes */
   $("#modal-carousel").on("slid.bs.carousel",       function () {
        $(".modal-title")
        .html($(this)
        .find(".active img")
        .attr("title"));
   });

   //FUNCION QUE MUESTRA EL MODAL CON LAS IMAGENES
   /* when clicking a thumbnail */
   $(".row .thumbnail").click(function(){
    var content = $(".carousel-inner");
    var title = $(".modal-title");
  
    content.empty();  
    title.empty();
  
  	var id = this.id;  
     var repo = $("#img-repo .item");
     var repoCopy = repo.filter("#" + id).clone();
     var active = repoCopy.first();
  
    active.addClass("active");
    title.html(active.find("img").attr("title"));
  	content.append(repoCopy);

    // show the modal
  	$("#modal-gallery").modal("show");
  });


$( ".del_img" ).click(function() {

//ELIMINAR IMAGEN VISTA EDITAR PRODUCTOS
var txt;
var r = confirm("Esta Seguro de eliminar esta Imagen?");
if (r == true) {
 var id = $(this).attr('id');
 //alert(id);
 var inputval = $( "#images_id" ).val();
 var lastval ="";
 var idimagenes = id + '-' +inputval;

  $( "#images_id" ).val(idimagenes);

  var idtext = $( "#images_id" ).val();
  //alert(idtext);
  //var idtext2 = idtext.slice(0, 1);
  // $( "#images_id" ).val(idtext2);
  $(this).remove();

}
 
});



    var table = $('.datatable').DataTable( {
        "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":    "Último",
              "sNext":    "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },
        responsive: true,       
        orderCellsTop: true,
        fixedHeader: true,
         "order": [[ 2, "asc" ]]
    } );

//FUNCION DUPLICA LA FILA VISTA TABLA PRODCUTOS 
$('.clone').on( 'click', function () {
        
        var myTr = $(this).closest('tr');
        var clone = myTr.clone();
        myTr.after(clone);
        var id = $( this ).attr('id');
 
        alert( 'Clicked row id '+id );
        

        //onsole.log( type );
    } );


/*
   // Setup - add a text input to each footer cell
    $('.datatable thead tr').clone(true).appendTo( '.datatable thead' );
    $('.datatable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        
       if ( (title !='Imagen') && (title !='Precio($)') && (title !='Precio(Bs)')  && (title !='Activo') && (title !='Acciones')  ) {

        $(this).html( '<input type="text" size="12" clas="form-control input-sm" placeholder="Buscar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
      }
    } );
 */


 
