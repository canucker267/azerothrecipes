<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class PlayableClassTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->playable_class()->index();
    $this->assert(is_array($data->classes));
  }

  /**
   * @throws ApiException
   */
  public function testIndexClassic() {
    $data = self::$Wow->playable_class()->index(['classic' => true]);
    $this->assert(is_array($data->classes));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->playable_class()->get(7);
    $this->assertEqual('Shaman', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testGetClassic() {
    $data = self::$Wow->playable_class()->get(7, ['classic' => true]);
    $this->assertEqual('Shaman', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testMedia() {
    $data = self::$Wow->playable_class()->media(7);
    $this->assert(is_array($data->assets));
  }

  /**
   * @throws ApiException
   */
  public function testMediaClassic() {
    $data = self::$Wow->playable_class()->media(7, ['classic' => true]);
    $this->assert(is_array($data->assets));
  }

  /**
   * @throws ApiException
   */
  public function testPvpTalentSlots() {
    $data = self::$Wow->playable_class()->pvpTalentSlots(7);
    $this->assert(is_array($data->talent_slots));
  }
}
