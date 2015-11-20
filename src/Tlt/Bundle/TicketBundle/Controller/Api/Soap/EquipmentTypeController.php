<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 10:13
 */

namespace Tlt\Bundle\TicketBundle\Controller\Api\Soap;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Oro\Bundle\SoapBundle\Controller\Api\Soap\SoapController;

class EquipmentTypeController  extends SoapController
{
    /**
     * @Soap\Method("getEquipmentTypes")
     * @Soap\Param("page", phpType="int")
     * @Soap\Param("limit", phpType="int")
     * @Soap\Param("order", phpType="string")
     * @Soap\Result(phpType="Tlt\Bundle\TicketBundle\Entity\EquipmentTypeSoap[]")
     * @AclAncestor("tlt_ticket_equipment_type_view")
     */
    public function cgetAction($page = 1, $limit = 10, $order = 'DESC')
    {
        $order = (strtoupper($order) == 'ASC') ? $order : 'DESC';
        return $this->handleGetListRequest($page, $limit, [], array('reportedAt' => $order));
    }

    /**
     * @Soap\Method("getequipment_type")
     * @Soap\Param("id", phpType="int")
     * @Soap\Result(phpType="Tlt\Bundle\TicketBundle\Entity\EquipmentTypeSoap")
     * @AclAncestor("tlt_ticket_equipment_type_view")
     */
    public function getAction($id)
    {
        return $this->handleGetRequest($id);
    }

    /**
     * @Soap\Method("createEquipmentType")
     * @Soap\Param("equipment_type", phpType="Tlt\Bundle\TicketBundle\Entity\EquipmentTypeSoap")
     * @Soap\Result(phpType="int")
     * @AclAncestor("tlt_ticket_equipment_type_create")
     */
    public function createAction()
    {
        return $this->handleCreateRequest();
    }

    /**
     * @Soap\Method("updateEquipmentType")
     * @Soap\Param("id", phpType="int")
     * @Soap\Param("equipment_type", phpType="Tlt\Bundle\TicketBundle\Entity\EquipmentTypeSoap")
     * @Soap\Result(phpType="boolean")
     * @AclAncestor("tlt_ticket_equipment_type_update")
     */
    public function updateAction($id)
    {
        return $this->handleUpdateRequest($id);
    }

    /**
     * @Soap\Method("deleteEquipmentType")
     * @Soap\Param("id", phpType="int")
     * @Soap\Result(phpType="boolean")
     * @AclAncestor("tlt_ticket_equipment_type_delete")
     */
    public function deleteAction($id)
    {
        return $this->handleDeleteRequest($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getManager()
    {
        return $this->container->get('tlt_ticket_equipment_type.manager.api');
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        return $this->container->get('tlt_ticket_equipment_type.form.entity.api');
    }

    /**
     * {@inheritdoc}
     */
    public function getFormHandler()
    {
        return $this->container->get('tlt_ticket_equipment_type.form.handler.entity.api');
    }

    /**
     * {@inheritDoc}
     */
    protected function fixFormData(array &$data, $entity)
    {
        parent::fixFormData($data, $entity);

        unset($data['id']);
        unset($data['createdAt']);
        unset($data['updatedAt']);

        return true;
    }

}