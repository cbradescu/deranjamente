<?php

namespace Tlt\Bundle\TicketBundle\Twig;

use Tlt\Bundle\TicketBundle\Entity\Equipment;

class EquipmentExtension extends \Twig_Extension {

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('equipment_property', array($this, 'getEquipmentProperty')),
        );
    }

    public function getEquipmentProperty($value)
    {
        return Equipment::getPropertyLabelForIndex($value);
    }

    public function getName()
    {
        return 'equipment_extension';
    }
}