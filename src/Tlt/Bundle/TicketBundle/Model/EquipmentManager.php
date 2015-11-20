<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 13:33
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Tlt\Bundle\TicketBundle\Entity\Equipment;
use Doctrine\ORM\EntityManager;

use Oro\Bundle\SecurityBundle\ORM\Walker\AclHelper;

class EquipmentManager
{
    /**
     * @var EntityManager
     */
    protected $entityManager;
    /**
     * @var AclHelper
     */
    protected $aclHelper;

    /**
     * @param EntityManager $entityManager
     * @param AclHelper $aclHelper
     */
    public function __construct(
        EntityManager $entityManager,
        AclHelper $aclHelper
    )
    {
        $this->entityManager = $entityManager;
        $this->aclHelper = $aclHelper;
    }

    /**
     * @return Equipment
     */
    public function createEquipment()
    {
        return $this->createEquipmentObject();
    }

    /**
     * @return Equipment
     */
    protected function createEquipmentObject()
    {
        return new Equipment();
    }
}