<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|
| https://www.mercadopago.com.ar/developers/es/solutions/payments/basic-checkout/receive-payments/
|
*/

// Custom Checkout
$config['app_id'] = '2698338356548048'; // not used by the Library
$config['public_key'] = 'APP_USR-df5980f6-d678-4554-a126-3ac0523935ae';  // not used by the Library
$config['access_token'] = 'APP_USR-2698338356548048-021601-f10b8fb15e9d8a26af3e700363608aeb-173261449';
$config['use_access_token'] = FALSE; // TRUE or FALSE

// Basic Checkout
$config['client_id'] = '2698338356548048';
$config['client_secret'] = 'FwYigIiXtZEV9hy9PguaSm3D7HbaGmsE';

// Sandbox
$config['sandbox_mode'] = TRUE; // TRUE or FALSE


/* End of file mercadopago.php */
/* Location: ./application/config/mercadopago.php */