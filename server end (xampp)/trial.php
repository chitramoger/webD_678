<?php
session_start();

?>

<!DOCTYPE HTML>
<html>
<style>

body  {
    background-image: url("2.jpg");
	background-repeat: repeat;
    background-attachment: fixed;
    background-position: center bottom;
	background-color:rgb(120,120,120);
}
.icon{
    padding: 20px;
    font-size: 30px;
    width: 30px;
    text-align: center;
    text-decoration: none;
    border-radius: 50%;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

[draggable] {
  -moz-user-select: none;
  -khtml-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  /* Required to make elements draggable in old WebKit */
  -khtml-user-drag: element;
  -webkit-user-drag: element;
}

.column { 
	height:250px;
	width:500px;
	float:left;
	margin:20px 10px 5px 30px;
	padding:2px;
  
}

.Largo{ 
	width:500px;
}

.amarelo{ 
	background:#DAA520; 
}

.vermelho{ 
	background:#CD0000; 
} 

.azul{ 
	background:#4682B4; 
} 

.verde{ 
	background-color: #2E8B57; 
}

.column.dragElem {
  opacity: 0.4;
}
.column.over {
  //border: 2px dashed #000;
  border-top: 2px solid blue;
}

	</style>
<body>	

<button class="button button1 ">home</button>
<button class="button button2"> <a href="login.php"> login </a></button>
<button class="button button2">help</button>
<button class="button button2 "> <a href="signup.php"> sign up </a> </button>
<button class="button button2">save preferences</button>
	
	
<div id="columns">
  <div class="column Largo verde " draggable="true"><img src="download.png" class="icon"><header >GMAIL</header></div>
  <div class="column amarelo " draggable="true"><img src="skype.png" class="icon"><header>SKYPE</header></div>
  <div class="column Largo  vermelho" draggable="true"><img src="camera.png" class="icon"><header>CAMERA</header></div>
  <div class="column  azul" draggable="true"><img src="settings.png" class="icon"><header>SETTINGS</header></div>
  <div class="column Largo verde" draggable="true"><img src="news.png" class="icon"><header>NEWS</header></div>
  <div class="column vermelho" draggable="true"><img src="play.png" class="icon"><header>PLAYSTORE</header></div>
  <div class="column verde" draggable="true"><img src="photo.png" class="icon"><header>PHOTOS</header></div>
  <div class="column Largo vermelho" draggable="true"><img src="calendar1.png" class="icon"><header>CALENDER</header></div>
  <div class="column amarelo" draggable="true"><img src="weather.jpg" class="icon"><header>WEATHER</header></div>
  <div class="column Largo azul" draggable="true"><img src="map.png" class="icon"><header>MAPS</header></div> 
</div>


</body>
<script>
var dragSrcEl = null;

function handleDragStart(e) {
  // Target (this) element is the source node.
  dragSrcEl = this;

  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.outerHTML);

  this.classList.add('dragElem');
}
function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault(); // Necessary. Allows us to drop.
  }
  this.classList.add('over');

  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

  return false;
}

function handleDragEnter(e) {
  // this / e.target is the current hover target.
}

function handleDragLeave(e) {
  this.classList.remove('over');  // this / e.target is previous target element.
}

function handleDrop(e) {
  // this/e.target is current target element.

  if (e.stopPropagation) {
    e.stopPropagation(); // Stops some browsers from redirecting.
  }

  // Don't do anything if dropping the same column we're dragging.
  if (dragSrcEl != this) {
    // Set the source column's HTML to the HTML of the column we dropped on.
    //alert(this.outerHTML);
    //dragSrcEl.innerHTML = this.innerHTML;
    //this.innerHTML = e.dataTransfer.getData('text/html');
    this.parentNode.removeChild(dragSrcEl);
    var dropHTML = e.dataTransfer.getData('text/html');
    this.insertAdjacentHTML('beforebegin',dropHTML);
    var dropElem = this.previousSibling;
    addDnDHandlers(dropElem);
    
  }
  this.classList.remove('over');
  return false;
}

function handleDragEnd(e) {
  // this/e.target is the source node.
  this.classList.remove('over');

  /*[].forEach.call(cols, function (col) {
    col.classList.remove('over');
  });*/
}

function addDnDHandlers(elem) {
  elem.addEventListener('dragstart', handleDragStart, false);
  elem.addEventListener('dragenter', handleDragEnter, false)
  elem.addEventListener('dragover', handleDragOver, false);
  elem.addEventListener('dragleave', handleDragLeave, false);
  elem.addEventListener('drop', handleDrop, false);
  elem.addEventListener('dragend', handleDragEnd, false);

}

var cols = document.querySelectorAll('#columns .column');
[].forEach.call(cols, addDnDHandlers);

</script>

