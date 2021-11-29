<?php

function repeatCustomerViews( $num_customers, $customer_obj_array ) {
    $result = `<section id="link_proj" class="link-sec sec-pad-top-80">`;
    for ( $i=0; $i < $num_customers; $i++ ) {
        $result = $result .    
            `<div class="col-md-4 col-sm-12 text-center">
                 <a href="` . $customer_obj_array[$i]->name . `" target="_blank">
                    <div class="img-wrapper">					
                        <img src="` . $customer_obj_array[$i]->img . `" alt="">
                    </div>
                </a>
                <a href="` . $customer_obj_array[$i]->number . `" target="_blank">
                    <h4>` . $customer_obj_array[$i]->last_message . `</h4>
                </a>
            </div>`;
    }
    return $result;
}

