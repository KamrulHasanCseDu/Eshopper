<?php 
    include 'business_layer.php';
 
    $db=new business_layer();
    $number_of_product = $db->get_number_of_product();
    if(isset($_POST['add_comp'])){
        
        $xml = '<item>';
        $xml = $xml.'<product_name>'.$_POST['product_name'].'</product_name>';
        $xml = $xml.'<path>'.$_POST['path'].'</path>';
        $xml = $xml.'<price>'.$_POST['price'].'</price>';
        $xml = $xml.'<rank>'.$_POST['rank'].'</rank>';
        $xml = $xml.'<brand_name>'.$_POST['brand_name'].'</brand_name>';
        $xml = $xml.'<category_name>'.$_POST['category_name'].'</category_name>';
        $xml = $xml.'<Processor>'.$_POST['Processor'].'</Processor>';
        $xml = $xml.'<clock_speed>'.$_POST['clock_speed'].'</clock_speed>';
        $xml = $xml.'<cache>'.$_POST['cache'].'</cache>';
        $xml = $xml.'<display_size>'.$_POST['display_size'].'</display_size>';
        $xml = $xml.'<display_type>'.$_POST['display_type'].'</display_type>';
        $xml = $xml.'<ram>'.$_POST['ram'].'</ram>';
        $xml = $xml.'<ram_type>'.$_POST['ram_type'].'</ram_type>';
        $xml = $xml.'<storage>'.$_POST['storage'].'</storage>';
        $xml = $xml.'<graphics_chipset>'.$_POST['graphics'].'</graphics_chipset>';
        $xml =  $xml.'</item>';
        $xml=simplexml_load_string($xml);
        $db->add_computer($xml);
        header("location:homepage.php");
        
    }
    if(isset($_POST['add_tv'])){
           $xml = '<item>';
        $xml = $xml.'<product_name>'.$_POST['product_name'].'</product_name>';
        $xml = $xml.'<path>'.$_POST['path'].'</path>';
        $xml = $xml.'<price>'.$_POST['price'].'</price>';
        $xml = $xml.'<rank>'.$_POST['rank'].'</rank>';
        $xml = $xml.'<brand_name>'.$_POST['brand_name'].'</brand_name>';
        $xml = $xml.'<category_name>'.$_POST['category_name'].'</category_name>';
        $xml = $xml.'<display_size>'.$_POST['display_size'].'</display_size>';
        $xml = $xml.'<monitor>'.$_POST['monitor'].'</monitor>';
           $xml =  $xml.'</item>';
        $xml=simplexml_load_string($xml);
        $db->add_tv($xml);
        header("location:homepage.php");
    }
   if(isset($_POST['update_comp'])){
       $product_name = $_POST['product_name'];
       
       $xml = '<item>';
       if($_POST['path'] != ""){
           $xml = $xml.'<path>'.$_POST["path"].'</path>';
       }
       if($_POST['price'] != ""){
           $xml = $xml.'<price>'.$_POST["price"].'</price>';
       }
      
        if($_POST['brand_name'] != ""){
           $xml = $xml.'<brand_name>'.$_POST["brand_name"].'</brand_name>';
       }
       if($_POST['category_name'] != ""){
           $xml = $xml.'<category_name>'.$_POST["category_name"].'</category_name>';
       }
        if($_POST['Processor'] != ""){
           $xml = $xml.'<Processor>'.$_POST["Processor"].'</Processor>';
       }
        if($_POST['clock_speed'] != ""){
           $xml = $xml.'<clock_speed>'.$_POST["clock_speed"].'</clock_speed>';
       }  
       if($_POST['cache'] != ""){
           $xml = $xml.'<cache>'.$_POST["cache"].'</cache>';
       }
       if($_POST['display_size'] != ""){
           $xml = $xml.'<display_size>'.$_POST["display_size"].'</display_size>';
       }
       if($_POST['display_type'] != ""){
           $xml = $xml.'<display_type>'.$_POST["display_type"].'</display_type>';
       }
       if($_POST['ram'] != ""){
           $xml = $xml.'<ram>'.$_POST["ram"].'</ram>';
       }
       if($_POST['ram_type'] != ""){
           $xml = $xml.'<ram_type>'.$_POST["ram_type"].'</ram_type>';
       }
       if($_POST['storage'] != ""){
           $xml = $xml.'<storage>'.$_POST["storage"].'</storage>';
       }
       if($_POST['graphics_chipset'] != ""){
           $xml = $xml.'<graphics_chipset>'.$_POST["graphics_chipset"].'</graphics_chipset>';
       }
        $xml =  $xml.'</item>';
        $xml=simplexml_load_string($xml);
        $db->update_product($product_name, $xml);
        header("location:homepage.php");
   }
   if(isset($_POST['update_tv'])){
              $product_name = $_POST['product_name'];
       
       $xml = '<item>';
       if($_POST['path'] != ""){
           $xml = $xml.'<path>'.$_POST["path"].'</path>';
       }
       if($_POST['price'] != ""){
           $xml = $xml.'<price>'.$_POST["price"].'</price>';
       }
       
        if($_POST['brand_name'] != ""){
           $xml = $xml.'<brand_name>'.$_POST["brand_name"].'</brand_name>';
       }
       if($_POST['display_size'] != ""){
           $xml = $xml.'<display_size>'.$_POST["display_size"].'</display_size>';
       }
       if($_POST['monitor'] != ""){
           $xml = $xml.'<monitor>'.$_POST["monitor"].'</monitor>';
       }
               $xml =  $xml.'</item>';
        $xml=simplexml_load_string($xml);
        $db->update_product1($product_name, $xml);
        header("location:homepage.php");
   }
   if(isset($_POST['delete'])){
       $product_name = $_POST['product_name'];
       $db->delete_product($product_name);
       header("location:homepage.php");
    }
   
   
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <style>
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius:12px;
    box-sizing: border-box;
}

 input[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    
}
input [type=radio]{
    
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
} 
.row {
  display: flex;
}
.col {
  flex: 1; /* additionally, equal width */
  
  padding: 1em;
  border: solid;
}


    div {
        margin-left: 4cm;
        margin-right: 16cm;
        margin-top: 2cm;
        border-radius: 5px;
        background-color: whitesmoke;
        padding: 40px;
    }
    div1 {
        
        
        margin-top: 2cm;
        border-radius: 5px;
        background-color: whitesmoke;
        padding: 40px;
    }
    
    
    
    </style>
    <body>
        <?php if(isset($_GET['action'])){ ?>
        <div  style="margin-left: 10cm;margin-right: 10cm">
            
            
            <?php 
            if($_GET['action']=='add_comp'){ ?>
        
                <h1><font color="blue">add new product</font></h1>

                    <form  name = "add" action="admin1.php" method="post">
                        product:  <input name="product_name" type="text">

                        path:  <input name="path" type="text">
                            price:     <input name="price" type="number"> <br></br>
                                <input type="hidden" name="rank" value=0>
                         brand : <input name="brand_name" type="text">
                         category_name<select name="category_name">
                             <option value="laptop">laptop</option>
                             <option value ="desktop">desktop</option>
                             <option value ="notebook">notebook</option>

                         </select>




                        Processor<input type ="text" name="Processor" > 
                          clock_speed<input type="text" name="clock_speed">
                        cache<input type="text" name="cache">
                        display_type<input type="text" name="display_type">
                        display_size<input type="text" name="display_size">
                       ram<input type="text" name="ram">
                         ram_type<input type="text" name="ram_type">
                             storage<input type="text" name="storage">
                        graphics chipset<input type="text" name="graphics">
                      <input type="submit" name ="add_comp" value="add_comp" placeholder="add product">
                 </form>
            <?php
            }
            else if($_GET['action']=='add_tv'){
            ?>
        
        
       
        <h1><font color="blue">add new product</font></h1>
        
        <form  name = "add tv" action="admin1.php" method="post">
            product:  <input name="product_name" type="text">
            path:  <input name="path" type="text">
            price:     <input name="price" type="number"> <br></br>
                 <input type="hidden" name="rank" value=0>
            brand : <input name="brand_name" type="text">
                 <input type="hidden" name="category_name" value="tv">
            display_size<input type="text" name="display_size">
                         
            monitor :<input type="text" name="monitor">
                         
             <input type="submit" name="add_tv">
             
        </form>
        
        
        
        <?php
            }
            else if($_GET['action']=='update_comp'){
                ?>
         <h1><font color="blue">update product</font></h1>
        
        <form  name = "add" action="admin1.php" method="post">
            
                product: <select name="product_name">
                    <?php
                    $xml = $db->get_all_productname();
                    for($i=0;$i<count($xml);$i++){
                      if($xml->product[$i]->category_name != 'tv'){
                        ?><option value="<?php echo $xml->product[$i]->product_name;?> "><?php echo $xml->product[$i]->product_name; ?></option>
                    <?php }
                    }
                    ?>
                    </select>
        
      
                path:  <input name="path" type="text" placeholder="select the path for product image">
                price:     <input name="price" type="number"> <br></br>
                <input type="hidden" name="rank" value="">
                brand : <input name="brand_name" type="text">
                category_name<select name="category_name">
                 <option value="laptop">laptop</option>
                 <option value ="desktop">desktop</option>
                 <option value ="notebook">notebook</option>
                 
                 </select>
         

      
               Processor<input type ="text" name="Processor" > 
              clock_speed<input type="text" name="clock_speed">
                  cache<input type="text" name="cache">
                  display_type<input type="text" name="display_type">
                  display_size<input type="text" name="display_size">
                 ram<input type="text" name="ram">
                   ram_type<input type="text" name="ram_type">
                       storage<input type="text" name="storage">
                  graphics chipset<input type="text" name="graphics_chipset">
            <input type="submit" name ="update_comp" value="add" placeholder="add product">
    </form>
            <?php
            
            }
            else if($_GET['action'] == 'update_tv'){
        ?>
        <h1><font color="blue">update product</font></h1>
        
        <form  name = "update tv" action="admin1.php" method="post">
            product: <select name="product_name">
                
                    <?php
                    $xml = $db->get_all_productname();
                    for($i=0;$i<count($xml);$i++){
                      if($xml->product[$i]->category_name == 'tv'){
                        ?><option value="<?php echo $xml->product[$i]->product_name;?> "><?php echo $xml->product[$i]->product_name; ?></option>
                    <?php }
                    }
                    ?>
                    </select>
      
        path:  <input name="path" type="text">
        price:     <input name="price" type="number"> <br></br>
                
         brand : <input name="brand_name" type="text">
        display_size : <input name="display_size" type="text">
         monitor :<input name="monitor" type="text">
             <input type="submit" name="update_tv" >
             </form>
        
        
        
        <?php
            }
            else if($_GET['action']=='delete'){         
        ?>
        <h1><font color="blue">delete a product</font></h1>
        <form action="admin1.php" method="post">
            product: <select name="product_name">
                <option selected="true" disabled>select a product</option>
                    <?php
                    $xml = $db->get_all_productname();
                    for($i=0;$i<count($xml);$i++){
                      
                        ?><option value="<?php echo $xml->product[$i]->product_name;?> "><?php echo $xml->product[$i]->product_name; ?></option>
                    <?php
                    }
                    ?>
                    </select> 
    <input type="submit" name="delete" >
        </form>
    <?php
            }
  
    ?>
        </div>
<?php } ?>
    </body>
</html>




