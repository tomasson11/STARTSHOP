<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    
    
    <title></title>
<style>
/*estilos para la tabla*/
table th {
    background-color: #22a593 !important;
    color: white;
}

/* En el caso de necesitar alinear "select de cantidad de registros" y "cuadro de busqueda" */
/* div.dataTables_filter,
div.dataTables_length {
  display: inline-block;
  margin-left: 1em;
} */
</style>

  </head>
  <body>
    <h1 class="ui header">Datatables - Estilo Semantic-UI</h1>    
                
    <table id="example" class="ui celled table" style="width:100%">
               
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

      
      
    <script>
    $(document).ready(function() {
        $('#example').DataTable({             
            //dom: 'lfrtip'
            //dom:  'lrtip' //ejemplo 1 - sin cuadro de busqueda
            //dom: '<"wrapper"flipt>' // ejemplo 2 - establecemos un contenedor para las opciones  
            //dom: '<lf<t>ip>'  //ejemplo 3 - arriba : Longitud y cuadro de busqueda, abajo: información y paginación, la Tabla en el centro 
           //dom: '<"top"i>rt<"bottom"flp><"clear">' //ejemplo 4    
        });  
     });   
    </script>

      
  </body>
</html>