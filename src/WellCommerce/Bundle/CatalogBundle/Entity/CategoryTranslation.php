<?php

namespace WellCommerce\Bundle\CatalogBundle\Entity;

use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use WellCommerce\Bundle\CommonBundle\Entity\Behaviours\RoutableTrait;
use WellCommerce\Bundle\CommonBundle\Entity\RoutableSubjectInterface;
use WellCommerce\Bundle\CommonBundle\ORM\LocaleAwareInterface;
use WellCommerce\Bundle\CoreBundle\Entity\Meta;

/**
 * Class CategoryTranslation
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CategoryTranslation implements RoutableSubjectInterface, LocaleAwareInterface
{
    use Translation;
    use RoutableTrait;

    /**
     * @var \WellCommerce\Bundle\CatalogBundle\Entity\CategoryRoute
     */
    protected $route;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $shortDescription;

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * @var string
     */
    protected $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param Meta $meta
     */
    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return CategoryRoute|\WellCommerce\Bundle\CommonBundle\Entity\RouteInterface
     */
    public function getRouteEntity()
    {
        return new CategoryRoute();
    }
}
