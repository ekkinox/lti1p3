<?php

/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright (c) 2020 (original work) Open Assessment Technologies SA;
 */

declare(strict_types=1);

namespace App\Lti\Core\Message\Context;

class UserContext
{
    /** @var string|null */
    private $name;

    /** @var string|null */
    private $email;

    /** @var string|null */
    private $givenName;

    /** @var string|null */
    private $familyName;

    /** @var string|null */
    private $middleName;

    /** @var string|null */
    private $locale;

    /** @var string|null */
    private $picture;

    public function __construct(
        string $name = null,
        string $email = null,
        string $givenName = null,
        string $familyName = null,
        string $middleName = null,
        string $locale = null,
        string $picture = null
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->givenName = $givenName;
        $this->familyName = $familyName;
        $this->middleName = $middleName;
        $this->locale = $locale;
        $this->picture = $picture;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }
}
