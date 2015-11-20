<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 10:13
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Oro\Bundle\SoapBundle\Entity\Manager\ApiEntityManager;

class EquipmentTypeApiManager extends ApiEntityManager
{
    /**
     * @var EquipmentTypeManager
     */
    protected $equipmentTypeManager;

    /**
     * Constructor
     *
     * @param string $class Entity name
     * @param ObjectManager $om Object manager
     * @param EquipmentTypeManager $equipmentTypeManager
     */
    public function __construct($class, ObjectManager $om, EquipmentTypeManager $equipmentTypeManager)
    {
        $this->equipmentTypeManager = $equipmentTypeManager;
        parent::__construct($class, $om);
    }

    /**
     * {@inheritdoc}
     */
    public function createEntity()
    {
        return $this->equipmentTypeManager->createEquipmentType();
    }
}