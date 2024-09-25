<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class ErrorCodes extends Enum implements LocalizedEnum
{
    /**
     * Error code for unverified email
     */
    const UNVERIFIED_EMAIL = 'UNVERIFIED_EMAIL';


    /**
     * Error code for unverified phone number
     */
    const UNVERIFIED_PHONE_NUMBER = 'UNVERIFIED_PHONE_NUMBER';

    /**
     * Error code for unverified account
     */
    const UNVERIFIED_ACCOUNT = 'UNVERIFIED_ACCOUNT';

    /**
     * Error code for invalid account Credentials
     */
    const INVALID_CREDENTIALS = 'INVALID_CREDENTIALS';

    /**
     * Error code for authentication required
     */
    const AUTHENTICATION_REQUIRED = 'AUTHENTICATION_REQUIRED';

    /**
     * Error code when an email is the primary authentication.
     */
    const AUTHENTICATION_EMAIL_REQUIRED = 'AUTHENTICATION_EMAIL_REQUIRED';

    /**
     * Error code when an phone number is the primary authentication.
     */
    const AUTHENTICATION_PHONE_NUMBER_REQUIRED = 'AUTHENTICATION_PHONE_NUMBER_REQUIRED';

    /**
     * Error code for using old password when updating password.
     */
    const USING_OLD_PASSWORD = 'USING_OLD_PASSWORD';

    /**
     * Error code for invalid username
     */
    const INVALID_USERNAME = 'INVALID_USERNAME';

    /**
     * Error code for invalid password
     */
    const INVALID_PASSWORD = 'INVALID_PASSWORD';

    /**
     * Error code for invalid password
     */
    const USERNAME_NOT_FOUND = 'USERNAME_NOT_FOUND';

    /**
     * Error code for invalid email
     */
    const EMAIL_NOT_FOUND = 'EMAIL_NOT_FOUND';

    /**
     * Error code for account that has been blocked
     */
    const ACCOUNT_BLOCKED = 'ACCOUNT_BLOCKED';

    /**
     * Error code for account that has no password
     */
    const PASSWORD_NOT_SUPPORTED = 'PASSWORD_NOT_SUPPORTED';

    /**
     * Error code for invalid token
     */
    const TOKEN_NOT_FOUND = 'TOKEN_NOT_FOUND';
}
