<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/individualProduct.css">

</head>

<body>

<div class="container-fluid">

  <!-- NAVBAR STARTS HERE -->
    <div class="navbar-container">
         NAVBAR GOES HERE
    </div>

    <?php 

        include 'reuseable/connection.php';

        //This piece of code retrieves Product ID from the URL.
        $productToDisplay = $_GET['productID'];

        $sql_query = "SELECT * FROM product WHERE product_id = $productToDisplay";
        $result = mysqli_query($connection, $sql_query);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){

            while($row = mysqli_fetch_assoc($result)){

                $rating = round($row['product_rating']);
                $i = 1; 

                echo "
                <!-- Product Information starts here -->
                <div class='product-container'>
                    <div class='product-image-container'>
                        <img src='images/$row[product_image]'/>
                    </div>
                

                    <div class='product-info-container'>
                        <div class='product-heading'>$row[product_name]</div>
                        <div class='product-brand'>Brand: FRESHMART</div>
                        <div class='product-shop'>Sold by: Henry Farm</div>

                        <div class='product-rating'>";
                            while($i <= 5){
                                    if( $i<=$rating){
                                        echo "<span class='fa fa-star checked'></span>";
                                        $i = $i +1;
                                    }

                                    else{                                
                                       echo "<span class='fa fa-star unchecked'></span>";
                                        $i = $i +1;
                                    }
                                }

                        echo "</div>

                        <div class='product-price'>Rs $row[product_price]/kg</div>

                        
                        <div class='product-form'>
                            <form action='' method=''>
                                   <div class='test'>
                                        <div class='subtract' onclick='decrementValue()'> - </div>
                                        <div class='counter'><input type='number' min=1 id='quantity' value='1'></div>
                                        <div class='addition' onclick='incrementValue()'> + </div>
                                   </div>


                                    <input type='submit' class='add-to-cart-button' value='Add to Cart'>
                            </form>
                        </div>

                        <div class='product-rate-prompt'>Rate this product</div>


                    </div>
                </div>    <!-- Product Container ends here -->

                <br>

                <div class='product-description'>
                    <h4>Product Description</h4>
                    <p>$row[product_description]</p>
                </div>";
            }
        
        }
    ?>

                <div class='product-feedback-container'>
                    <div class="heading"><h4>What our customer says?</h4></div>

                    <div class="feedback" id="feedback-prompt" onclick=showDiv()>

                        <div id="sub-heading">Leave a comment </div>

                        <input type="text" name="feedback-comment" id="feedback-comment" placeholder="Leave a review">

                        <select name="feedback-rating" id="feedback-rating">
                            <option value="5">5 Star</option>
                            <option value="4">4 Star</option>
                            <option value="3">3 Star</option>
                            <option value="2">2 Star</option>
                            <option value="1">1 Star</option>
                        </select>

                        <input type="button" value="Post it" name="post" id="feedback-button">

                    </div>
 
                    <div class="feedback">
                        <div class="rating"><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span></div>
                        <div class="comment"> This is the first comment </div>
                        <div class="user">- Abiral Pandey</div>
                    </div>
                    
                </div>


    


    <div class="more-product-container">
            <div class="heading"><h4>More products from this shop</h4></div>
            <div class="products">
                Simran ko wala carousel here.
            </div>
        
    </div>

</div>  

<div class="footer">
    Place footer here
</div>



<script>

    function showDiv() {
        document.getElementById('sub-heading').style.display = "none";
        document.getElementById('feedback-comment').style.display = "block";
        document.getElementById('feedback-rating').style.display = "inline-block";
        document.getElementById('feedback-button').style.display = "inline-block";
    }

    function incrementValue(){
        var value = parseInt(document.getElementById('quantity').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('quantity').value = value;
    }

    function decrementValue(){
        var value = parseInt(document.getElementById('quantity').value, 10);
        value = isNaN(value) ? 0 : value;
        
        if(value>1){ value-- }

        document.getElementById('quantity').value = value;


        
    }



</script>



    
</body>
</html>