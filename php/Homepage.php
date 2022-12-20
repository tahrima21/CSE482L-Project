<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        function mouseover() {
            document.getElementById("gfg").style.background = "#B4E197";
        }

        function mouseout() {
                document.getElementById("gfg").style.background = "#4E944F";
            }
        function mouseover1() {
            document.getElementById("gfg2").style.background = "#B4E197";
        }

        function mouseout1() {
                document.getElementById("gfg2").style.background = "#4E944F";
            }
        function mouseover2() {
            document.getElementById("gfg3").style.background = "#B4E197";
        }

        function mouseout2() {
                document.getElementById("gfg3").style.background = "#4E944F";
            }
            function mouseover3() {
            document.getElementById("gfg4").style.background = "#B4E197";
        }

        function mouseout3() {
                document.getElementById("gfg4").style.background = "#4E944F";
            }
         
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<title>Home</title>
	</head>
	<body style="background: #E9EFC0;">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4E944F;">
  <div class="container-fluid">
    <img src="https://i.ibb.co/G78rr2S/logo.png" alt="logo" class="logo" style="height: 50px; width: 50px; background-color: #4E944F; color: #4E944F;">
				<a href="Homepage.php" style="text-decoration: none; color: white; margin-right: 200px; font-size: 25px;">TechRev</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: white; margin-right: 600px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #4E944F;">
              <li><a href = "product_gallery.php?type=smartphone" onmouseover="mouseover()" onmouseout="mouseout()" id="gfg" class="dropdown-item" href="#" style="color: white;">Smartphone</a></li>
              <li><a href = "product_gallery.php?type=computer" onmouseover="mouseover1()" onmouseout="mouseout1()" id="gfg2" class="dropdown-item" href="#" style="color: white;">Computer</a></li>
              <li><a href = "product_gallery.php?type=headphone" onmouseover="mouseover3()" onmouseout="mouseout3()" id="gfg4" class="dropdown-item" href="#" style="color: white;">Headphone</a></li>
              <li><a href = "product_gallery.php?type=TV" onmouseover="mouseover2()" onmouseout="mouseout2()" id="gfg3" class="dropdown-item" href="#" style="color: white;">TV</a></li>
            </ul>
          </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white; margin-right: 20px;" href="ad_login.php">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white; margin-right: 20px;" href="./sign-up.php">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white; margin-right: 20px;" href="./login.php">Login</a>
          </li>
        
        
      </ul>
    </div>
  </div>
</nav>
</div>

<form >
<div class="input-group mb-3" style="width:40%; margin-left:30%; margin-top:20px">
  <span class="input-group-text">Search</span>
  <input type="text" class="form-control js-search" id="search">
</div>
<div class="list-group" style="width:40%; margin-left:30%; margin-top:1px" id="show-list">
  
</div>
</form>
<script type="text/javascript">
        $(document).ready(function(){
            //event listener on keyup
            $('#search').keyup(function(){
                //value stored on searchText
                var searchText = $(this).val();
                //check if searchText is empty
                if(searchText!='')
                {
                    //send request to server using ajax
                    $.ajax({
                        url:'api.php',
                        method: 'post',
                        data:{query:searchText},
                        success: function(response){
                            $('#show-list').html(response);
                        }
                    });
                }
                else{
                    $('#show-list').html('');
                }
            });
            $(document).on('click','a',function(){
                $('#search').val($(this).text());
                $('#show-list').html('');
            });
        });
    </script>
<!-- <form class="form-inline p-3" style="display: flex; justify-content: center;">
    <input autofocus="true" onblur="hide_results()" oninput="get_data(this.value)" class="form-control me-2 search js-search" type="search" placeholder="Search" aria-label="Search" name="search" id="search" style="width: 280px;" autocomplete="off" required>
  </form>
  <div id="list" class="col-md-5">
    <div class="results js-results hide">
        
    </div>
  </div> -->
  
				<div class="container">
			<div class="slider">
				<h2 class="sliderh2">Top Rated</h2>
				<div class="slides">
					<input type="radio" name="radio-btn" id="radio1">
					<input type="radio" name="radio-btn" id="radio2">
					<input type="radio" name="radio-btn" id="radio3">
					<input type="radio" name="radio-btn" id="radio4">
				<div class="slide first">
					<img src="https://i.ibb.co/9Wj1rMq/tv.jpg" alt="tv">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/7kskYFG/cam2.jpg" alt="dslr">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/hcr0xCw/laptop.jpg" alt="laptop">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/T1Wc8fZ/headphone.jpg" alt="headphone">
				</div>
				<div class="nav-auto">
					<div class="auto-btn1"></div>
					<div class="auto-btn2"></div>
					<div class="auto-btn3"></div>
					<div class="auto-btn4"></div>
				</div>
			</div>
				<div class="nav-manual">
					<label for="radio1" class="manual-btn"></label>
					<label for="radio2" class="manual-btn"></label>
					<label for="radio3" class="manual-btn"></label>
					<label for="radio4" class="manual-btn"></label>

				</div>
			</div>
			<div class="slider">
				<h2 class="sliderh2">Most Reviewed</h2>
				<div class="slides">
					<input type="radio" name="radio-btn" id="radio5">
					<input type="radio" name="radio-btn" id="radio6">
					<input type="radio" name="radio-btn" id="radio7">
					<input type="radio" name="radio-btn" id="radio8">
					<?php
						include_once "dbh-con.php";
                        $t_rev_query = "SELECT product_serial,image,COUNT(review_serial)  FROM `reviews` NATURAL JOIN products GROUP  BY product_serial ORDER BY COUNT(review_serial) DESC LIMIT 4;";
                        $t_rev_query_run = mysqli_query($conn,$t_rev_query);

                        if($t_rev_query_run)
                        {
							while($data = mysqli_fetch_assoc($t_rev_query_run))
            				{
								?>
                				<div class="slide first">
								<a href="pp.php?pid=<?php echo $data['product_serial']?>"><?php echo "<img src = '".$data['image']."' width = '327' height = '420'>";?></a>
								</div>
								<?php
            				}
                        }
                    ?>
				<div class="nav-auto">
					<div class="auto-btn1"></div>
					<div class="auto-btn2"></div>
					<div class="auto-btn3"></div>
					<div class="auto-btn4"></div>
				</div>
			</div>
				<div class="nav-manual">
					<label for="radio5" class="manual-btn"></label>
					<label for="radio6" class="manual-btn"></label>
					<label for="radio7" class="manual-btn"></label>
					<label for="radio8" class="manual-btn"></label>

				</div>
			</div>
		</div>
		<div class="container2">

	<div class="slider">
		<h2 class="sliderh2">New Poducts</h2>
		<div class="slides">
			<input type="radio" name="radio-btn" id="radio9">
			<input type="radio" name="radio-btn" id="radio10">
			<input type="radio" name="radio-btn" id="radio11">
			<input type="radio" name="radio-btn" id="radio12">
			<?php
						include_once "dbh-con.php";
                        $sub_query = "SELECT * FROM products ORDER BY product_serial DESC LIMIT 4;";
                        $sub_query_run = mysqli_query($conn,$sub_query);

                        if($sub_query_run)
                        {
							while($data = mysqli_fetch_assoc($sub_query_run))
            				{
								?>
                				<div class="slide first">
								<a href="pp.php?pid=<?php echo $data['product_serial']?>"><?php echo "<img src = '".$data['image']."' width = '327' height = '420'>";?></a>
								</div>
								<?php
            				}
                        }
                    ?>
		<div class="nav-auto">
			<div class="auto-btn1"></div>
			<div class="auto-btn2"></div>
			<div class="auto-btn3"></div>
			<div class="auto-btn4"></div>
		</div>
	</div>
		<div class="nav-manual">
			<label for="radio9" class="manual-btn"></label>
			<label for="radio10" class="manual-btn"></label>
			<label for="radio11" class="manual-btn"></label>
			<label for="radio12" class="manual-btn"></label>

		</div>
	</div>
</div>

<script src = "./pushnote/main.js"></script>
<!--JS file-->
<script>
var x=document.getElementById('login');
var y=document.getElementById('register');
var z=document.getElementById('btn');
function register()
{
	x.style.left='-400px';
	y.style.left='50px';
	z.style.left='100px'

}
function login()
{
	x.style.left='50px';
	y.style.left='450px';
	z.style.left='0px'

}
</script>
<script>

		window.onclick=function(event)
 		{
			if(event.target==document.getElementById("login-form"))
			{
				document.getElementById("login-form").style.display = "none";
			}
		}
</script>

	</body>
</html>
