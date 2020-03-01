<?php

namespace App\PropertyAnalyticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropertyAnalytics Entity
 *
 * @ORM\Table(name="property_analytics")
 * @ORM\Entity(repositoryClass="App\PropertyAnalyticBundle\Repository\PropertyAnalyticsRepository")
 */
class PropertyAnalytics
{
    /**
     * PropertyAnalytics Id
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * PropertyAnalytics added
     *
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * PropertyAnalytics updated
     *
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * Mapped to Properties Entity
     *
     * @ORM\ManyToOne(targetEntity="Properties")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="id", nullable=true)
     *
     * @var Properties|null
     **/
//    private $property_id;

    /**
     * Mapped to AnalyticsTypes Entity
     *
     * @ORM\ManyToOne(targetEntity="AnalyticsTypes")
     * @ORM\JoinColumn(name="analytic_type_id", referencedColumnName="id", nullable=true)
     *
     * @var Properties|null
     **/
//    private $analytic_type_id;

    /**
     * Defined the current phase which Performance is Active in it. Note that
     * we may have multiple Workflow at a same time being active but all must
     * be in a same Phase.
     *
     * @var int
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
//
//    /**
//     * @return Properties|null
//     */
//    public function getPropertyId(): ?Properties
//    {
//        return $this->property_id;
//    }
//
//    /**
//     * @param Properties|null $property_id
//     */
//    public function setPropertyId(?Properties $property_id): void
//    {
//        $this->property_id = $property_id;
//    }
//
//    /**
//     * @return Properties|null
//     */
//    public function getAnalyticTypeId(): ?Properties
//    {
//        return $this->analytic_type_id;
//    }
//
//    /**
//     * @param Properties|null $analytic_type_id
//     */
//    public function setAnalyticTypeId(?Properties $analytic_type_id): void
//    {
//        $this->analytic_type_id = $analytic_type_id;
//    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value)
    {
        $this->value = $value;

        return $this;
    }
}
