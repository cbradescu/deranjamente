<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 25/Nov/15
 * Time: 11:28
 */

namespace Tlt\Bundle\TicketBundle\Form\Type;

use Tlt\Bundle\TicketBundle\Entity\Defect;
use Tlt\Bundle\TicketBundle\Entity\DefectType as DefectTypeEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;

use Oro\Bundle\LocaleBundle\Formatter\NameFormatter;
use Oro\Bundle\SecurityBundle\SecurityFacade;
use Oro\Bundle\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Routing\Router;

class DefectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'announcedBy',
                'oro_user_select',
                array(
                    'label' => 'tlt.ticket.defect.announced_by.label',
                    'required' => false,
                    'configs' => [
                        'placeholder' => 'tlt.ticket.defect.form.choose_announced_by'
                    ]
                )
            )
            ->add(
                'equipment',
                'tlt_ticket_equipment_select',
                [
                    'label'       => 'tlt.ticket.defect.equipment.label',
                ]
            )
            ->add(
                'recordedAt',
                'oro_datetime',
                [
                    'label' => 'tlt.ticket.defect.recorded_at.label',
                ]
            )
            ->add(
                'intro',
                'textarea',
                [
                    'label' => 'tlt.ticket.defect.intro.label',
                ]
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'Tlt\\Bundle\\TicketBundle\\Entity\\Defect',
                'intention' => 'tlt_ticket_defect_entity',
                'cascade_validation' => true,
                'ownership_disabled' => true
            ]
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'tlt_ticket_defect';
    }

}