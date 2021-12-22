<?php

namespace Customize\Entity;

use Eccube\Annotation\EntityExtension;
use Doctrine\ORM\Mapping as ORM;

/**
 * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{

  /**
     * @var int
     *
     * @ORM\Column(name="registration_type", type="integer")
     *
     */
    private $registration_type;

    /**
     * Set registrationType.
     *
     * @param string $registrationType
     *
     * @return Customer
     */
    public function setregistrationType($registrationType)
    {
        $this->registration_type = $registrationType;
        return $this;
    }

    /**
     * Get registrationType.
     *
     * @return string
     */
    public function getregistrationType()
    {
        return $this->registration_type;
    }

}
