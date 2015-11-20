<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 13:33
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Oro\Bundle\SoapBundle\Entity\Manager\ApiEntityManager;

class EquipmentApiManager extends ApiEntityManager
{
    /**
     * @var EquipmentManager
     */
    protected $equipmentManager;

    /**
     * Constructor
     *
     * @param string $class Entity name
     * @param ObjectManager $om Object manager
     * @param EquipmentManager $equipmentManager
     */
    public function __construct($class, ObjectManager $om, EquipmentManager $equipmentManager)
    {
        $this->equipmentManager = $equipmentManager;
        parent::__construct($class, $om);
    }

    /**
     * {@inheritdoc}
     */
    public function createEntity()
    {
        return $this->equipmentManager->createEquipment();
    }
}