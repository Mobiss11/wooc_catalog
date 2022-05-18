<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
    </ul>
  </div>
</div>
    
<script>
    
    console.log('scripts start');
    var btns = document.querySelectorAll('.qnty-buttons .btn-qnty');
    if(btns){
        btns.forEach(function(key, value){
            key.onclick = function(){
                var inp = key.parentNode.querySelector('.priduct-qnty');
                if(inp){
                   var v = Number(inp.value);
                }
                if(key.classList.contains('plus-btn')){
                   v = v + 1;
                }
                if(key.classList.contains('minus-btn')){
                    if(v>>0){
                        v = v - 1;
                    }
                }
                inp.value = v;
            }
        })
    }

    var li = document.querySelectorAll('.categories-block>a');
   
    if(li){
        li.forEach(function(key, value){
            key.onclick = function(){
                 var opens =  document.querySelectorAll('.categories-block>a .dropdown.open');
                if(key.querySelector('.dropdown').classList.contains('open')){
                    key.querySelector('.dropdown').classList.remove('open');
                    key.querySelector('svg').removeAttribute('style');
                }else{
                    opens.forEach(function(key, value){
                        key.classList.remove('open');
                    })
                    key.querySelector('.dropdown').classList.add('open');
                    key.querySelector('svg').setAttribute('style', 'transform: rotate(180deg)');
                }
            }
        })
    }

    var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
    if(product){
        product.forEach(function(key, value){
            key.setAttribute('style', 'display: none');
            var d = key.getAttribute('data-category');
            if(d.search('Connector') !== -1){
                key.removeAttribute('style');
            }
            
        })
    }
    var no_child = document.querySelectorAll('.no-child');
    if(no_child){
        no_child.forEach(function(key, value){
            key.onclick = function(){
                var txt = key.innerText + ' ';
                var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                if(product){
                    product.forEach(function(key, value){
                        key.setAttribute('style', 'display: none');
                        var d = key.getAttribute('data-category');
                        if(d.search(txt) !== -1){
                            key.removeAttribute('style');
                        }

                    })
                }
                
            }
        })
    }

     var dropdown = document.querySelectorAll('.has-child .dropdown li');
	 if(dropdown){
        dropdown.forEach(function(key, value){
            key.onclick = function(){
                var txt = key.innerText + ' ';
                var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                if(product){
                    product.forEach(function(key, value){
                        key.setAttribute('style', 'display: none');
                        var d = key.getAttribute('data-category');
                        if(d.search(txt) !== -1){
                            key.removeAttribute('style');
                        }

                    })
                }
                
            }
        })
    }
 
    var srch = document.querySelector('.search-block input.search-input');
    if(srch){
        srch.oninput = function(){
            console.log(srch.value)
            var v = srch.value;
            var l = v.length;
            if(l > 3){
                var txt = v;
                var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                if(product){
                    product.forEach(function(key, value){
                        key.setAttribute('style', 'display: none');
                        var d = key.getAttribute('data-category');
                        if(d.search(txt) !== -1){
                            key.removeAttribute('style');
                        }

                    })
                }
                
            }else{
                var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                if(product){
                    product.forEach(function(key, value){
                        key.setAttribute('style', 'display: none');
                        var d = key.getAttribute('data-category');
                        if(d.search('Connector') !== -1){
                            key.removeAttribute('style');
                        }

                    })
                }
                
                
            }
        }
    }

</script>