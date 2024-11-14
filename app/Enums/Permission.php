<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Permission extends Enum
{
    /*
    /----------------------------------------------------------------
    / Roles Permission
    /----------------------------------------------------------------
    */

    /**
     * Permission to assign role to a user
     */
    const ASSIGN_ROLE = 'ASSIGN_ROLE';

    /**
     * Permission to add new role
     */
    const ADD_ROLE = 'ADD_ROLE';

    /**
     * Permission to delete a role
     */
    const DELETE_ROLE = 'DELETE_ROLE';

    /*
    /---------------------------------------------------------------
    / User Permission
    /---------------------------------------------------------------
    */

    /**
     * Permission to view other user
     */
    const VIEW_USERS = 'VIEW_USERS';

    /**
     * Permission  to update other user
     */
    const UPDATE_USERS = 'UPDATE_USERS';

    /**
     * Permission to delete other user
     */
    const DELETE_USERS = 'DELETE_USERS';


    /*
    /--------------------------------------------------------------
    /  Transaction Permissions
    /--------------------------------------------------------------
    */

    /**
     * Permission to view other transaction
     */
    const VIEW_TRANSACTIONS = 'VIEW_TRANSACTIONS';

    /**
     * Permission to update other transaction
     */
    const UPDATE_TRANSACTIONS = 'UPDATE_TRANSACTION';

    /**
     * Permission to delete other transaction
     */
    const DELETE_TRANSACTIONS = 'DELETE_TRANSACTIONS';
}
