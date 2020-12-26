<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class MythicKeystoneAffixTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testMedia() {
    $data = self::$Wow->mythic_keystone_affix()->media(1);
    $this->assert(is_array($data->assets));
  }

  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->mythic_keystone_affix()->index();
    $this->assert(is_array($data->affixes));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->mythic_keystone_affix()->get(2);
    $this->assertEqual('Skittish', $data->name->en_US);
  }
}