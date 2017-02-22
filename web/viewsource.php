<?php
if(isset($_GET["redirecturl"])){
$homepage = file_get_contents(urldecode($_GET["redirecturl"]));
?>
<textarea disabled="true" style="border: none;background-color:white; width:100%; height:100%">
    <?php echo $homepage; ?>
</textarea
<?php
}else{

?>

<input type="text" style="width:800px; height:40px" id="url"/> <input type="button" value="GO" onclick="redirecturl()"/>


<script>
function redirecturl(){
var url = document.getElementById("url").value;
alert(url);
window.location.href = window.location.href+'?redirecturl=' + encodeURIComponent(url);
}
</script>


<?php
}
?>