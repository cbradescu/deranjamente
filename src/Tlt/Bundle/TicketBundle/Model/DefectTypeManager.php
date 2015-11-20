<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 18/Nov/15
 * Time: 15:12
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Tlt\Bundle\TicketBundle\Entity\DefectType;
use Doctrine\ORM\EntityManager;

use Oro\Bundle\SecurityBundle\ORM\Walker\AclHelper;

class DefectTypeManager
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
     * @return DefectType
     */
    public function createDefectType()
    {
        return $this->createDefectTypeObject();
    }

    /**
     * @return DefectType
     */
    protected function createDefectTypeObject()
    {
        return new DefectType();
    }
}