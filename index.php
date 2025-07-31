<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ZooParc Zoological System</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.css">

</head>
<body>
  <?php include './components/nav.php' ?>
 
  <!-- Home Top -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./Images/tiger.jpg" class="d-block w-100" alt="tiger">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-1 fw-bold">Welcome to ZooParc</h1>
          <p class="fs-2 fw-bold">We make people closer to Nature</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./Images/Asian-elephant.jpg" class="d-block w-100" alt="Asian-elephant">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-1 fw-bold">Welcome to ZooParc</h1>
          <p class="fs-2 fw-bold">We make people closer to Nature</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./Images/panda.jpg" class="d-block w-100" alt="panda">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-1 fw-bold">Welcome to ZooParc</h1>
          <p class="fs-2 fw-bold">We make people closer to Nature</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Text about ZooParc -->
  <div class="container-fluid m-2 p-1">
    <p class="text-center text-white bg-dark">ZooParc has become essential in the improvement of both visitors and the park staff experience. 
      For the visitors, the system serves as an efficient way of integrating the appreciation of the variety of animals on display with booking their visits and attending learning and social activities. 
      This unique interactive method does not only serve to educate them on the wildlife but also encourages them to invest in protecting it and its habitats.</p>
  </div>

  <!-- Membership -->
  <div class="card text-center bg-dark-subtle m-3 p-3">
    <div class="card-header">
      <h2 class="bw-bold">Membership</h2>
    </div>
    <div class="card-body">
      <h4 class="card-title text-success fw-semibold">Join Our Pride!</h4>
      <p class="card-text">Getting a membership with the ZooParc Zoological System allows wildlife lovers and conservationists to enjoy a fulfilling experience.
        You will be given free access to the park for as many days as you want and for as long as you want thanks to the membership package that you would acquire. 
        This indicates that you can enjoy the different animals.</p><br>

        <!-- Benefits -->
        <h4 class="card-text text-start text-decoration-underline">Benefits of getting Membership</h4><br>
        <ul class="card-text">
          <li class="text-start fst-italic">Early access to events</li>
          <li class="text-start fst-italic">Discounts on special programs</li>
          <li class="text-start fst-italic">Invitations to members-only activities</li>
          <li class="text-start fst-italic">Allow you to engage more deeply with the park’s educational initiatives and conservation efforts</li>
        </ul>

        <p class="card-text">Further, such membership aids the operations of the ZooParc as some of the fees charged goes towards the feeding of the animals, the maintaining of the habitats, 
          and the promotion of wild education. In taking the membership, you are improving your experience and also the fight for the conservation of wildlife within 
          the park and enhancement of biodiversity is supported.</p>

        <p class="card-text">As a result, the membership with the ZooParc Zoological System opens the door to a future with effective scientific expeditions, studies and influence towards improving the state of conservation worldwide.</p>
      <img src="./Icons/logo1.png" alt="logo" width="110px">
    </div>
  </div>
  <!--Images-->
  <div class="container-fluid m-2">
    <img src="./Images/wild-tiger-nature.jpg" class="rounded float-start" alt="tiger" width="33%" height="100%">
    <img src="./Images/realistic-deer.jpg" class="rounded float-end" alt="deer" width="33%">
    <img src="./Images/eagle.jpg" class="rounded mx-auto d-block" alt="eagle" width="33%">
  </div>
  
  <?php include './components/footer.php' ?>

  <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>