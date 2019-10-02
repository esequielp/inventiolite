function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}

$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut();;
  });

$("#twitter").hide();
$("#twitter2").hide();
$("#twitter3").hide();
$('.select2').select2();

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

//Eliminar imagenes update product
$(document).on("click",".del_img", function () {
//$( ".del_img" ).click(function() {

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
  $(this).parents('.thumbnail').remove();

}
 
});


//Eliminar Divisas, etc
$(document).on("click",".del_item", function () {
//$( ".del_img" ).click(function() {


var title = $(this).attr('title');

//ELIMINAR IMAGEN VISTA EDITAR PRODUCTOS
var txt;
var r = confirm("Esta Seguro de eliminar esta " + title + " ?");
if (r == true) {
  return true;
}else{
  return false;  
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
   "order": [[ 0, "desc" ]],
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
//TABLE HOME PRODUCT ALERT STOCK
$('.datatableHome').DataTable( {
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
/*     "columnDefs": [
      { "width": "10%", "targets": [2,3] }
    ],*/
    "columnDefs": [
            {
                "targets": [ 6 ],
                "visible": false
            }],
    "search": {
      "caseInsensitive": false
    },
    //"order": [[ , "desc" ]],
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
    "ajax": getAbsolutePath()+"/plugins/server_side/scripts/server_home_view.php",
      "rowCallback": function( row, data, index ) {
      
        var sinStock = data[6] ;

        if ( sinStock  == 'Sin Stock')
        {
          $('td', row).addClass('danger');
        }
        else
        {
          $('td', row).addClass('warning');
        }
      }
    //"ajax:":dataSet
   /* orderCellsTop: true,
    fixedHeader: true*/
    /* "order": [[ 1, "asc" ]]*/
} );
//TABLE PRODUCTS VIEW
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
/*     "columnDefs": [
      { "width": "10%", "targets": [2,3] }
    ],*/
    "search": {
      "caseInsensitive": false
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
    "ajax": getAbsolutePath()+"/plugins/server_side/scripts/server_product_view.php"
       
    //"ajax:":dataSet
   /* orderCellsTop: true,
    fixedHeader: true*/
    /* "order": [[ 1, "asc" ]]*/
} );

//OCULTAR CAMPOS DE TABLE PRODUCTS 

//OJO ARREGLAR PARA QUE SOLO SALGA EN TABLE PRODUCTS VIEW
//$('.top').append('<b>Ocultar columnas</b>: <a class="toggle-vis" data-column="3">Descripcion</a> - <a class="toggle-vis" data-column="4">Atributos</a> - <a class="toggle-vis" data-column="5">Categoria</a> - <a class="toggle-vis" data-column="6">Costo($)</a> - <a class="toggle-vis" data-column="7">P-Venta($)</a> - <a class="toggle-vis" data-column="8">P-Venta(Bs)</a>');

 $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
        var table = $('.datatableProducts').DataTable();
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
         
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );

 $('.datatableProducts tfoot th').each( function () {
        var title = $(this).text();
        if ( title !='Cod' &&  title !='Nombre' && title !='Descripcion' && title !='Atributos' && title !='Categoria' ) {
         
        }else{
           $(this).html( '<input type="text" class="text_search" placeholder="Buscar" />' );
        }
        
    } );

 // DataTable
    var table = $('.datatableProducts').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


/* activate the carousel */
$("#modal-carousel").carousel({interval:false});

/* change modal title when slide changes */
$("#modal-carousel").on("slid.bs.carousel", function (e) {
  e.preventDefault();
  e.stopPropagation();
   var repo = $("#img-repo .item");
    var repoCopy = repo.filter("#" + id).clone();
    var active = repoCopy.first();

    active.addClass("active");
  $(".modal-title").html($(this).find(".active img").attr("title"));
})
//TABLE INVENTARY VIEW
$('.datatableInventary').DataTable( {
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
/*     "columnDefs": [
      { "width": "10%", "targets": [2,3] }
    ],*/
    "columnDefs": [
            {
                "targets": [ 5 ],
                "visible": false
            }],
    "search": {
      "caseInsensitive": false
    },
    //"order": [[ , "desc" ]],
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
    "ajax": getAbsolutePath()+"plugins/server_side/scripts/server_inventary_view.php",
      "rowCallback": function( row, data, index ) {
      
        var sinStock = data[5] ;

        if ( sinStock  == 'Sin Stock')
        {
          $('td', row).addClass('danger');
        }
        else
        {
          $('td', row).addClass('warning');
        }
      }
       
    //"ajax:":dataSet
   /* orderCellsTop: true,
    fixedHeader: true*/
    /* "order": [[ 1, "asc" ]]*/
} );



   //FUNCION QUE MUESTRA EL MODAL CON LAS IMAGENES
  //$(".row .thumbnail").click(function(){
  $(document).on("click",".thumbnail", function (e) {
    e.preventDefault();
    e.stopPropagation();

    var id = $(this).attr('id');
    //alert(id);
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
