<html lang="en">
<head>
<meta charset="utf-8">
<title>Auspost Postcode search</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
$(function() {
$("#postcode").autocomplete({
minLength:3, //minimum length of characters for type ahead to begin
source: function (request, response) {
$.ajax({
type: 'POST',
url: 'auspost.php', //your server side script
dataType: 'json',
data: {
postcode: request.term
},
success: function (data) {
//if multiple results are returned
if(data.localities.locality instanceof Array)
response ($.map(data.localities.locality, function (item) {
return {
label: item.location + ', ' + item.postcode,
value: item.location + ', ' + item.postcode
}
}));
//if a single result is returned
else
response ($.map(data.localities, function (item) {
return {
label: item.location + ', ' + item.postcode,
value: item.location + ', ' + item.postcode
}
}));
}
});
}
});
});
</script>
</head>
<body>
<form action="auspost.php" method="post">
<label for="postcode">Postcode:
<input name="postcode" id="postcode" type="text">
</label>
<input type="submit" value="submit" />
</form>
</body>
</html>