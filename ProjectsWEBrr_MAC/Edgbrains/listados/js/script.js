$(document).ready(function() {
    $('#listados').dataTable( {
        "language": {
            "lengthMenu": "Ver _MENU_ resultados por p‡gina",
            "zeroRecords": "Nothing found - sorry",
            "info": "Viendo p‡gina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
} );