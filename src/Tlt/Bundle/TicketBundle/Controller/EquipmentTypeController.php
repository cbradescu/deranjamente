<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 10:13
 */
namespace Tlt\Bundle\TicketBundle\Controller;

use Tlt\Bundle\TicketBundle\Entity\EquipmentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

/**
 * @Route("/equipment_type")
 */
class EquipmentTypeController extends Controller
{
    /**
     * @Route("/index", name="tlt_ticket_equipment_type_index")
     * @Template()
     * @AclAncestor("tlt_ticket_equipment_type_view")
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/view/{id}", name="tlt_ticket_equipment_type_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("tlt_ticket_equipment_type_view")
     */
    public function viewAction(EquipmentType $equipmentType)
    {
        return [
            'entity' => $equipmentType
        ];
    }

    /**
     * @Route("/create", name="tlt_ticket_equipment_type_create")
     * @AclAncestor("tlt_ticket_equipment_type_create")
     * @Template("TltTicketBundle:EquipmentType:update.html.twig")
     */
    public function createAction()
    {
        $equipmentType = $this->get('tlt_ticket_equipment_type.manager')->createEquipmentType();

        return $this->update($equipmentType);
    }

    /**
     * @Route("/update/{id}", name="tlt_ticket_equipment_type_update", requirements={"id"="\d+"})
     * @Template("TltTicketBundle:EquipmentType:update.html.twig")
     * @Template
     * @AclAncestor("tlt_ticket_equipment_type_update")
     */
    public function updateAction(EquipmentType $equipmentType)
    {
        return $this->update($equipmentType);
    }

    /**
     * @param EquipmentType $equipmentType
     * @return array
     */
    protected function update(EquipmentType $entity)
    {
        if (!$entity) {
            $entity = $this->getManager()->createEntity();
        }
        return $this->get('oro_form.model.update_handler')->handleUpdate(
            $entity,
            $this->get('tlt_ticket_equipment_type.form.entity'),
            function (EquipmentType $entity) {
                return array(
                    'route' => 'tlt_ticket_equipment_type_update',
                    'parameters' => array('id' => $entity->getId())
                );
            },
            function (EquipmentType $entity) {
                return array(
                    'route' => 'tlt_ticket_equipment_type_view',
                    'parameters' => array('id' => $entity->getId())
                );
            },
            $this->get('translator')->trans('tlt.ticket.equipmenttype.message.saved'),
            $this->get('tlt_ticket_equipment_type.form.handler.entity')
        );
    }
}