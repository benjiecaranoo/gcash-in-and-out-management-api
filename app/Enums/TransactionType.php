<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CashIn()
 * @method static static CashOut()
 * @method static static Load()
 */
final class TransactionType extends Enum
{
    const CashIn = 'cash_in';
    const CashOut = 'cash_out';
    const Load = 'load';
}
