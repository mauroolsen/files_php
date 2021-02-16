<style>
.visuallyhidden {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}
</style>
<form class="form m-2" action="action/upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" id="file-input" onchange="submit()" class="visuallyhidden">
</form>
<button class="file-upload btn btn-primary" onclick="desvio()">UPLOAD</button>

<script>
function desvio() {
  document.getElementById('file-input').click();
}
</script>