<?php

// fazer com que o woocomercer seja suportado
function hendal_add_woocommerce_support(){
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'hendal_add_woocommerce_support');

// adicionar estilo
function hendal_css() {
  wp_register_style('hendal-style', get_template_directory_uri() . '/style.css', [], '1.0.0', false);
  wp_enqueue_style( 'hendal-style' );
}
add_action('wp_enqueue_scripts', 'hendal_css');

function hendal_custom_images() {
  add_image_size('slide', 1000, 800, ['center', 'top']);
  update_option('medium_crop', 1);
}
add_action('after_setup_theme', 'hendal_custom_images');

function hendal_loop_shop_per_page(){
  return 6;
}
add_filter('loop_shop_per_page', 'hendal_loop_shop_per_page');

function hendal_product_list($products){
?>
<ul class="products-list">
  <?php foreach ($products as $product) { ?>
  <li class="product-item">
    <a href="<?= $product['link'];?>">
      <div class="product-info">
        <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>" />
        <h2><?= $product['name']; ?> - <span><?= $product['preco']; ?></span></h2>
      </div>
      <div class="product-overlay">
        <span class="btn-link">Ver Mais</span>
      </div>
    </a>
  </li>
  <?php } ?>
</ul>
<?php } ?>
<!-- hendal_product_list -->