$(document).ready( function () {
    var table = $('#table').DataTable();
    $('#min').keyup( function() { table.draw(); } );
    $('#max').keyup( function() { table.draw(); } );
} );
