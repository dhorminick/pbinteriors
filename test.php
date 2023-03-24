<?php
    $con = mysqli_connect("localhost","root","","pbinteriors");
	if (mysqli_connect_errno()){
	    #header("Location: /404");
		die();
	}else{}

    $emptyimages = [];
    if (isset($_POST["submitPortfolio"])){
        $name_array = $_FILES['imgFiles']['name'];
        $tmp_name_array = $_FILES['imgFiles']['tmp_name'];
        // Number of files
        $count_tmp_name_array = count($tmp_name_array);

        // We define the static final name for uploaded files (in the loop we will add an number to the end)
        $static_final_name = "image-";

        $imagetext = $_POST["imagetext"];

        $assets_mainDir = 'assets';
        $assets_imagesDir = 'images';

        $uploadDir = $assets_mainDir.'/'.$assets_imagesDir.'/'.$imagetext;
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }

        for($i = 0; $i < $count_tmp_name_array; $i++){
            // Get extension of current file
            $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
            
            // Pay attention to $static_final_name 
            if(move_uploaded_file($tmp_name_array[$i], $uploadDir.'/'.$static_final_name.$i.".".$extension)){
                echo $name_array[$i]." upload is complete<br>";    
            } else {
                echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                exit();
            }

            $imagesArr = array(
                'i_dir' => '/'.$uploadDir.'/',
                'i_name' => $static_final_name.$i,
                'i_extension' => $extension
            );

            array_push($emptyimages,$imagesArr);

        } 
        
        $imageArr=serialize($emptyimages);
        echo $imageArr;
    }

    if (isset($_POST["submitTest"])){
        $testtext = $_POST["test_input"];
        $testtext2 = $_POST["test_inpu"];
        $count_tmp_name_array = count($testtext);
        $testtext = serialize($testtext);
        echo $testtext2;
        //echo $count_tmp_name_array;
        //var_dump($testtext);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Interior Architect an Interior Category Bootstrap Responsive Website Template | Home :: W3layouts</title>
     <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/gallery.css">

     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="/assets/js/gallery.js"></script>
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/lightbox-plus-jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<section class="w3l-contacts-12" id="contact">
    <div class="contact-top pt-5">
        <div class="container py-md-3"> 
            <div class="cont-main-top">   
                <!-- contact form -->
                <div class="contacts12-main mt-lg-0 mt-5">
                   
                    <form action="" method="post" class="main-input" enctype='multipart/form-data'>
                        <div class="input_div">
                            <input type="text" placeholder="Portfolio Title..." name="test_input[]" style="margin-bottom:15px;" >
                            <input type="text" placeholder="Portfolio Title..." name="test_input[]" style="margin-bottom:15px;" >
                            <input type="text" placeholder="Portfolio Title..." name="test_input[]" style="margin-bottom:15px;" >
                        </div>
                        <div class="text-right">
                            <button type="submit" name='submitTest' class="btn btn-theme2">Submit Now <i class="fa fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
                <!-- //contact form -->
            </div>
        </div>
        
    </div>
</section>
<?php 
    $untesttext = unserialize($testtext);
    foreach ($untesttext as $key => $txts) {
?>
<div style="border:1px solid red;height:50px;">
    <?php echo $txts; ?>
</div>
<?php } ?>
<button onclick="appendText()">Append text</button>
<button onclick="reppendText()">Reppend text</button>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Design Specifications...',
            tabsize: 2,
            height: 200
        });
    });
</script>
<script>
function appendText() {
  var plusOne = "<input type='text' placeholder='Portfolio Title...' name='test_input[]' style='margin-bottom:15px;' >";   
  $(".input_div").append(plusOne);   // Append new elements
}
function reppendText() {
  var removeOne = $(".input_div input").last();
  removeOne.remove();   // Append new elements
}
</script>
</body>
</html>