<nav class="navbar navbar-dark bg-primary navblock">
	<div class="menu">
		<a class="nav-link item" href="#" id="a_fil">ФИЛЬТР</a>
	</div>	
	<div class="find">
		<input type="text" name="author_name" id="av_name">
		<button id="av_find">найти</button>
	</div>	
</nav>
<div id="filtr" style="display: none">
<form>
	<table style="float:left">
		<tr>
<?php
	$zap1 = "select * from genre";
	$zap1 = (string)$zap1;

	$result1 = mysql_query($zap1, $conn)
		or die ("zap1 no!".mysql_error());

$a = 1;

	while ($data1 = mysql_fetch_array($result1, MYSQL_BOTH))
	{
echo <<<here
		<td class="genre_filtr"><input type="checkbox" id="genre_input" name="check_genre" value="$data1[0]">$data1[1]</td>
here;
		if (fmod($a, 3) == 0)
		{
			echo "</tr><tr>";
		}
		$a++;
	}
?>
		</tr>
	</table>
	<input id="myBut" type="button" value="Найти1">
</form>


<script>
	
		myBut.onclick = function ()
		{
			var inp = document.getElementsByTagName('input');
			var length = inp.length;
			var mas = [];
			for (var i = 0; i < length; i++)
			if (inp[i].checked) {
				mas.push(inp[i].nextSibling.textContent);
			}

			$.ajax({
			   type: "POST",
			   data: {info:mas},
			   url: "php_script/find_genre.php",
			   success: function(msg){
				 $('.result').html(msg);
			   }
			
			});
			document.getElementById('defult_books').style.display = 'none';
		}
	
</script>


</div>
