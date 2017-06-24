<html>
<!-- This script runs a timed get query to display.php -->
 <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script>

 $(document).ready(function() {
	refreshTable();
	});


function refreshTable(){
$("#tableHolder").load("display.php",function(){
	setTimeout(refreshTable, 500);
	
});
}

</script>

<body>
<h3 align="center">Wavemeter</h3>
<!-- this is the div that display.php is being placed and refreshed -->
<div id="tableHolder" align="center">

</div>
</body>
</html>