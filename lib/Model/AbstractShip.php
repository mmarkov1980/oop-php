<?php

namespace Model;

abstract class AbstractShip
{
  private $id;

  private $name;

  private $weaponPower = 0;

  private $strength = 0;

  abstract public function getJediFactor();

  abstract public function getType();

  abstract public function isReadyToFlight();

  /**
   * @param string $shipName
   */
  public function __construct($shipName)
  {
    $this->name = $shipName;
  }

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
  public function setId($id)
  {
    $this->id = $id;
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
   * @return int
   */
  public function getWeaponPower()
  {
    return $this->weaponPower;
  }

  /**
   * @param int $weaponPower
   */
  public function setWeaponPower($weaponPower)
  {
    $this->weaponPower = $weaponPower;
  }

  /**
   * @return int
   */
  public function getStrength()
  {
    return $this->strength;
  }

  /**
   * @param int $strength
   * @throws \Exception
   */
  public function setStrength($strength)
  {
    if (!is_numeric($strength)) {
      throw new \Exception('Invalid strength passed ' . $strength);
    } else {
      $this->strength = $strength;
    }
  }

  public function getNameAndSpecs($useShortFormat = false)
  {
    if ($useShortFormat) {
      return sprintf(
        '%s: %s/%s/%s',
        $this->name,
        $this->weaponPower,
        $this->getJediFactor(),
        $this->strength
      );
    }
    else {
      return sprintf(
        '%s: w:%s, j:%s, s:%s',
        $this->name,
        $this->weaponPower,
        $this->getJediFactor(),
        $this->strength
      );
    }
  }

  public function doesGivenShipHaveMoreStrength($givenShip) {
    return $givenShip->strength > $this->strength;
  }
}