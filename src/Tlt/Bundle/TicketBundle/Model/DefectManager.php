<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 25/Nov/15
 * Time: 11:28
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Tlt\Bundle\TicketBundle\Entity\Defect;
use Doctrine\ORM\EntityManager;

use Oro\Bundle\SecurityBundle\ORM\Walker\AclHelper;

class DefectManager
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
     * @return Defect
     */
    public function createDefect()
    {
        return $this->createDefectObject();
    }

    /**
     * @return Defect
     */
    protected function createDefectObject()
    {
        return new Defect();
    }
}