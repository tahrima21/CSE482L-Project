<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
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
    <script type="text/javascript">
        function get_data(text){
            if(text.trim()==""){
                return
            }
            if(text.trim().length < 2){
                return
            }
            var text = document.querySelector(".js-search").value;
            var form = new FormData();
            form.append('text',text);
            var ajax = new XMLHttpRequest();
            ajax.addEventListener('readystatechange',function(e){
                if(ajax.readyState == 4 && ajax.status == 200){
                    handle_result(ajax.responseText);
                }
            });
            ajax.open('post','api.php',true);
            ajax.send(form);
        }
        function handle_result(result){
            //console.log(result);
            var result_div = document.querySelector(".js-results");
            var str = "";

            var obj = JSON.parse(result);
            for(var i = obj.length - 1; i>=0; i--){
                //console.log(obj[i].title);
                str += `<a href='pp.php?ID={$products["product_serial"]}' <div>` + obj[i].title + "</div></a><br>";
            }
            result_div.innerHTML = str;
            if(obj.length > 0){
                show_results();
            }
            else{
                hide_results();
            }
        }
        function show_results(){
            var result_div = document.querySelector(".js-results");
            result_div.classList.remove("hide");
        }
        function hide_results(){
            var result_div = document.querySelector(".js-results");
            result_div.classList.add("hide");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

		<title>Request Product</title>
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
          <a class="nav-link" style="color: white; margin-right: 20px;" href="Log_Home.php">Account</a>
        </li>
		
        <li class="nav-item">
			<a class="nav-link" style="color: white; margin-right: 20px;"><?php echo $_SESSION["U_name"]?></a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
</div>
		
		<div class="side_dash" id="pic">
			<ul class="d-items">
				<li class="it" >
					<a href="user_dash.php"><i class='bx bxs-objects-vertical-center'></i><span class="menu-titles">Reviews</span></a>
				</li>
				<li class="it" >
					<a  href="profile.php"><i class='bx bxs-user-circle'></i><span class="menu-titles">Profile</span></a>
				</li>
				<li class="it">
					<a  href="product_req.php"><i class='bx bxs-message-square-edit'></i><span class="menu-titles">Product Request</span></a>
				</li>
				<li class="it">
					<a  href="req_stat.php"><i class='bx bxs-bell-ring'></i><span class="menu-titles">Request Status</span></a>
				</li>
				<li class="it" >
					<a  href="u_logout.php"><i class='bx bxs-exit'></i><span class="menu-titles">Logout</span></a>
				</li>
			</ul>
		</div>
		<div class = "review-form">
			<div class="req-cont">
                <form action="req-process.php?id=<?= $_SESSION["ID"];?>" method = "post" enctype="multipart/form-data">
				<?php
                        if(isset($_GET["error"]))
                        {
                
                            if($_GET["error"]== "done")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Request submitted wait for approval</strong>
                                </div>;
                                <?php
                            }
						}
					?>
					<h4 style="margin-left:280px; color = red;"></h4>
                    <h3>ENTER DATA</h3>
                    <div class="in_fieldnew">
                    <input type="text" name ="p_name" required placeholder = "Enter Product name">
                    </div>
					<div class="in_fieldnew">
                    <select name = "p_cat" required>
                        <option value="" disabled selected>Enter Category</option>
                        <option value="smartphone">Smartphone</option>
                        <option value="computer">Computer</option>
                        <option value="headphone">Headphone</option>
                        <option value="tv">TV</option>
                    </select>
                    
					<div class="in_fieldnew">
                    <input type="file" name = "filei" value = "image" class = "form-btn">
                    </div>
                    <div class="in_fieldtext">
                        <textarea name = "txt" placeholder="Enter product details...."></textarea>
                    </div>
                    
                    <div class="up-btn">
                        <button name ="submit">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>
		</div>
		
		<script src = "app.js"></script>
	</body>
</html>