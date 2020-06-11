$(document).ready(function() {
	$('#keyword').on('keyup', function() {
		$('#content').load('tampilproduk.php?keyword=' + $('#keyword').val());
	
	})
})


var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && xhr.status == 200) {
		$('#content').innerHTML = xhr.responseText;
	}
}

xhr.open('GET', '../tampilproduk.php?keyword=' + $('#keyword').value, true);
xhr.send();