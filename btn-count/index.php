<?php
  /*
    Plugin Name: BTN Count
    Description: Este é um plugin que adiciona um shortcode [btn_shortcode] customizado ao site. Esse shortcode mostra um botão na página que, quando clicado, adiciona um registro de data e hora no banco de dados wordpress. Ao ativar o plugin a função `criar_tabela_cliques` é chamada e a tabela `wp_cliques` é criada automáticamente, nesta tabela será registrado uma listagem das entradas.
    Version: 1.0
    Author: Elias Faiçal
    Author URI: http://eliasfaical.com.br
  */

  /* 
   * Função para criar a tabela wp_cliques no banco de dados
   */
  function criar_tabela_cliques() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cliques';
    $charset_collate = $wpdb->get_charset_collate();
  
    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      clique mediumint(9) NOT NULL,
      data_hora datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      PRIMARY KEY (id)
    ) $charset_collate;";
  
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
  
  register_activation_hook(__FILE__, 'criar_tabela_cliques');


  /* 
   * Função para registrar as entradas no banco de dados
   */
  function incrementar_cliques($clique) {
    if (isset($_GET['registro_clique']) && $_GET['registro_clique'] == 'true') {
      global $wpdb;
      $table_name = $wpdb->prefix . 'cliques';

      $wpdb->insert(
        $table_name,
        array(
          'clique' => $clique,
          'data_hora' => current_time('mysql', 1),
        )
      );
    }
  }


  /* 
   * Função para criar o shortcode
   */
  function btn_shortcode_function($atts) {

    // Adicionar url atual a uma variável
    $current_page = basename(get_permalink());
    
    // CSS para aplicar estilo no botão
    wp_enqueue_style('btn-css', plugins_url('btn-css.css', __FILE__));

    // Criar botão para adicionar cliques
    $link = '<a class="btn-count" title="Botão registrar clique" href="' . $current_pag . '?registro_clique=true">Registrar clique!</a>';

    $clique = 1;
    incrementar_cliques($clique);
    return $link;
  }

  // Registrar função do shortcode
  add_shortcode('btn_shortcode', 'btn_shortcode_function');
