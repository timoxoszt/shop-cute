<?php
session_start();
if (!isset($_SESSION['username']))
  die(header("location: login.php"));
$text = '';
$name = ["Doraemon", "Pikachu", "Qoobee", "Bò chăm chỉ", "Heo nằm ngủ", "Cú dễ thương", "Mèo dễ thương", "Kỳ lân nằm ngủ"];
for ($i = 0; $i < count($name); $i++) {
  $text = $text . "
      <div class='col'>
          <div class='card'>
              <img src='/img/item" . strval($i + 1) . ".jpg' class='card-img-top' alt='...'>
              <div class='card-body'>
                  <h5 class='card-title'>" . $name[$i] . "</h5>
                  <p class='card-text'>Gấu bông " . $name[$i] . " 20cm</p>
                  <div class='wrapper-btn'>
                      <button class='btn btn-primary' onclick='showBuy()'>Buy</button>
                  </div>
              </div>
          </div>
      </div>";
}
include "header.html"
?>


<html>

<head>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">
      <img src="/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">

    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav navbar-right">
      </ul>
    </div>

    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-outline-light my-2 my-sm-0" href="logout.php">Sign Out</a>
    </form>
  </nav>
  <h2>
    <div id="message" color="red"></div>
  </h2>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thank you for purchase</strong> We will contact you soon for more detail
    <button type="button" class="close" aria-label="Close" onclick=hideBuy()>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="container text-center">
    <h1>
      Welcome back, <?php echo $_SESSION['username']; ?>.
      
    </h1>
  </div>
  <div class="container">
    <div class="shop-body row row-cols-4">
      <?php echo $text; ?>
    </div>
  </div>
  <script>
  $(document).ready(function() {
    $('.alert').hide();
    document.getElementsByClassName('warning-container')[0].style.visibility = 'hidden';
  });

  function showBuy() {
    $('.alert').show();
    document.querySelector(".alert").scrollIntoView({
      behavior: 'smooth'
    });
  }

  function hideBuy() {
    $('.alert').hide();
  }
</script>
</body>

</html>