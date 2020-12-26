<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class PlayableSpecializationTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testMedia() {
    $data = self::$Wow->playable_specialization()->media(262);
    $this->assertEqual("https://render-us.worldofwarcraft.com/icons/56/spell_nature_lightning.jpg", ($data->assets[0]->value));
  }

  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->playable_specialization()->index();
    $this->assert(is_array($data->character_specializations));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->playable_specialization()->get(262);
    $this->assertEqual('Elemental', $data->name->en_US);
  }
}
