<div class="jumbotron align-center" style="margin-bottom: 0px;">
      <div>
        <h1></h1>

      </div>
      <div class="">
        
      </div>
    </div>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">

        <ul class="navbar-nav">
          <li class="nav-item">
            <?php 
            if (isset($_SESSION['cart'])){
              $count = count($_SESSION['cart']);
              echo "<a class=\"nav-link\" href=\"cart.php\"><i class=\"fas fa-shopping-cart\">My Cart <span id=\"cart_count\" class=\"text-warning bg-dark\">$count</span>  </i></a>";
            }else{
              echo "<a class=\"nav-link\" href=\"cart.php\"><i class=\"fas fa-shopping-cart\">My Cart <span id=\"cart_count\" class=\"text-warning bg-dark\">0</span>  </i></a>";
            }


             ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">   Customer Care   </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">   Track My Order   </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">   Products   </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">   Account   </a>
            <li class="nav-item">
            <a class="nav-link" href="index.php">   Home   </a>
          </li>
          </li>
          <li class="nav-item">
            <div class="form "><input type="text" class="form-control form-input" placeholder="Search anything..."> <span class="left-pan"><i class="fa fa-search"></i></span> 
            </div>
        </ul>
      </div>
      </nav>