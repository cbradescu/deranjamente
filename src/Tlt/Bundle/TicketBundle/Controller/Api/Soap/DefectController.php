<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 25/Nov/15
 * Time: 11:28
 */

namespace Tlt\Bundle\TicketBundle\Controller\Api\Soap;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Oro\Bundle\SoapBundle\Controller\Api\Soap\SoapController;

class DefectController  extends SoapController
{
    /**
     * @Soap\Method("getDefects")
     * @Soap\Param("page", phpType="int")
     * @Soap\Param("limit", phpType="int")
     * @Soap\Param("order", phpType="string")
     * @Soap\Result(phpType="Tlt\Bundle\TicketBundle\Entity\DefectSoap[]")
     * @AclAncestor("tlt_ticket_defect_view")
     */
    public function cgetAction($page = 1, $limit = 10, $order = 'DESC')
    {
        $order = (strtoupper($order) == 'ASC') ? $order : 'DESC';
        return $this->handleGetListRequest($page, $limit, [], array('reportedAt' => $order));
    }

    /**
     * @Soap\Method("getdefect")
     * @Soap\Param("id", phpType="int")
     * @Soap\Result(phpType="Tlt\Bundle\TicketBundle\Entity\DefectSoap")
     * @AclAncestor("tlt_ticket_defect_view")
     */
    public function getAction($id)
    {
        return $this->handleGetRequest($id);
    }

    /**
     * @Soap\Method("createDefect")
     * @Soap\Param("defect", phpType="Tlt\Bundle\TicketBundle\Entity\DefectSoap")
     * @Soap\Result(phpType="int")
     * @AclAncestor("tlt_ticket_defect_create")
     */
    public function createAction()
    {
        return $this->handleCreateRequest();
    }

    /**
     * @Soap\Method("updateDefect")
     * @Soap\Param("id", phpType="int")
     * @Soap\Param("defect", phpType="Tlt\Bundle\TicketBundle\Entity\DefectSoap")
     * @Soap\Result(phpType="boolean")
     * @AclAncestor("tlt_ticket_defect_update")
     */
    public function updateAction($id)
    {
        return $this->handleUpdateRequest($id);
    }

    /**
     * @Soap\Method("deleteDefect")
     * @Soap\Param("id", phpType="int")
     * @Soap\Result(phpType="boolean")
     * @AclAncestor("tlt_ticket_defect_delete")
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
        return $this->container->get('tlt_ticket_defect.manager.api');
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        return $this->container->get('tlt_ticket_defect.form.entity.api');
    }

    /**
     * {@inheritdoc}
     */
    public function getFormHandler()
    {
        return $this->container->get('tlt_ticket_defect.form.handler.entity.api');
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