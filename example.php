<?php
/**
 * Plugin Name:       wooCustomMetaFields Example
 * Plugin URI:        https://github.com/mattiasghodsian/wooCustomMetaFields
 * Description:       This class Simplifys adding fields to woocommer product data meta
 * Version:           0.1.0
 * Author:            Mattias Ghodsian
 * Author URI:        https://github.com/mattiasghodsian/
 */
include_once 'custom_wooCommerce_field.php';

add_action( 'plugins_loaded', 'wooCMFS' );
function wooCMFS() {
    // Woo_Custom_Meta_Fields class
    $cf = New Woo_Custom_Meta_Fields();

    // add fields
    $array = [
        [
            'type' => 'text', # text, textarea, select, radio
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_text',
                'placeholder' => 'Lorem ipsum dolor sit amet',
                'label' => __('Demo Text', 'woocommerce'),
                'type' => 'text', 
                
            ]
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_text_input.html
        ],
        [
            'type' => 'text', # text, textarea, select, radio
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_number',
                'placeholder' => '1337',
                'label' => __('Demo Number', 'woocommerce'),
                'type' => 'number',
                'custom_attributes' => [
                    'step' => 'any',
                    'min' => '0'
                ]
            ]
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_text_input.html
        ],
        [
            'type' => 'textarea', # text, textarea
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_description',
                'placeholder' => 'Lorem ipsum dolor sit amet',
                'label' => __('Demo Description', 'woocommerce'),
            ]
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_textarea_input.html
        ],
        [
            'type' => 'select', # text, textarea, select, radio
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_select',
                'label' => __('Demo Select', 'woocommerce'),
                'options' => [
                    '1' => 'Demo option 1',
                    '2' => 'Demo option 2',
                    '3' => 'Demo option 3',
                ]
            ]
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_select.html
        ],
        [
            'type' => 'radio', # text, textarea, select, radio
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_radio',
                'label' => __('Demo Radio', 'woocommerce'),
                'options' => [
                    '0' => __('Demo option 1'),
                    '1' => __('Demo option 2'),
                ]
            ]
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_radio.html
        ],
        [
            'type' => 'checkbox', # text, textarea, select, radio, checkbox
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_checkbox', 
                'label' => __('Demo checkbox', 'woocommerce' ), 
                'description' => __( 'Check me!', 'woocommerce' ),

            ]
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_checkbox.html
        ],
        [
            'type' => 'hidden', # text, textarea, select, radio, checkbox
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_hidden',
            ]
         
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_hidden_input.html
        ]
    ];

    $cf->addFields($array);

    // execute
    $cf->init([
        'tab' => 'woocommerce_product_options_general_product_data'
    ]);

    /**
     * tested tabs
     * woocommerce_product_options_general_product_data
     * woocommerce_product_options_inventory_product_data
    */
}