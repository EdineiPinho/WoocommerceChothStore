<?php 

// Adicionar novo menu
function hendal_custom_menu($menu_links){
  $menu_links = array_slice($menu_links, 0, 5, true)
  + ['certificados' => 'Certificados']
  + array_slice($menu_links, 5, NULL, true);

  unset($menu_links['downloads']);
  
  return $menu_links;
}
add_filter( 'woocommerce_account_menu_items', 'hendal_custom_menu' );

function hendal_add_endpoint(){
  add_rewrite_endpoint('certificados', EP_PAGES);
}
add_action('init', 'hendal_add_endpoint');

function hendal_certificados() {
  echo "<p>Esses são os seus certificados</p>";
}

add_action('woocommerce_account_certificados_endpoint', 'hendal_certificados');

?>