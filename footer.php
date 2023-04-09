<footer class="footer">
  <a href="/"><img src="<?= get_stylesheet_directory_uri();?>/img/handel-white.svg" alt="Hendal Logo" /></a>
  <div class="container footer-info">
    <section>
      <h3>Páginas</h3>
      <?php wp_nav_menu(['menu'=>'footer','container'=>'nav','container_class'=>'footer-menu']);?>
    </section>
    <section>
      <h3>Redes Sociais</h3>
      <?php wp_nav_menu(['menu'=>'redes sociais','container'=>'nav','container_class'=>'footer-redes']);?>
    </section>
    <section>
      <h3>Formas de Pagamento</h3>
      <ul>
        <li>Cartão de Crédito</li>
        <li>Boleto</li>
        <li>Pix</li>
        <li>PagSeguro</li>
      </ul>
    </section>
  </div>
  <?php 
    $countries = WC()->countries;
    $base_address = $countries->get_base_address();
    $base_city = $countries->get_base_city();
    $base_state = $countries->get_base_state();
    $complete_address = "$base_address, $base_city, $base_state";
  ?>


  <small class="footer-copy">&copy;Hendal <?= date('Y');?> - Todos os direitos reservados.<address><?= $complete_address;?></address> </small>
</footer>
<?php wp_footer(); ?>
<script src=" <?= get_stylesheet_directory_uri(); ?>/js/slide.js"></script>
<script src="<?= get_stylesheet_directory_uri(); ?>/js/script.js"></script>
</body>

</html>