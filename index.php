<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="stylesheet" href="styles/styles.css" type="text/css">
	</head>
	<body id="body">
<!----------------------------------------------------------------------------->	
	<?php include "php_script/db_connect.php" ?>
<!------------------------------ меню начало ---------------------------------->	
	<?php include "header.php" ?>
		<div class="result"></div>
<!------------------------------ меню конец ----------------------------------->		
	<?php include "books.php"; #элемент книга ?>		
	</body>
<!----------------------------------------------------------------------------->
	<script src="js/js.js"></script>
<!---------------------------- поиск по автору начало ------------------------->
	<script>
	$('#av_find').click(function(){
		
		var $this = $('#av_name'),
    	val = $this.val();
		
		if(val.length < 1)
			{
				document.getElementById('defult_books').style.display = 'block';
				document.getElementById('av_find_result').style.display = 'none';
			}
		else
			{
				$.post("php_script/find_author.php",
					{
						author_name: $('[name="author_name"]').val()
					}, 

					function( data ) 
						{
							$( ".result" ).html(data);
						}

				);
				document.getElementById('defult_books').style.display = 'none';
			}			
	});
</script>
<!---------------------------- поиск по автору конец -------------------------->
<!---------------------------- поиск по жанру начало -------------------------->

<!---------------------------- поиск по жанру конец --------------------------->
</html>
