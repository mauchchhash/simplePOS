<!DOCTYPE html>
<html>

  <head>
    <title>Bootstrap 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>

  <body>
    <header class="header">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="/home">MyShop</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                                                                                                    aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/home">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <!-- <li class="nav&#45;item"> -->
              <!--   <a class="nav&#45;link" href="#">Link</a> -->
              <!-- </li> -->
              <!-- <li class="nav&#45;item dropdown"> -->
              <!--   <a class="nav&#45;link dropdown&#45;toggle" href="#" id="navbarDropdown" role="button" data&#45;toggle="dropdown" aria&#45;haspopup="true" -->
              <!--                                                                                                         aria&#45;expanded="false"> -->
              <!--     Dropdown -->
              <!--   </a> -->
              <!--   <div class="dropdown&#45;menu" aria&#45;labelledby="navbarDropdown"> -->
              <!--     <a class="dropdown&#45;item" href="#">Action</a> -->
              <!--     <a class="dropdown&#45;item" href="#">Another action</a> -->
              <!--     <div class="dropdown&#45;divider"></div> -->
              <!--     <a class="dropdown&#45;item" href="#">Something else here</a> -->
              <!--   </div> -->
              <!-- </li> -->
              <!-- <li class="nav&#45;item"> -->
              <!--   <a class="nav&#45;link" href="#">Disabled</a> -->
              <!-- </li> -->
              <!-- <li> -->
                <form id='logout-form' action="/logout" method='POST'>
                  @csrf
                  <button class="btn btn-link text-white" type='submit'>Logout</button>
                </form>
              </li>
            </ul>
            <!-- <form class="form&#45;inline my&#45;2 my&#45;lg&#45;0"> -->
            <!--   <input class="form&#45;control mr&#45;sm&#45;2" type="search" placeholder="Search" aria&#45;label="Search"> -->
            <!--   <button class="btn btn&#45;outline&#45;success my&#45;2 my&#45;sm&#45;0" type="submit">Search</button> -->
            <!-- </form> -->
          </div>
        </nav>
      </div>
    </header>
    <section class="navigation">
      <div class="container">
        <nav class="navigation-nav">
          <ul class="nav justify-content-center">
            <!-- <li class="nav&#45;item active"> -->
            <!--   <a class="nav&#45;link" data&#45;toggle="modal" data&#45;target="#modal&#45;example" href="#">Add Product</a> -->
            <!-- </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Update Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Delete Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Make Order</a>
            </li>
          </ul>
        </nav>
      </div>
    </section>
    <main class="main-content my-5">
      <div class="container">

        @yield('content')

      </div>
    </main>
    <!-- <footer class="footer"> -->
    <!--     <div class="container"> -->
    <!--         <div class="row"> -->
    <!--             <div class="col&#45;lg&#45;12"> -->
    <!--                 <p class="text&#45;center">Copyright &#38;copy; MiEmpresa.com &#45; 2017</p> -->
    <!--             </div> -->
    <!--         </div> -->
    <!--     </div> -->
    <!-- </footer> -->

    <!-- Modal -->
    <div id="modal-example" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>

</html>
