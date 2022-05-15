<?php

namespace App\Enums\ServiceOrders;

enum Status: string
{
    case WAITING_PARTS = 'Aguardando peças';
    case BUDGETING = 'Em orçamentação';
    case EXECUTING = 'Serviço sendo executado';
    case WAITING_PAYMENT = 'Aguardando pagamento';
    case FINISHED = 'Finalizado';
    case INITIAL = 'Fase inicial';

    public static function all()
    {
        return [
            self::INITIAL,
            self::BUDGETING,
            self::WAITING_PARTS,
            self::EXECUTING,
            self::WAITING_PAYMENT,
            self::FINISHED,
        ];
    }
}
