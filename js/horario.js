$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'php/cargar_horario.php'
  })
  .done(function(horario_lis){
    $('#Materia').html(horario_lis)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las materias')
  })

})