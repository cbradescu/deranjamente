<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 10:13
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Tlt\Bundle\TicketBundle\Entity\EquipmentType;
use Doctrine\ORM\EntityManager;

use Oro\Bundle\SecurityBundle\ORM\Walker\AclHelper;

class EquipmentTypeManager
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
     * @return EquipmentType
     */
    public function createEquipmentType()
    {
        return $this->createEquipmentTypeObject();
    }

    /**
     * @return EquipmentType
     */
    protected function createEquipmentTypeObject()
    {
        return new EquipmentType();
    }
}