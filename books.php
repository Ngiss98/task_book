<div id="defult_books">
<?php
#------------------------------------- начало 1 запроса ---------------------------------------
	$zap1 = "select * from book";
	$zap1 = (string)$zap1;

	$result1 = mysql_query($zap1, $conn)
		or die ("zap1 no!".mysql_error());

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
			<td rowspan="4"><img src="$data1[2]" alt=""></td>
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
