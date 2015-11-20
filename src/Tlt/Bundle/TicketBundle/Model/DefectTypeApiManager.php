<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 18/Nov/15
 * Time: 15:12
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Oro\Bundle\SoapBundle\Entity\Manager\ApiEntityManager;

class DefectTypeApiManager extends ApiEntityManager
{
    /**
     * @var DefectTypeManager
     */
    protected $defectTypeManager;

    /**
     * Constructor
     *
     * @param string $class Entity name
     * @param ObjectManager $om Object manager
     * @param DefectTypeManager $defectTypeManager
     */
    public function __construct($class, ObjectManager $om, DefectTypeManager $defectTypeManager)
    {
        $this->defectTypeManager = $defectTypeManager;
        parent::__construct($class, $om);
    }

    /**
     * {@inheritdoc}
     */
    public function createEntity()
    {
        return $this->defectTypeManager->createDefectType();
    }
}