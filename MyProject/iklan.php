<br>
<br>
<div class='w3-card-4'>

<style>
.mySlides {display:none;}
</style>
<body>

<div class="w3-content w3-third w3-section" style="max-width:395px">
<img class="mySlides w3-animate-top" src="https://afar-production.imgix.net/uploads/images/post_images/images/hRj42VdpbP/original_f069b11ee7cca71315be660838c0daa1.jpg?1470707500?ixlib=rails-0.3.0&auto=format%2Ccompress&crop=entropy&fit=crop&h=719&q=80&w=954" style="width:100%">
  <img class="mySlides w3-animate-left" src="https://2.bp.blogspot.com/-AGmJk7jsuhg/VAMjKqjIT4I/AAAAAAAAG9E/Dzmq0hf-ZqA/s1600/2014-08-31%2B11.50.09.jpg" style="width:100%">
  <img class="mySlides w3-animate-left" src="https://www.vnethomes.com/images/p/710502.jpg" style="width:100%">
  <img class="mySlides w3-animate-right" src="https://www.windowmalaysia.my/jeriq_assets/images/M-8-2.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}
</script>

</body>

<br>

<div class="w3-bar w3-khaki w3-twothird w3-mobile">
    <button class="w3-bar-item w3-button tablink" onclick="opentab(event,'homestay')">
    Homestay Information</button>
    <button class="w3-bar-item w3-button tablink " onclick="opentab(event,'kemudahan')">
    Facilities</button>
    <button class="w3-bar-item w3-button tablink " onclick="opentab(event,'tempatmenarik')">
    Popular Landmarks</button>
</div>
  
  <div id="homestay" class="w3-container w3-twothird w3-border city">
    <h2 style= "color: blue-gray ;">Homestay</h2>
    <hr class='w3-clear'>
    <p><span class="w3-badge w3-pale-red">1</span>Vota Pelangi,Kuta Lombok</p>
    <p><span class="w3-badge w3-khaki">2</span>Pantai Saga,Alor Menin</p>
    <p><span class="w3-badge w3-pale-green">3</span>Semerbak,Kudah Mayot</p>
    <p><span class="w3-badge w3-light-blue">4</span>Tanjung Gantan,Waka Mat</p>
  </div>

  <div id="kemudahan" class="w3-container w3-twothird w3-border city" style="display:none">
    <h2 style= "color: blue-gray ;">Facilities</h2>
    <hr class='w3-clear'>
    <p><span class="w3-badge w3-pale-red">1</span> Spare Mobile Phone<p> 
    <p><span class="w3-badge w3-khaki">2</span> Car Parking Space</p>
    <p><span class="w3-badge w3-pale-green">3</span> WI-FI </p>
    <p><span class="w3-badge w3-light-blue">4</span> Laundries</p>   
    <p></p>
  </div>

  <div id="tempatmenarik" class="w3-container w3-twothird w3-border city" style="display:none">
    <h2 style= "color: blue-gray ;">Popular Landmarks</h2>
    <hr class='w3-clear'>
    <p><span class="w3-badge w3-pale-red">1</span> Selong Belanak Waterfall</p>
    <p><span class="w3-badge w3-khaki">2</span> Pantai Tanjung Wan Beach</p>
    <p><span class="w3-badge w3-pale-green">3</span> Narmada Park</p>
    <p><span class="w3-badge w3-light-blue">4</span> Batu Bolong Temple</p>
  </div>
  
  
</div>


<script>
function opentab(evt, perkara) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-amber", "");
  }
  document.getElementById(perkara).style.display = "block";
  evt.currentTarget.className += " w3-amber";
}
</script>
