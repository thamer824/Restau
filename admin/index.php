
<?php include ('partials/menu.php');  ?>


       <div class="main-content">
          <div class="wrapper">
            <h1>dashboard</h1>

            <br><br>

            <?php 
             if (isset($_SESSION['login']))
             {
                 echo $_SESSION ['login'];//display session 
                 unset($_SESSION['login']);//remove session msg
             }
             
             ?>
             <br><br>

             <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                catgeories
             </div>

             <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                catgeories
             </div>

             <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                catgeories
             </div>

             <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                catgeories
             </div>

             <div class="clearfix"></div>


          </div>
       </div>

<?php include('partials/footer.php') ?>



      