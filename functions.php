<?php


/**
 * @snippet       Shipping by Weight | WooCommerce
 * @sourcecode    https://businessbloomer.com/?p=21432
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_filter( 'woocommerce_package_rates', 'bbloomer_woocommerce_tiered_shipping', 9999, 2 );

function bbloomer_woocommerce_tiered_shipping( $rates, $package ) {

     if ( WC()->cart->get_cart_contents_count() < 42 ) {

         if ( isset( $rates['flat_rate:5'] ) ) unset( $rates['flat_rate:6'], $rates['flat_rate:7'], $rates['flat_rate:8'] );

     } elseif ( WC()->cart->get_cart_contents_count() > 43 && WC()->cart->get_cart_contents_count() < 85) {

         if ( isset( $rates['flat_rate:5'] ) ) unset( $rates['flat_rate:5'], $rates['flat_rate:7'], $rates['flat_rate:8'] );

    } elseif ( WC()->cart->get_cart_contents_count() > 85 && WC()->cart->get_cart_contents_count() < 126 ) {

         if ( isset( $rates['flat_rate:5'] ) ) unset( $rates['flat_rate:5'], $rates['flat_rate:6'], $rates['flat_rate:8'] );

     } else {

         if ( isset( $rates['flat_rate:5'] ) ) unset( $rates['flat_rate:5'], $rates['flat_rate:6'], $rates['flat_rate:7'] );

     }

     return $rates;

}

add_filter( 'woocommerce_cart_no_shipping_available_html', 'change_noship_message' );
add_filter( 'woocommerce_no_shipping_available_html', 'change_noship_message' );
function change_noship_message() {
    print "Please call us to discuss custom shipping options for your area <a href='tel:8009557671'>800-955-7671</a>";
}
/**
 * @snippet       Remove Additional Information Tab @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 9999 );

function bbloomer_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}


/**
 * Change the Description tab link text for single products
 */
add_filter( 'woocommerce_product_description_tab_title', 'isa_wc_description_tab_link_text', 999, 2 );

function isa_wc_description_tab_link_text( $text, $tab_key ) {

    return esc_html( 'Buying a Steller Floor' );

}
/** bbloomer_rename_description_tab_heading() */



function ciccarone_scripts() {
    wp_enqueue_script( 'ciccarone-scripts', get_stylesheet_directory_uri() . '/ciccarone-script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'ciccarone_scripts' );
