<?php

namespace FacturaScripts\Plugins\IeWhatsapp\Extension\Controller;

use FacturaScripts\Core\Base\ToolBox;

class EditCliente
{
    protected function createViews() {
        return function(){

          $this->addButton('EditCliente', [
              'action' => 'openwhatsapp',
              'color' => 'success',
              'icon' => 'fab fa-whatsapp',
              'label' => 'Enviar Whatsapp'
          ]);

        };
    }

    protected function execPreviousAction(){
        return function($action) {
            $fijo = $this->toolBox()->appSettings()->get('whatsapp', 'prefijo');
            $msg = $this->toolBox()->appSettings()->get('whatsapp', 'msgcliente');
          switch ($action) {
              case 'openwhatsapp':

              $t2 = $this->request->request->get('telefono2');
              $this->redirect("https://wa.me/".$fijo.$t2."?text=".$msg);
  
          }
          return true;
  
        };
      }
}