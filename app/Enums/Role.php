<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Role extends Enum
{
    /**
     * This roles has no restriction
     */
    const SUPER_ADMIN = 'SUPER_ADMIN';
    const ADMIN = 'ADMIN';
    const USER = 'USER';

    /**
     * The default role for all new added user
     * 
     * @return string
     */
    public static function default(): string
    {
        return static::USER;
    }

    /**
     * Set default permission for each role
     * 
     * @return array
     */
    private static function defaultPermissions(): array
    {
        return [
            // Adding "ALL" will given all permission
            static::ADMIN => [
                Permission::DELETE_ROLE,
                Permission::DELETE_TRANSACTIONS,
                Permission::DELETE_USERS,
                Permission::VIEW_USERS,
                Permission::VIEW_TRANSACTIONS,
                Permission::ADD_ROLE,
                Permission::ASSIGN_ROLE,
                Permission::UPDATE_TRANSACTIONS,
                Permission::UPDATE_USERS
            ],
            static::USER => [
                Permission::VIEW_TRANSACTIONS,
                Permission::VIEW_USERS
            ]
        ];
    }

    /**
     * Get permission to a given role
     * 
     * @param string $role
     * @return array
     */
    public static function getPermissions($role): array
    {
        if (isset(static::defaultPermissions()[$role])) {
            return static::defaultPermissions()[$role];
        } else {
            return [];
        }
    }
}
