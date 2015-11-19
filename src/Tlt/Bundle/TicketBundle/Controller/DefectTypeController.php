<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 18/Nov/15
 * Time: 15:12
 */
namespace Tlt\Bundle\TicketBundle\Controller;

use Tlt\Bundle\TicketBundle\Entity\DefectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

/**
 * @Route("/defect_type")
 */
class DefectTypeController extends Controller
{
    /**
     * @Route("/index", name="tlt_ticket_defect_type_index")
     * @Template()
     * @AclAncestor("tlt_ticket_defect_type_view")
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/view/{id}", name="tlt_ticket_defect_type_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("tlt_ticket_defect_type_view")
     */
    public function viewAction(DefectType $defectType)
    {
        return [
            'entity' => $defectType
        ];
    }

    /**
     * @Route("/create", name="tlt_ticket_defect_type_create")
     * @AclAncestor("tlt_ticket_defect_type_create")
     * @Template("TltTicketBundle:DefectType:update.html.twig")
     */
    public function createAction()
    {
        $defectType = $this->get('tlt_ticket_defect_type.manager')->createDefectType();

        return $this->update($defectType);
    }

    /**
     * @Route("/update/{id}", name="tlt_ticket_defect_type_update", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("tlt_ticket_defect_type_update")
     */
    public function updateAction(DefectType $defectType)
    {
        return $this->update($defectType);
    }

    /**
     * @param DefectType $defectType
     * @return array
     */
    protected function update(DefectType $defectType)
    {
        if ($this->get('tlt_ticket_defect_type.form.handler.entity')->process($defectType)) {
            $this->get('session')->getFlashBag()->add(
                'success',
                $this->get('translator')->trans('tlt.ticket.defecttype.message.saved')
            );

            return $this->get('oro_ui.router')->redirectAfterSave(
                ['route' => 'tlt_ticket_defect_type_update', 'parameters' => ['id' => $defectType->getId()]],
                ['route' => 'tlt_ticket_defect_type_view', 'parameters' => ['id' => $defectType->getId()]]
            );
        }

        return array(
            'entity' => $defectType,
            'form' => $this->get('tlt_ticket_defect_type.form.entity')->createView()
        );
    }
}