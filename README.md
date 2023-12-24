# Clube do Valor | Teste Desenvolvedor Wordpress

**Contribuidores:** Elias Faiçal  
**Versão Atual:** 1.0  
**Testado até:** 6.4.2
**Requer o WordPress:** 6.0 ou superior  
**Licença:** GPL-2.0+
**URI da Licença:** http://www.gnu.org/licenses/gpl-2.0.html

## Descrição do desafio

- Crie um plugin que adicione um shortcode ou widget customizado ao site. Esse shortcode/widget deverá mostrar um botão na página que, quando clicado, adicionará um registro de data e hora no banco de dados wordpress. A tabela utilizada para guardar esse registro fica à sua escolha.

- Crie um plugin que adicione um comando ao WP-CLI que imprima um relatório de histórico de registros. Esse relatório pode ser apenas a listagem das últimas entradas com seus respectivos.

## Instruções de uso

1 - Instale e ative plugin [btn-count](https://github.com/eliasfaical/plugins-wp-teste/btn-count);
2 - Utilize o shortcode `[btn_shortcode]` em qualquer área do site;
3 - Instale e ative plugin [registros-wpcli](https://github.com/eliasfaical/plugins-wp-teste/registros-wpcli);
4 - Execute o seguinte comando do WP-CLI no terminal para imprimir os registros: `wp relatorio-tabela listarRegistros`
