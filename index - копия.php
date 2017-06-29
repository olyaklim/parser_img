
<!DOCTYPE HTML>
<html lang="ru">
<html>
<head>
  <meta charset="utf-8">
  <title>parser</title>
 <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 Bootstrap
  <link href="stylesheet/bootstrap.min.css" rel="stylesheet">
  <link href="stylesheet/my.css" rel="stylesheet"> -->
  
</head>
<html>
<body>

<?php
	//создаем объект DateTime с текущей датой
	$date = date_create();
	
	// открываем файл, если файл не существует,
	//делается попытка создать его
	$fp = fopen("result/parse_".date_format($date, 'YmdHis.u').".txt", "w");

  require ('phpQuery/phpQuery.php');

  $site_domain = 'https://tproger.ru';

  $habrablog = file_get_contents($site_domain);
  $document = phpQuery::newDocument($habrablog);
  $hentry = $document->find('img');
  
  $countjpg = 0;
  $countpng = 0;
  $countgif = 0;

  foreach ($hentry as $article) {

    $article = pq($article);
    $img = $article->attr('src');

    // $pos = strpos($img, $site_domain);
    // if ($pos === false) {
    //   echo "Строка '$findme' не найдена в строке '$mystring1'";
    // } else {
    //   echo "Строка '$findme' найдена в строке '$mystring1'";
    //   echo " в позиции $pos";
    // }
    //$img  = $article->find('img')->attr('src');

// jpg-10,png-0,gif-5
    

    if (isset($img)) {
      var_dump($img);
      echo '<br>';

     $info = new SplFileInfo($img);
      var_dump($info->getExtension());
      echo '<br>';

      if ($info->getExtension() == 'jpg') {
        $countjpg ++;
      }
       if ($info->getExtension() == 'png') {
        $countpng ++;
      }
       if ($info->getExtension() == 'gif') {
        $countgif ++;
      }

    }

    // записываем в файл текст
	fwrite($fp, $img."\r\n");
	
  }

  // закрываем
	fclose($fp);

   echo '<br><br>';
   echo ' Колво jpg ';
   echo $countjpg;

   echo '<br><br>';
   echo ' Колво png ';
   echo $countpng;

   echo '<br><br>';
   echo ' Колво gif ';
   echo $countgif;
	 
	
	

  
?>

<!-- <script src="js/bootstrap.min.js"></script> -->
  
</body>
</html>