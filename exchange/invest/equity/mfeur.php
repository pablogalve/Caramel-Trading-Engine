<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.close {
  cursor: pointer;
  position: absolute;
  top: 50%;
  right: 0%;
  padding: 12px 16px;
  transform: translate(0%, -50%);
}

.close:hover {background: #bbb;}
</style>
</head>
<body>

<h2>Closable List Items</h2>
<p>Click on the "x" symbol to the right of the list item to close/hide it.</p>

<ul>
  <li>Adele</li>
  <li>Agnes<span class="close">&times;</span></li>

  <li>Billy<span class="close">&times;</span></li>
  <li>Bob<span class="close">&times;</span></li>

  <li>Calvin<span class="close">&times;</span></li>
  <li>Christina<span class="close">&times;</span></li>
  <li>Cindy</li>
</ul>

<script>
var closebtns = document.getElementsByClassName("close");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';//TODO
  });
}
</script>

</body>
</html>
