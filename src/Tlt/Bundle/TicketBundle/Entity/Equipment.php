<?php
/**
 * Created by orm-generator.
 * User: catalin
 * Date: 19/Nov/15
 * Time: 13:33
 */

namespace Tlt\Bundle\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\DataAuditBundle\Metadata\Annotation as Oro;
use Oro\Bundle\OrganizationBundle\Entity\Organization;
use Oro\Bundle\UserBundle\Entity\User;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\ConfigField;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="tlt_ticket_equipment"
 * )
 * @ORM\HasLifecycleCallbacks()
 * @Oro\Loggable
 * @Config(
 *      routeName="tlt_ticket_equipment_index",
 *      routeView="tlt_ticket_equipment_view",
 *      defaultValues={
 *          "dataaudit"={
 *              "auditable"=true
 *          },
 *          "entity"={
 *              "icon"="icon-list-alt"
 *          },
 *          "ownership"={
 *              "owner_type"="USER",
 *              "owner_field_name"="owner",
 *              "owner_column_name"="owner_id",
 *              "organization_field_name"="organization",
 *              "organization_column_name"="organization_id"
 *          },
 *          "security"={
 *              "type"="ACL"
 *          }
 *      }
 * )
 */

class Equipment
{
    const PROPERTY_TELETRANS    = 1;
    const PROPERTY_LEASING      = 2;
    const PROPERTY_CLIENT       = 3;

    static $propertyLabels = array(
        self::PROPERTY_TELETRANS    => 'tlt.ticket.equipment.property.teletrans.label',
        self::PROPERTY_LEASING      => 'tlt.ticket.equipment.property.leasing.label',
        self::PROPERTY_CLIENT       => 'tlt.ticket.equipment.property.client.label',
    );

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    protected $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Oro\Bundle\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $owner;

    /**
     * @var Organization
     *
     * @ORM\ManyToOne(targetEntity="Oro\Bundle\OrganizationBundle\Entity\Organization")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $organization;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    protected $name;

    /**
     * @var EquipmentType
     *
     * @ORM\ManyToOne(targetEntity="Tlt\Bundle\TicketBundle\Entity\EquipmentType")
     * @ORM\JoinColumn(name="equipment_type_id", referencedColumnName="id", onDelete="SET NULL")
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    protected $equipmentType;

    /**
     * @var integer
     *
     * @ORM\Column(name="property", type="integer", nullable=true)
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    protected $property;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="guarantee_date", type="datetime")
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    protected $guarantee;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    protected $enabled = true;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->name;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param Organization $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return EquipmentType
     */
    public function getEquipmentType()
    {
        return $this->equipmentType;
    }

    /**
     * @param EquipmentType $equipmentType
     */
    public function setEquipmentType($equipmentType)
    {
        $this->equipmentType = $equipmentType;
    }

    /**
     * @return int
     */
    public function getProperty()
    {
        return self::getPropertyLabelForIndex($this->property);
    }

    /**
     * @param int $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
    }

    /**
     * @return \DateTime
     */
    public function getGuarantee()
    {
        return $this->guarantee;
    }

    /**
     * @param \DateTime $guarantee
     */
    public function setGuarantee($guarantee)
    {
        $this->guarantee = $guarantee;
    }

    /**
     * {@inheritDoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled Equipment state
     *
     * @return Equipment
     */
    public function setEnabled($enabled)
    {
        $this->enabled = (bool)$enabled;

        return $this;
    }


    /**
     * @return array
     */
    public static function getPropertyLabels()
    {
        return self::$propertyLabels;
    }

    /**
     * @param integer $value
     * @return string
     */
    public static function getPropertyLabelForIndex($value)
    {
        return self::$propertyLabels[$value];
    }
}