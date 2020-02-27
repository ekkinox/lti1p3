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

namespace App\Form\Platform\Security\Oidc;

use App\Lti\Core\Deployment\DeploymentRepository;
use App\Lti\Core\Deployment\DeploymentRepositoryInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginRequestType extends AbstractType
{
    /** @var DeploymentRepositoryInterface|DeploymentRepository */
    private $deploymentRepository;

    /** @var ParameterBagInterface */
    private $parameterBag;

    public function __construct(DeploymentRepositoryInterface $deploymentRepository, ParameterBagInterface $parameterBag)
    {
        $this->deploymentRepository = $deploymentRepository;
        $this->parameterBag = $parameterBag;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'deployment',
                ChoiceType::class,
                [
                    'choices' => $this->deploymentRepository->findAll()
                ]
            )
            ->add(
                'login_hint',
                ChoiceType::class,
                [
                    'choices' => array_combine(
                        array_keys($this->parameterBag->get('users')),
                        array_keys($this->parameterBag->get('users'))
                    )
                ]
            )
            ->add('lti_message_hint', TextType::class)
            ->add('Launch', SubmitType::class)
        ;
    }
}
