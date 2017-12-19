<?php
/**
 * Class Name: Woo_Custom_Meta_Fields
 * GitHub URI: https://github.com/mattiasghodsian/wooCustomMetaFields
 * Description: This class Simplifys adding fields to woocommer product data meta 
 * Version: 1.0.0
 * Author: Mattias Ghodsian
 * Author URI: http://www.nexxoz.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Donate a cup of coffee: https://www.paypal.me/MattiasG
 */
class Woo_Custom_Meta_Fields {
 
    private $fields = [];
    
    /**
     * Execute
     */
    public function init($array) 
    {
        if (!is_array($array) && !empty($array))
            return false;

        add_action(
            $array['tab'], 
            [$this, 'fields'] 
        );

        add_action('woocommerce_process_product_meta', 
            [$this, 'save']
        );
    }

    /**
     * add field to class
     *
     * @param $fields array 
     * return string
     */
    public function addFields($fields)
    {
        if (is_array($fields) && !empty($fields)) {
            $this->fields = $fields;
        }else{
            return 'variable must be array';
        }
    }

    /**
     * save all fields
     * return null
     */
    public function save()
    {
        foreach ($this->fields as $key => $field) {
            $postField = $_POST[ $field['attr']['id'] ];
            if (!empty($postField))
                update_post_meta($post_id, $field['attr']['id'], esc_attr($postField));
        }
    }

    /**
     * Print out the fields 
     * return null
     */
    public function fields()
    {
        global $woocommerce, $post;
        echo '<div class="woo_custom_meta_field">';
        foreach ($this->fields as $key => $field) {
            switch ($field['type']) {
                case 'text':
                    woocommerce_wp_text_input($field['attr']);
                    break;

                case 'textarea':
                    woocommerce_wp_textarea_input($field['attr']);
                    break;

                case 'select':
                    woocommerce_wp_select($field['attr']);
                    break;

                case 'radio':
                    woocommerce_wp_radio($field['attr']);
                    break;

                case 'checkbox':
                    woocommerce_wp_checkbox($field['attr']);
                    break;

                case 'hidden':
                    woocommerce_wp_hidden_input($field['attr']);
                    break;
            }
        }
        echo '</div>';
    }
}