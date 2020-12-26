<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class TalentTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = $this::$Wow->talent()->index();
    $this->assert(is_array($data->talents));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = $this::$Wow->talent()->get(23106);
    $this->assertEqual("Eye of the Tiger", $data->spell->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testPvpIndex() {
    $data = $this::$Wow->talent()->pvpIndex();
    $this->assert(is_array($data->pvp_talents));
  }

  /**
   * @throws ApiException
   */
  public function testPvp() {
    $data = $this::$Wow->talent()->pvp(166);
    $this->assertEqual("Barbarian", $data->spell->name->en_US);
  }
}
