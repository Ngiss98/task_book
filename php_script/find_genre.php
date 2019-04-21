<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="stylesheet" href="styles/styles.css" type="text/css">
	</head>
	<body>
<div id="genre_find_result">
<?php
	include "db_connect.php";
	
	
	
$aMas = $_POST['info'];	

for($i = 0; $i<6; $i++)
	{
		if ($aMas[$i] == null)
		{
			$aMas[$i] = $mas[0];
		};
	};
	
#------------------------------------- начало 1 запроса ---------------------------------------
	$zap1 = "
	select
		book.id_book,
		book.name,
		book.img,
		book.description
	from
		book,
		book_genre,
		genre
	where
		book_genre.id_book = book.id_book and
		book_genre.id_genre = genre.id_genre and
		genre.genre = '$aMas[0]' or
		genre.genre = '$aMas[1]' or
		genre.genre = '$aMas[2]' or
		genre.genre = '$aMas[3]' or
		genre.genre = '$aMas[4]' or
		genre.genre = '$aMas[5]'
	group by book.id_book";
	$zap1 = (string)$zap1;

	$result1 = mysql_query($zap1, $conn)
		or die ("no!".mysql_error());

	while ($data1 = mysql_fetch_array($result1, MYSQL_BOTH))
	{
#------------------------------------- начало 2 запроса ---------------------------------------
		$zap2 = "
		select 
			genre.genre
		from
			book_genre,
			genre
		where
			book_genre.id_book = $data1[0] and
			book_genre.id_genre = genre.id_genre";
		$zap2 = (string)$zap2;
		
		$result2 = mysql_query($zap2, $conn)
		or die ("zap2 no!".mysql_error());
#------------------------------------- конец 2 запроса ----------------------------------------
#------------------------------------- начало 3 запроса ---------------------------------------
		$zap3 = "
		select 
			author.name
		from
			book_author,
			author
		where
			book_author.id_book = $data1[0] and
			book_author.id_author = author.id_author";
		$zap3 = (string)$zap3;
		
		$result3 = mysql_query($zap3, $conn)
		or die ("zap3 no!".mysql_error());
#------------------------------------- конец 3 запроса ----------------------------------------

		
echo <<<here
<div class="book container col-md-6">
	<table>
		<tr>
			<td rowspan="4"><img src="$data1[img]" alt=""></td>
			<td class="left_tabel">$data1[1]</td>
		</tr>
		<tr>
			<td class="left_tabel"><p class="description">
				$data1[3]
			</p>
			</td>
		</tr>
		<tr>
			<td class="left_tabel"><p id="genre$data1[0]" style="display: none">
here;
		while ($data2 = mysql_fetch_array($result2, MYSQL_BOTH))
		{
echo <<<here
			$data2[0]; 
here;
		}
echo <<<here
			</p><p id="a_genre$data1[0]" onclick="change()" class="spoiler">спойлер</p></td>
		</tr>
	<script type="text/javascript">
		$('#a_genre$data1[0]').click(function(){
			document.getElementById('genre$data1[0]').style.display = 'block';
			document.getElementById('a_genre$data1[0]').style.display = 'none';
		});
	</script>
		<tr>
			<td class="left_tabel"><p id="author$data1[0]" style="display: none">
here;
		while ($data3 = mysql_fetch_array($result3, MYSQL_BOTH))
		{
echo <<<here
			$data3[0]; 
here;
		}
echo <<<here
			</p><p id="a_author$data1[0]" onclick="change()" class="spoiler">спойлер</p></td>
		</tr>
	<script type="text/javascript">
		$('#a_author$data1[0]').click(function(){
			document.getElementById('author$data1[0]').style.display = 'block';
			document.getElementById('a_author$data1[0]').style.display = 'none';
		});
	</script>
	</table>
</div>
<br>
here;
		
		
	}
#------------------------------------- конец 1 запроса ----------------------------------------			
		
?>	
		</div>	
	</body>
</html>
