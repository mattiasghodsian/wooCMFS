**This class Simplifys adding fields to woocommer product data meta**

![Extras](https://imgur.com/wCZsxfW.png)

Plugin Example

```php
include_once 'custom_wooCommerce_field.php';

add_action( 'plugins_loaded', 'wooCMFS' );
function wooCMFS() {
	// Woo_Custom_Meta_Fields class
    $cf = New Woo_Custom_Meta_Fields();

    // add fields
    $array = [
        [
            'type' => 'text',
            'attr' => [ # any woocommerce attribute
                'id' => '_demo_text',
                'placeholder' => 'Lorem ipsum dolor sit amet',
                'label' => __('Demo Text', 'woocommerce'),
                'type' => 'text', 
                
            ]
            # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_text_input.html
        ],
    ]

    $cf->addFields($array);

    // execute
    $cf->init([
        'tab' => 'woocommerce_product_options_general_product_data'
    ]);
}
```

*** NOTE: All data inside attr come from woocommerce docs ***

Example for Text input
```php
[
    'type' => 'text',
    'attr' => [ # any woocommerce attribute
        'id' => '_demo_text',
        'placeholder' => 'Lorem ipsum dolor sit amet',
        'label' => __('Demo Text', 'woocommerce'),
        'type' => 'text', 
        
    ]
    # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_text_input.html
]
```

Example for Number input
```php
[
    'type' => 'text'
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
]
```

Example for Textarea
```php
[
    'type' => 'textarea',
    'attr' => [ # any woocommerce attribute
        'id' => '_demo_description',
        'placeholder' => 'Lorem ipsum dolor sit amet',
        'label' => __('Demo Description', 'woocommerce'),
    ]
    # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_textarea_input.html
]
```

Example for Select
```php
[
    'type' => 'select', 
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
]
```

Example for Radio
```php
[
    'type' => 'radio',
    'attr' => [ # any woocommerce attribute
        'id' => '_demo_radio',
        'label' => __('Demo Radio', 'woocommerce'),
        'options' => [
            '0' => __('Demo option 1'),
            '1' => __('Demo option 2'),
        ]
    ]
    # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_radio.html
]
```

Example for Checkbox
```php
[
    'type' => 'checkbox',
    'attr' => [ # any woocommerce attribute
        'id' => '_demo_checkbox', 
        'label' => __('Demo checkbox', 'woocommerce' ), 
        'description' => __( 'Check me!', 'woocommerce' ),

    ]
    # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_checkbox.html
]
```


Example for Hidden
```php
[
    'type' => 'hidden',
    'attr' => [ # any woocommerce attribute
        'id' => '_demo_hidden',
    ]
 
    # https://docs.woocommerce.com/wc-apidocs/function-woocommerce_wp_hidden_input.html
]
```
