<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 13:33
 */

namespace Tlt\Bundle\TicketBundle\Form\Type;

use Tlt\Bundle\TicketBundle\Entity\Equipment;
use Tlt\Bundle\TicketBundle\Entity\EquipmentType as EquipmentTypeEntity;
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

class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'equipmentType',
                'tlt_ticket_equipment_type_select',
                [
                    'label'       => 'tlt.ticket.equipment.equipment_type.label',
                ]
            )
            ->add(
                'name',
                'text',
                [
                    'label' => 'tlt.ticket.equipment.name.label',
                ]
            )
            ->add(
                'enabled',
                'choice',
                [
                    'label' => 'Status',
                    'required' => true,
                    'choices' => ['Inactive', 'Active'],
                    'empty_value' => 'Please select',
                    'empty_data' => '',
                    'auto_initialize' => false
                ]
            )
            ->add(
                'property',
                'choice',
                [
                    'choices' => Equipment::getPropertyLabels()
                ],
                [
                    'label' => 'tlt.ticket.equipment.property.label',
                ]
            )
            ->add(
                'guarantee',
                'oro_date',
                [
                    'label'    => 'tlt.ticket.equipment.guarantee.label',
                    'required' => false
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
                'data_class' => 'Tlt\\Bundle\\TicketBundle\\Entity\\Equipment',
                'intention' => 'tlt_ticket_equipment_entity',
                'cascade_validation' => true,
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
        return 'tlt_ticket_equipment';
    }

}