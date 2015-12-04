<?php
namespace Tlt\Bundle\TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EquipmentSelectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'configs'            => array(
                    'placeholder'   =>  'tlt.ticket.form.choose_equipment'
                ),
                'autocomplete_alias' => 'tlt_ticket_equipment_autocomplete',
                'grid_name'          => 'base-equipment-grid',
                'create_form_route'  => 'tlt_ticket_equipment_create',
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
        return 'tlt_ticket_equipment_select';
    }
}