<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
    
    
<li class="product">
    <div class="top-row row">
         <div class="img">
             <?php 
               echo $product->get_image();
             ?>
         </div>
         <div class="title">
             <?php 
               echo '<h3>';
               echo $product->get_title();
               echo '</h3>';
               $cats = $product->get_category_ids();
               $c = count($cats);
               echo '<p class="prduct-categories">';
               if($c>1){
                   for ($i=0; $i<2; $i++){
                       echo '<span>';
                       echo get_the_category_by_ID($cats[$i]);
                       echo '</span>';
                   }
               }else{
                   for ($i=0; $i<1; $i++){
                       echo '<span>';
                       echo get_the_category_by_ID($cats[$i]);
                       echo '</span>';
                   }

               }
               echo '</p>';
             ?>
         	</div>   
            <div class="qnty-buttons">
                 <button type="button" class="minus-btn btn-qnty">-</button>
                  <input type="text" value="0" class="priduct-qnty">   
                  <button type="button" class="plus-btn btn-qnty">+</button>

             </div> 
    
            
             
    </div>
    <div class="bottom-row row">
        <div class="description">         
          <?php
              echo $product->get_description();    
          ?>
         </div>         
    </div>
</li>