<?php
  /*
    Plugin Name: Registros WP-CLI
    Description: Este plugin adiciona um comando ao `WP-CLI` para imprimir um relatório de registros da tabela `wp_cliques`. Para o perfeito funcionamento você precisa utilizar o plugin btn-count https://github.com/eliasfaical/plugins-wp-teste/btn-count para criar a tabela no banco de dados, onde os registros ficam salvos.
    Version: 1.0
    Author: Elias Faiçal
    Author URI: http://eliasfaical.com.br
  */

  if ( defined( 'WP_CLI' ) && WP_CLI ) {
    class RelatorioTabela_Command {

      // Função que criar o comando [wp relatorio-tabela listarRegistros] 
      public function listarRegistros() {
        global $wpdb;

        $table_wp_cliques = $wpdb->prefix . 'cliques';

        $query = "SELECT * FROM $table_wp_cliques";
        $results = $wpdb->get_results( $query );

        // Imprime o relatório
        WP_CLI::line( 'Relatório da Tabela: wp_cliques:' );

        foreach ( $results as $row ) {
          WP_CLI::line( '• ID: ' . esc_html( $row->id ) . ' - Clique: ' . esc_html( $row->clique ) . ' - Data e hora: ' . esc_html( $row->data_hora ) );
        }
      }
    }

    WP_CLI::add_command( 'relatorio-tabela', 'RelatorioTabela_Command' );
  }
