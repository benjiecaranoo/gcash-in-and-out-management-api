<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LoadServices extends Enum
{
    const GLOBE = 'globe';
    const SMART = 'smart';
    const SUN = 'sun';
    const TM = 'tm';
    const TNT = 'tnt';
    const DITO = 'dito';
    const CIGNAL = 'cignal';
    const PLDT = 'pldt';
    const SKY = 'sky';
    const GLOBE_AT_HOME = 'globe_at_home';
    const SMART_BRO = 'smart_bro';
    const SUN_BROADBAND = 'sun_broadband';
    const OTHERS = 'others';
}
