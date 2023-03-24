<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/accordion.css">
</head>
<body>
    <?php
    $x = 1;
    if($x = 2){
    $productId = 36;
    $con = mysqli_connect("localhost","root","","test");
	if (mysqli_connect_errno()){
	    #header("Location: /404");
		die();
	}else{}
    $GetImages = "SELECT * FROM test_table WHERE id = '$productId'";
    $GetImagesResult = mysqli_query($con,$GetImages);
    if ($GetImagesResult->num_rows > 0) {
        while($rows = mysqli_fetch_array($GetImagesResult)){
            $images = $rows["images"];
            $images = unserialize($images);

            foreach ($images as $key => $img) {
    ?>
        <div style="border: 1px solid red;">
            <img src="<?php echo '/'.$img['i_dir'].'/'.$img['i_name'].'.'.$img['i_extension']; ?>" alt="<?php echo $img['i_name'];?>">
        </div>
    <?php
            }
        }
    }
}  
    ?>
<!-- <form name="ContactForm" method="post" action="">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" class="form-control" id="name">
</div>
<div class="form-group">
<label for="email">Email Address:</label>
<input type="email" class="form-control" id="email">
</div>
<div class="form-group">
<label for="message">Message:</label>
<textarea name="message" class="form-control" id="message">
</textarea>
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form> -->
<input type="file" name="imgFiles[]" multiple>
<button class="accordion">Section 1</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Section 2</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Section 3</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
</body>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/accordion.js"></script>
<script>
var accordion = new Accordion();
</script>
<div class="flex-box-custom">
                                        
                                        <select name="duration">
                                            <option value="night">Per Night</option>
                                            <option value="month">Per Month</option>
                                            <option value="year">Per Yeart</option>
                                        </select>
                                    </div>
</html>