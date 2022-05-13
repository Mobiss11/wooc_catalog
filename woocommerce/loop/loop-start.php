<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="category-row">  
    <div class="left-block">
       <div class="left-block-title">Integrations</div>
       <div class="search-block">
        <input type="text" placeholder="Search" class="search-input">
        <i class="fa fa-search"></i>
       </div>
       <div class="categories-block">
          <?php
           $taxonomy     = 'product_cat';
              $orderby      = 'name';  
              $show_count   = 0;      
              $pad_counts   = 0;      
              $hierarchical = 1;        
              $title        = '';  
              $empty        = 0;

              $args = array(
                     'taxonomy'     => $taxonomy,
                     'orderby'      => $orderby,
                     'show_count'   => $show_count,
                     'pad_counts'   => $pad_counts,
                     'hierarchical' => $hierarchical,
                     'title_li'     => $title,
                     'hide_empty'   => $empty
              );
             $all_categories = get_categories( $args );
             foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;       
                    echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

                    $args2 = array(
                            'taxonomy'     => $taxonomy,
                            'child_of'     => 0,
                            'parent'       => $category_id,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                    );
                    $sub_cats = get_categories( $args2 );
                    
                    if($sub_cats) {
                        echo '<ul class="dropdown">';
                        foreach($sub_cats as $sub_category) {
                            echo '<li>';
                            echo  $sub_category->name ;
                            echo '</li>';
                        }   
                        echo '</ul>';
                    }
                    
                }       
            }
            ?>
       </div>
    </div>
    <div class="right-block">
    <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">