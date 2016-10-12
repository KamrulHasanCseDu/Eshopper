<?php
//include_once 'dbConfig.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
   session_start();
    include 'business_layer.php'; 
    $db=new business_layer();
    
   // print_r($ratingRow);

    
     if(isset($_COOKIE['customer_name'])){       
         $_SESSION['customer_name'] = $_COOKIE['customer_name'];
         if(isset($_COOKIE['admin'])){
             $_SESSION['admin'] = $_COOKIE['admin'];
         }
     }
     

    $x="some";
    if(array_key_exists('customer_name',$_SESSION) && !empty($_SESSION['customer_name'])){ 
        $log_status = $_SESSION['customer_name'];
        $xml= $db->search_item($log_status);
        $x = $xml->product->profile_pic;//profile pic for customer
     }
    else
        $log_status = "log in";
       
    
    $xml=$db->get_popular_product();
    


?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
        
    <title>Home | i-Shop</title>
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="rating.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.8.0.min.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="rating.js"></script>
    <script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: 'images/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: 'rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                alert('You have rated '+val+' to CodexWorld');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>
<style type="text/css">
    
          	.web{
		font-family:tahoma;
		size:12px;
		top:10%;
		border:1px solid #CDCDCD;
		border-radius:10px;
		padding:10px;
		width:38%;
		margin:auto;
	}
	
	
	.show
	{
		font-family:tahoma;
		padding:10px; 
		border-bottom:1px #CDCDCD dashed;
		font-size:15px; 
	}
	.show:hover
	{
		background:#364956;
		color:#FFF;
		cursor:pointer;
	} 
    input[type=search]{
        width:480px;height:49px; border:3px solid black;
        padding-left:48px;
        padding-top:1px;
        font-size:22px;
        color:blue;
        border-color: orange;
        border-radius: 4px ;
        box-sizing: border-box;
        background-repeat:no-repeat;
        background-position:center;outline:0;
        margin-left:300px;
        
        }

        input[type=search]::-webkit-search-cancel-button{
            position:relative;
            right:20px;  

            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            border-radius:10px;
            background: red;
        }  
        input[type = hidden]{
            left:20px;
            background: red;
        }
     .user {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-repeat: no-repeat;
            background-position: center center;
            background:green;
            background-size: cover;
            font-size:30px;
            text-align:center;
            color:#fff;

          }

          .one {
            background-image:  url(<?php echo $x; ?>);  
            
          }    
      
       
        
         input[type=submit] {
               
               border: 1px solid #ccc;
               color: blueviolet;
               border-color: white;
               
               background-repeat: no-repeat;
               background-size: 20px 20px;
               height:49px;
         }
         
         .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
       input[type=button]{
                color:orange;
                background-color: white;
            }

         .container-2 .icon{
               position: absolute;
               top: 50%;
               margin-left: 17px;
               margin-top: 17px;
               z-index: 1;
               color: #4f5b66;
             }
       
        body {
            background-color:white;
        }
        #container {
            height: 4px;
            width: 40px;
            position: relative;
          }
          #image {
            position: absolute;
            left: 0;
            top: 0;
          }
          #text {
            z-index: 100;
            position: absolute;
            color:orange;
            font-size: 24px;
            font-weight: bold;
            
            left: 26px;
            top:0px;
          }
          #text2 {
            z-index: 100;
            position: absolute;
            color:orange;
            font-size: 14px;
           
            
            left: 2px;
            top:25px;
          }
           #text3 {
            z-index: 100;
            position: absolute;
            color:orange;
            font-size: 14px;
            
            
            left: 4px;
            top:30px;
          }
          
          
     cart{
            background: none repeat scroll 0 0 white;
            border: 5px solid #DFDFDF;
            color: orange;
            font-size: 13px;
            height: 500px;
            width: 500px;
            letter-spacing: 1px;
            line-height: 30px;
            margin: 5px;
            position: relative;
            text-align: left;
            
            top: 5px;
            left:-400px;
            display:none;
            padding:0 20px;
            overflow:scroll;

        }
        compare1{
            background: none repeat scroll 0 0 white;
            border: 5px solid #DFDFDF;
            color: orange;
            font-size: 14px;
            height: 700px;
            width: 700px;
            letter-spacing: 1px;
            line-height: 30px;
            margin: 5px;
            position: relative;
            text-align: left;
            
            top: 5px;
            left:-500px;
            display:none;
            padding:0 20px;
            overflow:scroll;

        }
         compare2{
            background: none repeat scroll 0 0 white;
            border: 5px solid #DFDFDF;
            color: orange;
            font-size: 13px;
            height: 900px;
            width: 1200px;
            letter-spacing: 1px;
            line-height: 30px;
            margin: 5px;
            position: relative;
            text-align: left;
            
            top: 5px;
            left:-800px;
            display:none;
            padding:0 20px;
            overflow:scroll;

        }      
        
        
        
        

        p2{
            left: 1000px;

            float:left;
            position:relative;
            cursor:pointer;
        }
         p3{
            left: 1000px;

            float:left;
            position:relative;
            cursor:pointer;
        }
        
        
       p4{
            left: 1000px;

            float:left;
            position:relative;
            cursor:pointer;
        }

        p2:hover cart{
            display:block;
        }
        
        p3:hover compare1{
            display:block;
        }
        
        p4:hover compare2{
            display:block;
        }
        
        
   
        tab{
        margin-left:20px;
        padding-left :20px;
        }
    
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
     #img1{
        margin-left: 30cm;
    }
    #text_home{
        margin-left: 33cm;
    }
    a{
        text-decoration: none;
    }
    
</style>
</head>
<body>
     <a href="homepage.php"><img src="images/home/logo.png" alt="" /></a>
        <a  href="homepage.php" ><img id="img1"  src="images/home.jpg" height="30px" width="30px" ><font color="orange" id='text_home'>homepage</font></a>
    <?php
    $xml_2 = $db->search_product_info($id);
     $img =$xml_2->product->path;                                                                                                                                                                                               
       echo '<img src ="'.$img.'">'.'<br>';  
       ?><tab>Rate it:</tab><br><input name="rating" value="4" id="rating_star" type="hidden" postID="<?php echo $id; ?>" >  
               <br> <tab> <?php echo $xml_2->product->price .'/='.'<br>';

       ?> <tab> <?php echo $xml_2->product->product_name.'<br>'.'</tab>';
                                                                                          
             $name_1 = $xml_2->product->product_name;
           if($xml_2->product->category_name != 'tv'){
                $xml_1 = $db->get_computer_configuration($name_1);
                                                               
               
                    echo '<tab>'.'brand :'.$xml_1->product->brand.'<br>';
                    echo '<tab>'.'processor : '.$xml_1->product->Processor.'<br>';
                    echo '<tab>'.'clock_speed:'.$xml_1->product->clock_speed.'<br>';
                    echo '<tab>'.'cache:'.$xml_1->product->cache.'<br>';
                    echo '<tab>'.'display_type:'.$xml_1->product->display_type.'<br>';
                      echo '<tab>'.'display_size:'.$xml_1->product->display_size.'<br>';
                    echo '<tab>'.'ram : '.$xml_1->product->ram.'<br>';
                    echo '<tab>'.'ram_type : '.$xml_1->product->ram_type.'<br>';
                    echo '<tab>'.'storage: '.$xml_1->product->storage.'<br>';
                    echo '<tab>'.'graphics: '.$xml_1->product->graphics_chipset.'<br>';
                                                                                        
               ?>
                
                    <?php }
                    else{
                        $xml_1 = $db->get_tv_configuration($name_1);
                         ?>
                        
                         <?php
                            echo '<tab>'.'brand : '.$xml_1->product->brand.'<br>';
                            echo '<tab>'.'display_size : '.$xml_1->product->display_size.'<br>';
                            echo '<tab>'.'monitor : '.$xml_1->product->monitor;
                        ?>
                       
                         <?php
                    }
                       ?>  
           
                        
                                       
                                           
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
                                                                    <h4 class="panel-title"><a href="OtherPage.php?name=laptop"><font color="orange">laptop</font></a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
                                                                    <h4 class="panel-title"><a href="OtherPage.php?name=notebook"><font color="orange">notebook</font></a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
                                                                    <h4 class="panel-title"><a href="OtherPage.php?name=tv"><font color="orange">television</font></a></h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
                                                                    <h4 class="panel-title"><a href="OtherPage.php?name=desktop"><font color="orange">Desktop</font></a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                                                    <li><a href="OtherPage.php?name=hp"> <span class="pull-right"></span><font color="orange">hp</font></a></li>
                                                                    <li><a href="OtherPage.php?name=dell"> <span class="pull-right"></span><font color="orange">dell</font></a></li>
                                                                    <li><a href="OtherPage.php?name=apple"> <span class="pull-right"></span><font color="orange">apple</font></a></li>
                                                                    <li><a href="OtherPage.php?name=toshiba"> <span class="pull-right"></span><font color="orange">toshiba</font></a></li>
                                                                    <li><a href="OtherPage.php?name=samsung"> <span class="pull-right"></span><font color="orange">samsung</font></a></li>
                                                                    <li><a href="OtherPage.php?name=asus"> <span class="pull-right"></span><font color="orange">asus</font></a></li>
                                                                    <li><a href="OtherPage.php?name=walton"> <span class="pull-right"></span><font color="orange">walton</font></a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Popular Items</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
                                                                                   <?php
                                                                                   
                                                                                   for($i=0;$i<2;$i++){
                                                                                   $img =$xml->product[$i]->path;                                                                                                                                                                                               
                                                                                   echo '<img src ="'.$img.'" height="200" width="100" >';                                                                                   
										   echo $xml->product[$i]->price .'/=';             
                                                                                   echo nl2br("\n");
                                                                                   echo $xml->product[$i]->product_name;
                                                                                   
                                                                                       
                                                                                   $name_1 = $xml->product[$i]->product_name;
                                                                                   if($xml->product[$i]->category_name != 'tv')
                                                                                   {
                                                                                      $xml_1 = $db->get_computer_configuration($name_1);
                                                                                   //print_r($xml_1);
                                                                                   //echo nl2br('<details> <summary>details</summary><p>"'.$xml_1->product->product_name.'"</p> </details>');
                                                                                   ?>
                                                                                    <details>
                                                                                        <?php
                                                                                        echo 'brand :'.$xml_1->product->brand.'<br>';
                                                                                        echo 'processor : '.$xml_1->product->Processor.'<br>';
                                                                                        echo 'clock_speed:'.$xml_1->product->clock_speed.'<br>';
                                                                                        echo 'cache:'.$xml_1->product->cache.'<br>';
                                                                                        echo 'display_type:'.$xml_1->product->display_type.'<br>';
                                                                                        echo 'display_size:'.$xml_1->product->display_size.'<br>';
                                                                                        echo 'ram : '.$xml_1->product->ram.'<br>';
                                                                                        echo 'ram_type : '.$xml_1->product->ram_type.'<br>';
                                                                                        echo 'storage: '.$xml_1->product->storage.'<br>';
                                                                                        echo 'graphics: '.$xml_1->product->graphics_chipset;
                                                                                        
                                                                                        ?>
                                                                                    </details>
                                                                                    <?php
                                                                                    
                                                                                   }
                                                                                   else{
                                                                                      $xml_1 = $db->get_tv_configuration($name_1);
                                                                                      ?>
                                                                                    <details>
                                                                                        <?php
                                                                                        echo 'brand : '.$xml_1->product->brand.'<br>';
                                                                                        echo 'display_size : '.$xml_1->product->display_size.'<br>';
                                                                                        echo 'monitor : '.$xml_1->product->monitor;
                                                                                        ?>
                                                                                    </details>
                                                                                    <?php
                                                                                   }
                                                                                   ?>

                                                                                    <!--form action="#" method="post"><input type="hidden" name="id" value="<?php //echo $xml->product[$i]->product_id;?>"/><input type="submit" name="submit" value="Add to Cart"/> </form-->
                                                                                    <a href="homepage.php?id=<?php echo $xml->product[$i]->product_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> 
                                                                                    <a href="homepage.php?comp_prod=<?php echo $xml->product[$i]->product_name;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Compare</a> <br>
                                                                                    <?php //echo $xml->product[$i]->product_name;
                                                                                    $id = $xml->product[$i]->product_id;
                                                                                    $ratingRow = $db->get_rating($id);
                                                                                    $n = $ratingRow['average_rating'];
                                                                                     echo 'Ratings: ';
                                                                                    for($l=1;$l<=$n;$l++){
                                                                                        ?><img src="images/star_highlight.png" style="height:18px;width: 18px;"><?php
                                                                                    }
                                                                                   
                                                                                    for($l2=$l;$l2<=5;$l2++){
                                                                                        ?><img src="images/star_full.png" style="height:20px;width: 20px;"><?php
                                                                                    }
                                                                                    if($log_status != 'log in'){
                                                                                         ?>
                                                                                         <br><a href="index.php?id= <?php echo $xml->product[$i]->product_id;?> ">Rate it</a>
                                                                                     <?php
                                                                                       }
                                                                                    
                                                                                    
                                                                                  } 
                                                                                  ?>
                                                                                </div>										
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
                                                                                    <?php
                                                                                   for($i=2;$i<3;$i++){
                                                                                   $img =$xml->product[$i]->path;                                                                                                                                                                                               
                                                                                   echo '<img src ="'.$img.'">';                                                                                   
										   echo $xml->product[$i]->price .'/='.'<br>';
                                                                                   
									          echo $xml->product[$i]->product_name;
                                                                                   //echo nl2br('<details> <summary>details</summary><p>"'.$xml->product[$i]->configuration.'"</p> </details>');
                                                                                   $name_1 = $xml->product[$i]->product_name;
                                                                                   if($xml->product[$i]->category_name != 'tv'){
                                                                                         $xml_1 = $db->get_computer_configuration($name_1);
                                                                                   //print_r($xml_1);
                                                                                   //echo nl2br('<details> <summary>details</summary><p>"'.$xml_1->product->product_name.'"</p> </details>');
                                                                                   ?>
                                                                                    <details>
                                                                                        <?php
                                                                                        echo 'brand :'.$xml_1->product->brand.'<br>';
                                                                                        echo 'processor : '.$xml_1->product->Processor.'<br>';
                                                                                        echo 'clock_speed:'.$xml_1->product->clock_speed.'<br>';
                                                                                        echo 'cache:'.$xml_1->product->cache.'<br>';
                                                                                        echo 'display_type:'.$xml_1->product->display_type.'<br>';
                                                                                        echo 'display_size:'.$xml_1->product->display_size.'<br>';
                                                                                        echo 'ram : '.$xml_1->product->ram.'<br>';
                                                                                        echo 'ram_type : '.$xml_1->product->ram_type.'<br>';
                                                                                        echo 'storage: '.$xml_1->product->storage.'<br>';
                                                                                        echo 'graphics: '.$xml_1->product->graphics_chipset.'<br>';
                                                                                        
                                                                                        ?>
                                                                                    </details>                                                                                   
                                                                                   <?php }
                                                                                    else{
                                                                                      $xml_1 = $db->get_tv_configuration($name_1);
                                                                                      ?>
                                                                                    <details>
                                                                                        <?php
                                                                                        echo 'brand : '.$xml_1->product->brand.'<br>';
                                                                                        echo 'display_size : '.$xml_1->product->display_size.'<br>';
                                                                                        echo 'monitor : '.$xml_1->product->monitor;
                                                                                        ?>
                                                                                    </details>
                                                                                    <?php
                                                                                   }
                                                                                  
                                                                                  ?>
                                                                                  <a href="homepage.php?id=<?php echo $xml->product[$i]->product_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> 
                                                                                   <a href="homepage.php?comp_prod=<?php echo $xml->product[$i]->product_name;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Compare</a> 
                                                                                   <br>
                                                                                          <?php
                                                                                          $id = $xml->product[$i]->product_id;
                                                                                          $ratingRow = $db->get_rating($id);;
                                                                                         $n = $ratingRow['average_rating'];
                                                                                         echo 'Ratings: ';
                                                                                          for($l=1;$l<=$n;$l++){
                                                                                            ?><img src="images/star_highlight.png" style="height:18px;width: 18px;"><?php
                                                                                          }
                                                                                        for($l2=$l;$l2<=5;$l2++){
                                                                                            ?><img src="images/star_full.png" style="height:20px;width: 20px;"><?php
                                                                                        }
                                                                                        if($log_status != 'log in'){
                                                                                         ?>
                                                                                         <br><a href="index.php?id= <?php echo $xml->product[$i]->product_id;?> ">Rate it</a>
                                                                                     <?php
                                                                                       }
                                                                                 }
                                                                                   ?>
										
									</div>
									
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
                                                                                    <?php
                                                                                   for($i=3;$i<6;$i++){
                                                                                   $img =$xml->product[$i]->path;                                                                                                                                                                                               
                                                                                   echo '<img src ="'.$img.'">';                                                                                   
										   echo $xml->product[$i]->price .'/='.'<br>';
                                                                                    echo $xml->product[$i]->product_name.'<br>';
									           //echo nl2br('<details> <summary>details</summary><p>"'.$xml->product[$i]->configuration.'"</p> </details>');
                                                                                   $name_1 = $xml->product[$i]->product_name;
                                                                                   if($xml->product[$i]->category_name != 'tv'){
                                                                                        $xml_1 = $db->get_computer_configuration($name_1);
                                                                                   //print_r($xml_1);
                                                                                   //echo nl2br('<details> <summary>details</summary><p>"'.$xml_1->product->product_name.'"</p> </details>');
                                                                                  
                                                                                   ?>
                                                                                    <details>
                                                                                        
                                                                                        <?php
                                                                                        echo 'brand :'.$xml_1->product->brand.'<br>';
                                                                                        echo 'processor : '.$xml_1->product->Processor.'<br>';
                                                                                        echo 'clock_speed:'.$xml_1->product->clock_speed.'<br>';
                                                                                        echo 'cache:'.$xml_1->product->cache.'<br>';
                                                                                        echo 'display_type:'.$xml_1->product->display_type.'<br>';
                                                                                        echo 'display_size:'.$xml_1->product->display_size.'<br>';
                                                                                        echo 'ram : '.$xml_1->product->ram.'<br>';
                                                                                        echo 'ram_type : '.$xml_1->product->ram_type.'<br>';
                                                                                        echo 'storage: '.$xml_1->product->storage.'<br>';
                                                                                        echo 'graphics: '.$xml_1->product->graphics_chipset.'<br>';
                                                                                        
                                                                                        ?>
                                                                                    </details> 
                                                                                   <?php }
                                                                                  else{
                                                                                      $xml_1 = $db->get_tv_configuration($name_1);
                                                                                      ?>
                                                                                    <details>
                                                                                        <?php
                                                                                        echo 'brand : '.$xml_1->product->brand.'<br>';
                                                                                        echo 'display_size : '.$xml_1->product->display_size.'<br>';
                                                                                        echo 'monitor : '.$xml_1->product->monitor;
                                                                                        ?>
                                                                                    </details>
                                                                                    <?php
                                                                                   }
                                                                                   ?>
                                                                                   
                                                                                    <a href="homepage.php?id=<?php echo $xml->product[$i]->product_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> 
                                                                                  <a href="homepage.php?comp_prod=<?php echo $xml->product[$i]->product_name;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Compare</a> 
                                                                                  <br>  
                                                                                      <?php
                                                                                      $id = $xml->product[$i]->product_id;
                                                                                      $ratingRow = $db->get_rating($id);;
                                                                                      $n = $ratingRow['average_rating'];
                                                                                      echo 'Ratings: ';
                                                                                      for($l=1;$l<=$n;$l++){
                                                                                        ?><img src="images/star_highlight.png" style="height:18px;width: 18px;"><?php
                                                                                     }
                                                                                     for($l2=$l;$l2<=5;$l2++){
                                                                                        ?><img src="images/star_full.png" style="height:20px;width: 20px;"><?php
                                                                                     }
                                                                                     if($log_status != 'log in'){
                                                                                         ?>
                                                                                         <br><a href="index.php?id= <?php echo $xml->product[$i]->product_id;?> ">Rate it</a>
                                                                                     <?php
                                                                                       }
                                                                                     
                                                                                   }
                                                                                   ?>
									</div>
									
								</div>
								
							</div>
						</div>
						
						
					</div><!--features_items-->														
				</div>
			</div>
		</div>
	</section>                                          
   
    
</body>
</html>