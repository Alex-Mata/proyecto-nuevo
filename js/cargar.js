$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'php/cargar.php'
  })
  .done(function(docentes){
    $('#nombreProfesor').html(docentes)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })
})
