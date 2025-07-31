<?php

namespace FacturaScripts\Plugins\IeWhatsapp;

use FacturaScripts\Core\Base\AjaxForms\SalesFooterHTML;

class Init extends \FacturaScripts\Core\Base\InitClass{

  public function init() {
    $this->loadExtension(new Extension\Controller\EditContacto());
    SalesFooterHTML::addMod(new Mod\SalesMod());
  }

  public function update() {
    /// se ejecutar cada vez que se instala o actualiza el plugin
  }

}



