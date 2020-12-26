<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class MythicKeystoneLeaderboardTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->mythic_keystone_leaderboard()->index(11);
    $this->assert(is_array($data->current_leaderboards));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->mythic_keystone_leaderboard()->get(11, 197, 641);
    $this->assert(is_array($data->leading_groups));
  }
}
