<?php

namespace BlizzardApi\Test;
class PvpSeasonTest extends ApiTest {
  /**
   * @throws /ApiException
   */
  public function testSeasons() {
    $data = self::$Wow->pvp_season()->index();
    $this->assert(is_array($data->seasons));
  }

  /**
   * @throws /ApiException
   */
  public function testSeason() {
    $data = self::$Wow->pvp_season()->get(28);
    $this->assertEqual(28, $data->id);
  }

  /**
   * @throws /ApiException
   */
  public function testLeaderboards() {
    $data = self::$Wow->pvp_season()->leaderboards(28);
    $this->assert(is_array($data->leaderboards));
  }

  /**
   * @throws /ApiException
   */
  public function testLeaderboard() {
    $data = self::$Wow->pvp_season()->leaderboard(28, '3v3');
    $this->assert(is_array($data->entries));
  }

  /**
   * @throws /ApiException
   */
  public function testRewards() {
    $data = self::$Wow->pvp_season()->rewards(28);
    $this->assert(is_array($data->rewards));
  }
}
