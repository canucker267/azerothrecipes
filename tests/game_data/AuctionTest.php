<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class AuctionTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->auction()->get(4);
    $this->assert(is_array($data->auctions));
  }
}