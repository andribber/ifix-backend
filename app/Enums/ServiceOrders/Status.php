<?php

namespace App\Enums\ServiceOrders;

enum Status: string
{
    case WAITING_PARTS = 'aguardando pecas';
    case BUDGETING = 'orcamento';
    case EXECUTING = 'executando';
    case WAITING_PAYMENT = 'aguardando pagamento';
    case FINISHED = 'finalizado';
}
