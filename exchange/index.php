<!DOCTYPE html>
<html>
<title>Caramel Capital</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<body>

<?php 
  include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
?>

<!-- Header with full-height image -->
<div class="w3-container" style="padding:128px 16px;background-color:black" id="home">
  <div class="w3-center">
    <br>
    <br>
    <br>
    <h1 id="title">CARAMEL CAPITAL</h1>
    <h3 style="color:#D9D9D9;">Caramel Capital is an investment firm focused on loans, liquidity providing,  <br> decentralized finance and stocks.</h3>
    <br>
    <br>  
    <br>  
    <br>
    <br>    
    <br>
    <br>
    <a href="https://www.pablogalve.com/invest/equity/market-pro" class="w3-button w3-xlarge w3-round-xxlarge" id="get_started_button">GET STARTED</a>
  </div>
</div>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px;color:#D9D9D9;" id="we_offer">
  <h3 class="w3-center">We offer these deals:</h3>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-half">
      <img src="images/circular_graph.png" alt="" class="what_we_offer_image">
      <p class="w3-large"><b>Invest in Equity</b></p>
      <p class="text">Highest-risk as well as highest-reward investment. You become a business co-owner, therefore you can expect to earn between 8-20% annually. However, as a business owner you don’t only participate in the gains but also in losses, therefore there is a risk that you could even lose principal.</p>
    </div>
    <div class="w3-half">
      <img src="images/loan.png" alt="" class="what_we_offer_image">
      <p class="w3-large"><b>Invest in Loans</b></p>
      <p class="text">By investing into fixed-interest loans you become the bank by providing funding for business operations. Your investment is always collaterallized by company’s assets, which in case of default will protect your investment. You can expect to earn a guaranteed 2-4% interest annually.</p>
    </div>
  </div>
</div>

<!-- Empower Projects Section -->
<div class="w3-container" style="padding:128px 16px" id="empower_projects">
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-half">
      <img src="images/help_eachother.png" alt="" class="image">
    </div>
    <div class="w3-half">
      <h1><b>We empower projects</b> that <br> improve the lives of millions of people</h1>
      <p class="text"><b>We invest in projects that have the potential of scaling while respecting both the ecosystem and their workforce.</b>
      <br><br>
      Join us now to grow your savings while leaving a positive impact on the world</p>
      <a href="https://www.pablogalve.com/invest/equity/market-pro" class="w3-button w3-xlarge w3-round-xxlarge" id="get_started_button">GET STARTED</a>
    </div>
  </div>
</div>

<!-- New To Investments Section -->
<div class="w3-container" style="padding:128px 16px" id="new_to_investments">
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-half">
      <h1><b>New to investments?</b> No problem</h1>
      <p class="text"><b>Caramel Capital gives you the power to hit the ground running</b>, no matter your experience level.
        An intuitive experience from the start.
        <br><br>
        From day one, we designed and built an investment platform for newcomers and experts alike.
        <br><br>
        Everything you need to succeed at your fingertips thanks to our user-friendly interface</p>
        <a href="https://www.pablogalve.com/invest/equity/market-pro" class="w3-button w3-xlarge w3-round-xxlarge" id="get_started_button">GET STARTED</a>
    </div>
    <div class="w3-half">
      <img src="images/shake_hands.png" alt="" class="image">
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>  
  <p>Powered by <a href="https://www.pablogalve.com" title="Caramel Group" class="w3-hover-text-green">Caramel Group</a></p>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
