<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class WoWTokenTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = $this::$Wow->wow_token()->index();
    $this->assertEqual("https://us.api.blizzard.com/data/wow/token/?namespace=dynamic-us", $data->_links->self->href);
  }
}
