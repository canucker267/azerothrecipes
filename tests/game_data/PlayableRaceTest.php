<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class PlayableRaceTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->playable_race()->index();
    $this->assert(is_array($data->races));
  }

  /**
   * @throws ApiException
   */
  public function testIndexClassic() {
    $data = self::$Wow->playable_race()->index(['classic' => true]);
    $this->assert(is_array($data->races));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->playable_race()->get(2);
    $this->assertEqual('Orc', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testGetClassic() {
    $data = self::$Wow->playable_race()->get(2, ['classic' => true]);
    $this->assertEqual('Orc', $data->name->en_US);
  }
}
