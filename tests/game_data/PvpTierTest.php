<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class PvpTierTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testMedia() {
    $data = self::$Wow->pvp_tier()->media(1);
    $this->assertEqual("https://render-us.worldofwarcraft.com/icons/56/ui_rankedpvp_01.jpg", ($data->assets[0]->value));
  }

  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->pvp_tier()->index();
    $this->assert(is_array($data->tiers));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->pvp_tier()->get(1);
    $this->assertEqual('Unranked', $data->name->en_US);
  }
}
