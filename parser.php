
<?php

$data = json_decode($_POST['jsonData']);

//создаем объект DateTime с текущей датой
$date = date_create();

// открываем файл, если файл не существует,
//делается попытка создать его
$file_name = "result/parse_".date_format($date, 'YmdHis.u').".txt";
$fp = fopen($file_name, "w");

require ('phpQuery/phpQuery.php');

$site_domain = $_POST['site_domain'];

$habrablog 	= file_get_contents($site_domain);
$document 	= phpQuery::newDocument($habrablog);
$hentry 	= $document->find('img');

$count_jpg = 0;
$count_png = 0;
$count_gif = 0;

foreach ($hentry as $article) {

	$article = pq($article);
	$img = $article->attr('src');

	if (isset($img)) {

		$info = new SplFileInfo($img);
      	$img_type = $info->getExtension();

		if ($img_type == 'jpg') {
			$count_jpg ++;
		}
		elseif ($img_type == 'png') {
			$count_png ++;
		}
		elseif ($img_type == 'gif') {
			$count_gif ++;
		}
		else {
			continue;
		}

		// записываем в файл текст
		fwrite($fp, $img."\r\n");

	}
	
}

// закрываем
fclose($fp);

$result = "<br> количество jpg:" . (string) $count_jpg . "<br> количество png: " . (string) $count_png . "<br> количество gif: " . (string) $count_gif;	


$result = array(
	'result'  => $result,
	'link_file' => $file_name
	);

echo json_encode($result);

