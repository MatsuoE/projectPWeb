<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/signin.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("/dashboard_template") }}/plugins/fontawesome-free/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bandung Elektronika | {{ $title }}</title>
</head>
<body>
  @include('partial.navbar')
  <img src="/img/bandung.png" class="rounded mx-auto d-block mt-3" alt="Bandung Elektronika">
  <div class="container">
      @yield('container')
  </div>
    <div class="sticky-bottom">
    <footer class="bg-dark text-white mt-3">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Bandung Elektronika</h5>
            <p>
              Penjelasan mengenai bandung elektronika seperti alamat, berdirinya, dan lain-lain tinggal mengisi mengarang dan mencari di internet
            </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Follow Us</h5>
            <div class="col">
              <a class="" href="#"><i class=""></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Website</h5>
            <ul class="list-unstyled mb-0">
              <li>
                <a href="product" class="text-white">Products</a>
              </li>
              <li>
                <a href="aboutus" class="text-white">About Us</a>
              </li>
            </ul>
          </div>
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright Bandung Elektronika
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>