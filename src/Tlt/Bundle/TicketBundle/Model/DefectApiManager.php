<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 25/Nov/15
 * Time: 11:28
 */

namespace Tlt\Bundle\TicketBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Oro\Bundle\SoapBundle\Entity\Manager\ApiEntityManager;

class DefectApiManager extends ApiEntityManager
{
    /**
     * @var DefectManager
     */
    protected $defectManager;

    /**
     * Constructor
     *
     * @param string $class Entity name
     * @param ObjectManager $om Object manager
     * @param DefectManager $defectManager
     */
    public function __construct($class, ObjectManager $om, DefectManager $defectManager)
    {
        $this->defectManager = $defectManager;
        parent::__construct($class, $om);
    }

    /**
     * {@inheritdoc}
     */
    public function createEntity()
    {
        return $this->defectManager->createDefect();
    }
}