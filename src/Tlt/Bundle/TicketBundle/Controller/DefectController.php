<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 25/Nov/15
 * Time: 11:28
 */
namespace Tlt\Bundle\TicketBundle\Controller;

use Tlt\Bundle\TicketBundle\Entity\Defect;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

/**
 * @Route("/defect")
 */
class DefectController extends Controller
{
    /**
     * @Route("/index", name="tlt_ticket_defect_index")
     * @Template()
     * @AclAncestor("tlt_ticket_defect_view")
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/view/{id}", name="tlt_ticket_defect_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("tlt_ticket_defect_view")
     */
    public function viewAction(Defect $defect)
    {
        return [
            'entity' => $defect
        ];
    }

    /**
     * @Route("/create", name="tlt_ticket_defect_create")
     * @AclAncestor("tlt_ticket_defect_create")
     * @Template("TltTicketBundle:Defect:update.html.twig")
     */
    public function createAction()
    {
        $defect = $this->get('tlt_ticket_defect.manager')->createDefect();
        $defect->setAnnouncedBy($this->getUser());

        return $this->update($defect);
    }

    /**
     * @Route("/update/{id}", name="tlt_ticket_defect_update", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("tlt_ticket_defect_update")
     */
    public function updateAction(Defect $defect)
    {
        return $this->update($defect);
    }

    /**
     * @param Defect $defect
     * @return array
     */
    protected function update(Defect $defect)
    {
        if ($this->get('tlt_ticket_defect.form.handler.entity')->process($defect)) {
            $this->get('session')->getFlashBag()->add(
                'success',
                $this->get('translator')->trans('tlt_ticket.defect.message.saved')
            );

            return $this->get('oro_ui.router')->redirectAfterSave(
                ['route' => 'tlt_ticket_defect_update', 'parameters' => ['id' => $defect->getId()]],
                ['route' => 'tlt_ticket_defect_view', 'parameters' => ['id' => $defect->getId()]]
            );
        }

        return array(
            'entity' => $defect,
            'form' => $this->get('tlt_ticket_defect.form.entity')->createView()
        );
    }
}