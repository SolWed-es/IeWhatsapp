<?php

namespace FacturaScripts\Plugins\IeWhatsapp\Mod;
use FacturaScripts\Core\Base\Contract\SalesModInterface;
use FacturaScripts\Core\Base\Translator;
use FacturaScripts\Core\Model\Base\SalesDocument;
use FacturaScripts\Core\Model\User;

class SalesMod implements SalesModInterface{

    public function apply(SalesDocument &$model, array $formData, User $user){
    }

    public function applyBefore(SalesDocument &$model, array $formData, User $user){
    }

    public function assets(): void{
    }

    public function newFields(): array{
        return ['_whatsappBtn'];
    }

    public function newModalFields(): array{
        return ['proyecto'];
    }

    public function newBtnFields(): array{
        return [];
    }

    public function renderField(Translator $i18n, SalesDocument $model, string $field): ?string{
        if ($field === '_whatsappBtn') {

            $subject = $model->getSubject();
            $movil = $subject->telefono2;

            return
                '<div class="form-row">'
                    . '<div class="col align-self-center">'
                        . '<a class="btn btn-success" href="//api.whatsapp.com/send?phone=34'
                        . $movil
                        . '&text=INFOESTRELLA. Tu equipo está listo, puedes recogerlo de 9:00 a 14:00 o de 17:00 a 20:00. Importe: '
                        . $model->total
                        . 'eur. Más  información en el 924544528. Gracias por confiar en nosotros y ¡cuídate!'
                        . '" role="button" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a>'
                    . '</div>'
                . '</div>';
        }
        return null;
    }

}