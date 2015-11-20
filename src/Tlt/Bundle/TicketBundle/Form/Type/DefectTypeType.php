<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 18/Nov/15
 * Time: 15:12
 */

namespace Tlt\Bundle\TicketBundle\Form\Type;

use Tlt\Bundle\TicketBundle\Entity\DefectType;
use Tlt\Bundle\TicketBundle\Entity\DefectTypeType as DefectTypeTypeEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;

use Oro\Bundle\LocaleBundle\Formatter\NameFormatter;
use Oro\Bundle\SecurityBundle\SecurityFacade;
use Oro\Bundle\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Routing\Router;

class DefectTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                'text',
                [
                    'label' => 'tlt.ticket.defecttype.name.label',
                    'required' => true
                ]
            )
            ->add(
                'description',
                'textarea',
                [
                    'label' => 'tlt.ticket.defecttype.description.label',
                    'required' => false
                ]
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'Tlt\\Bundle\\TicketBundle\\Entity\\DefectType',
                'intention' => 'tlt_ticket_defect_type_entity',
                'cascade_validation' => true,
                'ownership_disabled' => true
            ]
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'tlt_ticket_defect_type';
    }

}