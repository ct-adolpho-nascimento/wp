<?php

class Get_Site_name
{
  private $site_name;
  private $div_background;
  private $color_vertical_bar;
  private $logo_img;

  public function __construct($site_name)
  {
    $this->site_name = $site_name;
    $this->setCustomStyles();
  }

  public function init()
  {
    add_action('admin_notices', array($this, 'add_site_name_on_all_dashboard_pages'));
    add_action('admin_print_styles', 'add_my_stylesheet');
    add_action('admin_enqueue_scripts', 'meu_script_admin');
  }

  private function setCustomStyles()
  {
    switch ($this->site_name) {
      case 'Climatempo':
        $this->div_background = 'background-color: #0080cd;';
        $this->color_vertical_bar = '#0066af';
        $this->logo_img = 'climatempo-logo.svg';
        break;
      case 'Agroclima':
        $this->div_background = 'background-color: rgb(58, 152, 46);';
        $this->color_vertical_bar = '#286A14';
        $this->logo_img = 'agroclima-logo.svg';
        break;
      case 'Tempoagora':
        $this->div_background = 'background-color: #375c71;';
        $this->color_vertical_bar = '#202F39';
        $this->logo_img = 'tempoagora-logo.png';
        break;
      default:
        $this->div_background = 'background-color: #191919;';
        $this->color_vertical_bar = '#000000';
        $this->logo_img = 'climatempo-logo.svg';
        break;
    }
  }

  public function add_custom_admin_view()
  {

?>
    <div class="my-custom-container" style="<?php echo $this->div_background; ?>">
      <img src="<?php echo plugins_url('assets/images/' . $this->logo_img, plugin_dir_path(__FILE__)); ?>">

      <div class="inner-container" style="border-left: 5px solid <?php echo $this->color_vertical_bar; ?>;">
        <p>
          <span class="text"> Você está no site: </span>
          <span class="name-site"><?php echo $this->site_name; ?></span>
        </p>
        <p class="breadcrumb">
          <span class="breadcrumb-small"> Para mudar de site siga os passos: </span>
          <span class="breadcrumb-big"> Meus sites > SITE > Painel </span>
        </p>
      </div>
    </div>
  <?php
  }

  // Hook para adicionar a div personalizada no local desejado
  public function add_site_name_on_all_dashboard_pages()
  {
  ?>
    <div id="custom-admin-div">
      <?php $this->add_custom_admin_view(); ?>
    </div>
<?php

  }
}
