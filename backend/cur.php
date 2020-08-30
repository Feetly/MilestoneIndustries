<style>
.service-list{
    margin-top: 1px;
	margin-bottom: 2px;
    list-style-type: none;
    margin-left:2px;
    padding-left:0px;
    width:180%;
	height: 20%;
	background-color: #FBFDD8;
    border-bottom: 1px solid #864B08;
    float: left;
    
}

.service-list-notfound{
    margin-top: -4px;
    margin-bottom: 2px;
    list-style-type: none;
    margin-left:2px;
    padding-left:0px;
    width:180%;
    height: 20%;
    background-color: #FBFDD8;
    border: 1px solid #864B08;
    text-align: center;
}
.service-list img
{
	width: 20%;
	margin: 3px;
    margin-top: 6px;
    vertical-align: middle;
    /* float:left; */
    box-sizing: content-box; 
}

.service-list:hover{
    background-color: #07b2f0;
}
.service-list p{
    display: inline-block;
    vertical-align: middle;
}
</style>

<?php


    require_once "../loginfo.php";
    //rename this file as load_products.php
    //this file basically laods the products from database

    //this is path to stored data of products (it json , images)
    $path = '../'.$PATH;


    //Connection
    $conn = new mysqli($servername , $username , $password);
    if(!$conn) {
        die("[-] Connection error with MySql");
    }

    //first use database
    $sql = "USE $product_database";
    if(!mysqli_query($conn , $sql)){
        die("Error while using database !!");
    }



    //replace white spaces in string with '+' sign (for using in url)
    function repSpace($string) {
        $string = preg_replace('/\s+/', '+', $string);
        return $string;
    }


    //$cat = $_POST['category'];


    //This is how you get categroy from index.php
    //$sch = $_POST['searchVal'];
    //$ctg = $_POST['category'];

    //echo $sch.'-------'.$ctg;


    //die("");
    


    if(isset($_POST['searchVal'])) {
        $sch = $_POST['searchVal'];
        //if($cat!="ALL Type") {
            //$sql = "select * from $product_table where $product_name like '%$sch%' AND $category='$cat' LIMIT 4";
        //}
        //else {
            $sql = "select * from $product_table where $product_name like '%$sch%' LIMIT 5";
        //}
		$output = "<ul style=\"margin-top: 3px;\">";
        if($res = mysqli_query($conn , $sql)) {
            $count = mysqli_num_rows($res);
            if($count==0) {
                $output = $output."<li class='service-list-notfound'> Product not found</li></ul>";
            }
            else {
                while($row = mysqli_fetch_array($res)) {
                    $nameOfproduct = $row[$product_name];
                    $productId     = $row[$product_id];
                    $productFile   = $row[$product_file];

                    //get the  extension of mainFrame files
                    $mainFramephoto = $row[$mainFrame];

                    //for clean urls
                    $urlOfproduct = "product/$productFile/$productId";
                    //$urlOfproduct = "show.php?productId=$productId&productName=$nameOfproduct";

                    $imagepath = "";
                    //this path is relative to index.php
                    $relpath = $PATH.'/';
                    if(file_exists($path.'/'.$productFile.'/photos/'.$mainFramephoto) && $mainFramephoto!="") {
                        $imagepath = $relpath.$productFile.'/photos/'.$mainFramephoto;
                    } else $imagepath= $relpath.'dummy/default.png';
	
                    $output = $output.'<a href='.$urlOfproduct.'>'.'<li class="service-list">
                      <img height="70%" src='.$imagepath.' class="alignone size-full wp-image-156" style="vertical-align: middle;float:left"><span style="vertical-align: middle;overflow:hidden;">'.$nameOfproduct.
                    '</span></li></a>';
                }
                $output = $output."</ul>";
            }
        }
        else echo "ERROR in qry";
    } 
    echo $output;
?>
