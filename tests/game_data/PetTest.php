<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class PetTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->pet()->index();
    $this->assert(is_array($data->pets));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->pet()->get(39);
    $this->assertEqual('Mechanical Squirrel', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testMedia() {
    $data = self::$Wow->pet()->media(39);
    $this->assertEqual('https://render-us.worldofwarcraft.com/icons/56/inv_pet_mechanicalsquirrel.jpg', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testAbilities() {
    $data = self::$Wow->pet()->abilities();
    $this->assert(is_array($data->abilities));
  }

  /**
   * @throws ApiException
   */
  public function testAbility() {
    $data = self::$Wow->pet()->ability(110);
    $this->assertEqual('Bite', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testAbilityMedia() {
    $data = self::$Wow->pet()->abilityMedia(110);
    $this->assertEqual('https://render-us.worldofwarcraft.com/icons/56/ability_druid_ferociousbite.jpg', $data->assets[0]->value);
  }
}
