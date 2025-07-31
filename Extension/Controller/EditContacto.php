<?php
namespace FacturaScripts\Plugins\IeWhatsapp\Extension\Controller;

class EditContacto {

    protected function createViews() {
        return function(){
          $this->addButton('EditContacto', [
              'action' => 'openwhatsapp',
              'color' => 'success',
              'icon' => 'fab fa-whatsapp',
              'label' => 'Enviar Whatsapp'
          ]);
        };
    }

    protected function execPreviousAction(){
      return function($action) {
        switch ($action) {
          case 'openwhatsapp':
            $t2 = $this->request->request->get('telefono2');
            $this->redirect("//api.whatsapp.com/send?phone=34" . $t2);
        }
        return true;
      };
    }

}

