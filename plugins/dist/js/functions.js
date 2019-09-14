$("#twitter").hide();
$("#twitter2").hide();
$("#twitter3").hide();

$(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

$( "#ShowDivisa" ).click(function() {
  $( "#twitter" ).toggle( "slow" );
  $( "#twitter2" ).toggle( "slow" );
  $( "#twitter3" ).toggle( "slow" );
});
 $('.dropdown-toggle').dropdown();

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
  $(document).on("click",".thumbnail", function () {

    var id = $(this).attr('id');
    var content = $(".carousel-inner");
    var title = $(".modal-title");
  
    content.empty();  
    title.empty();
  
     var repo = $("#img-repo .item");
     var repoCopy = repo.filter("#" + id).clone();
     var active = repoCopy.first();
  
    active.addClass("active");
    title.html(active.find("img").attr("title"));
  	content.append(repoCopy);

    // show the modal
  	$("#modal-gallery").modal("show");
  });

//Eliminar imagenes update product
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
  $("#imagen_producto").remove();

}
 
});

//Clase Datatabkes
var table = $('.datatable').DataTable( {
    "language": {
    "sProcessing":    "Procesando...",
    "sLengthMenu":    "Mostrar _MENU_ registros",
    "sZeroRecords":   "No se encontraron resultados",
    "sEmptyTable":    "Ningún dato disponible en esta tabla",
    "sInfo":          "Mostrando registros del _START_ al _END_ total de _TOTAL_ registros",
    "sInfoEmpty":     "Mostrando registros del 0 al 0 total de 0 registros",
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
    "iDisplayLength": 5,
    "aLengthMenu": [[5,
    10, 50,100, -1], [5, 10, 50,100, "All"]],
   "dom": '<"top"Bf>rt<"bottom"lip><"clear">',
    buttons: [
        {
            extend:    'copyHtml5',
            text:      '<i class="fa fa-files-o"></i>',
            titleAttr: 'Copy'
        },
        {
            extend:    'excelHtml5',
            text:      '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Excel'
        },
        {
            extend:    'csvHtml5',
            text:      '<i class="fa fa-file-text-o"></i>',
            titleAttr: 'CSV'
        },
        {
            extend:    'pdfHtml5',
            text:      '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'PDF'
        }
    ],
    responsive: true   
   /* orderCellsTop: true,
    fixedHeader: true*/
    /* "order": [[ 1, "asc" ]]*/
} );


var dataSet = [
    [ "storage/products/smartwatch-v8-reloj-inteligente-sport-camara-sd-simcard-2.jpg", "Nombre Producto", "10", "13", "13000", "14000","CATEGORIA DZ","Status","Acciones" ]];

//Clase Datatabkes
$('.datatableProducts').DataTable( {
    "language": {
    "sProcessing":    "Procesando...",
    "sLengthMenu":    "Mostrar _MENU_ registros",
    "sZeroRecords":   "No se encontraron resultados",
    "sEmptyTable":    "Ningún dato disponible en esta tabla",
    "sInfo":          "Mostrando registros del _START_ al _END_ total de _TOTAL_ registros",
    "sInfoEmpty":     "Mostrando registros del 0 al 0 total de 0 registros",
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
    "iDisplayLength": 5,
    "aLengthMenu": [[5,
    10, 50,100, -1], [5, 10, 50,100, "All"]],
     "columnDefs": [
      { "width": "10%", "targets": [2,3] }
    ],
    "search": {
      "caseInsensitive": true
    },
    "order": [[ 16, "desc" ]],
     //dom: 'Blfrtip',
    "dom": '<"top"Bf>rt<"bottom"lip><"clear">',
    buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
      ],
    responsive: true,
    "processing": true,
    "serverSide": true,
    "ajax": "http://localhost/inventio-lite-master/plugins/server_side/scripts/server_processing.php"
       
    //"ajax:":dataSet
   /* orderCellsTop: true,
    fixedHeader: true*/
    /* "order": [[ 1, "asc" ]]*/
} );

//Clase Datatabkes
$('.datatable_home').DataTable( {
    "language": {
    "sProcessing":    "Procesando...",
    "sLengthMenu":    "Mostrar _MENU_ registros",
    "sZeroRecords":   "No se encontraron resultados",
    "sEmptyTable":    "Ningún dato disponible en esta tabla",
    "sInfo":          "Mostrando registros del _START_ al _END_ total de _TOTAL_ registros",
    "sInfoEmpty":     "Mostrando registros del 0 al 0 total de 0 registros",
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
    "iDisplayLength": 10,
    "aLengthMenu": [[10,
    10, 50,100, -1], [10, 10, 50,100, "All"]],
    "dom": '<"top"Bf>rt<"bottom"lip><"clear">',
    buttons: [
        {
            extend:    'copyHtml5',
            text:      '<i class="fa fa-files-o"></i>',
            titleAttr: 'Copy'
        },
        {
            extend:    'excelHtml5',
            text:      '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Excel'
        },
        {
            extend:    'csvHtml5',
            text:      '<i class="fa fa-file-text-o"></i>',
            titleAttr: 'CSV'
        },
        {
            extend:    'pdfHtml5',
            text:      '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'PDF'
        }
    ]         
   /* orderCellsTop: true,
    fixedHeader: true*/
    /* "order": [[ 1, "asc" ]]*/
} );

$('.select2').select2();

//FUNCION DUPLICA LA FILA VISTA TABLA PRODCUTOS 
//$('.datatableProducts').on('click','img',function(){ 

$(document).on("click",".clone", function () {
        var myTr = $(this).closest('tr');
        var clone = myTr.clone();
        myTr.after(clone);
        var id = $( this ).attr('id');
        alert( 'Clicked row id '+id );
        //onsole.log( type );
    } );