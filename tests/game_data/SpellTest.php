<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class SpellTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = $this::$Wow->spell()->get(196607);
    $this->assertEqual("Eye of the Tiger", $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testMedia() {
    $data = $this::$Wow->spell()->media(196607);
    $this->assertEqual("https://render-us.worldofwarcraft.com/icons/56/ability_druid_primalprecision.jpg", $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testSearch() {
    $data = self::$Wow->spell()->search(['search' => 'id=196607']);
    $this->assertEqual("Eye of the Tiger", $data->results[0]->data->name->en_US);
  }
}
