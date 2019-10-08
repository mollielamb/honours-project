<?php

class paginate_1
{
     function vals()
     {
		<script>
var val = [];
var params = location.search.replace(/^\?/,'').split('&');
for (var i = 0; i < params.length; i += 1) {
	var key_val = params[i].split('=');
	if (key_val.length >= 2) {
		var key = key_val[0];
		val.push(key_val[1]);
				document.getElementById("val").innerHTML = val;
		 <?php $_SESSION['id'] = '<script>document.write(val[0])</script>';?>
	}
}
</script>
	 }
 }