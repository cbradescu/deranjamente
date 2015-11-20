<?php
namespace Tlt\Bundle\TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EquipmentTypeSelectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'configs'            => array(
                    'placeholder'   =>  'tlt.ticket.equipment.form.choose_equipment_type'
                ),
                'autocomplete_alias' => 'tlt_ticket_equipment_type_autocomplete',
                'grid_name'          => 'base-equipment_type-grid',
                'create_form_route'  => 'tlt_ticket_equipment_type_create',
                'create_enabled'     => true
            )
        );
    }
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'oro_entity_create_or_select_inline';
    }
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'tlt_ticket_equipment_type_select';
    }
}