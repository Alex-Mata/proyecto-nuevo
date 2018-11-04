$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'php/cargar_docente.php'
  })
  .done(function(docente_lis){
    $('#Docente').html(docente_lis)
  })
  .fail(function(){
    alert('Hubo un errror al cargar los docentes')
  })

})