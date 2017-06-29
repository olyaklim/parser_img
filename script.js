
$("#form").submit(function(e) {

var site_domain = $('#site_domain').val();

  $.ajax({
   type: "POST",
   url: "parser.php",
   data:{site_domain: site_domain},
   dataType: 'json',
   error: function(data) {
       $('#result').html('<p class="text-error" style="color:#f5345f">Ошибка чтения сайта!</p>'); 
       $('#result_link').html('');
   },
   success: function(data){

   	$('#result').html('<b>Результат: </b>' + data.result); 
    $('#result_link').html('Файл: <a href=\"' + data.link_file + '\" target="_blank"> Открыть файл </a>');  

  }
});

  e.preventDefault();
});