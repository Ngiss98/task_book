$('#a_fil').click(function()
	{
	if(document.getElementById('filtr').style.display == 'none')
			{
				document.getElementById('filtr').style.display = 'block';
				document.getElementById('body').style.paddingTop = 136;
			}
		else
			{
				document.getElementById('filtr').style.display = 'none';
				document.getElementById('body').style.paddingTop = 56;
			}
	});

