<?php

function hendal_custom_checkout($fields){

  // unset($fields['billing']['billing_presente']);

  $fields['billing']['billing_presente'] = [
    'label' => 'Embrulhar para presente?',
    'required' => false,
    'class' => ['form-row-wide'],
    'clear' => true,
    'type' => 'checkbox'
  ];
  return $fields;
}

add_filter('woocommerce_checkout_fields', 'hendal_custom_checkout');


function show_admin_custom_checkout_presente($order) {
  $presente = get_post_meta($order->get_id(), '_billing_presente', true);
  echo '<p><strong>Embrulhar para presente?</strong> ' . (($presente == 1) ? 'Sim' : 'Não') . '</p>';
}

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'show_admin_custom_checkout_presente');

// Adicionar campo
function hendal_custom_checkout_fields() {
  woocommerce_form_field('mensagem_personalizada', [
    'type' => 'textarea',
    'class' => ['form-row-wide mensagem-personalizada'],
    'label' => 'Mensagem Personalizada',
    'placeholder' => 'Escreva aqui uma mensagem para a pessoa que você está presentiando.'
  ], $checkout->get_value('mensagem_personalizada'));
}

add_action( 'woocommerce_after_order_notes', 'hendal_custom_checkout_fields');

// Validar campo
function hendal_custom_checkout_field_process(){
  if(!$_POST['mensagem_personalizada']){
    wc_add_notice( 'Por favor, escreva a mensagem.', 'error' );
  }
}

add_action('woocommerce_checkout_process', 'hendal_custom_checkout_field_process');

// Adicionar ao Banco de Dados
function hendal_custom_checkout_field_update($order_id){
  if(!empty($_POST['mensagem_personalizada'])){
    update_post_meta($order_id, 'mensagem_personalizada', sanitize_text_field($_POST['mensagem_personalizada']));
  }
}
add_action( 'woocommerce_checkout_update_order_meta', 'hendal_custom_checkout_field_update' );


function show_admin_custom_checkout_mensagem($order) {
  $mensagem = get_post_meta($order->get_id(), '_mensagem_personalizada', true);
  echo '<p><strong>Mensagem?</strong>' . ($mensagem) . '</p>';
}

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'show_admin_custom_checkout_mensagem');
?>