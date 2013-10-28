<?php

include 'db.php';
include 'macro/header.php';

?>

<!DOCTYPE html>
<html>
<head>
<script src="validate.js"></script>
<title>Title</title>
</head>

<body>
	<form method="post" action="reg.php" onsubmit="return validateCard(num.value, name.value)" name="regform">
		<input type="number" placeholder="nomor kartu" id="num" name="num" onkeypress="if (this.value != '') validate('number', this.value, 'valnum')" required /><div id="valnum"></div><br />
		<input type="text" placeholder="nama kartu" id="name" name="name" onkeypress="if (this.value != '') validate('name', this.value, 'valname')" required /><div id="valname"></div><br />
		<input type="date" id="date" name="date" required /><br />
		<input type="submit" />
	</form>
	<button type="button" onclick="location.href='index.php'">Skip</button>
</body>
</html> 