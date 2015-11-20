<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 10:13
 */

namespace Tlt\Bundle\TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EquipmentTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'defectType',
                'entity',
                array(
                    'label'       => 'tlt.ticket.equipmenttype.defect_type.label',
                    'class'       => 'TltTicketBundle:DefectType',
                    'property'    => 'name',
                    'empty_value' => 'tlt.ticket.equipmenttype.form.choose_defect_type',
                    'required'    => true
                )
            )
            ->add(
                'name',
                'text',
                [
                    'label' => 'tlt.ticket.equipmenttype.name.label',
                    'required' => true
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
                'data_class' => 'Tlt\\Bundle\\TicketBundle\\Entity\\EquipmentType',
                'intention' => 'tlt_ticket_equipment_type_entity',
                'cascade_validation' => true,
                'ownership_disabled' => false
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
        return 'tlt_ticket_equipment_type';
    }
}