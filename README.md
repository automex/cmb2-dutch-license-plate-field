# CMB2 Dutch License Plate Field
Adds a Dutch License Plate Field to CMB2.
## Usage
```php
$kenteken = new_cmb2_box( array(
    'id'    => 'kenteken',
    'title' => __('Kenteken', 'theme'),
));

$kentekenplaat = $kenteken->add_field(array(
    'name' => __( 'Kenteken', 'theme'),
    'id'   => 'kentekenplaat',
    'type' => '',
));
```
# License
The code and the documentation are released under the [MIT License](LICENSE).
