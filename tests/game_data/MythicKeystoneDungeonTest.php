<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class MythicKeystoneDungeonTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testDungeons() {
    $data = self::$Wow->mythic_keystone_dungeon()->dungeons();
    $this->assert(is_array($data->dungeons));
  }

  /**
   * @throws ApiException
   */
  public function testDungeon() {
    $data = self::$Wow->mythic_keystone_dungeon()->dungeon(244);
    $this->assert(is_array($data->keystone_upgrades));
  }

  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->mythic_keystone_dungeon()->index();
    $this->assertEqual('https://us.api.blizzard.com/data/wow/mythic-keystone/season/?namespace=dynamic-us', $data->seasons->href);
  }

  /**
   * @throws ApiException
   */
  public function testPeriods() {
    $data = self::$Wow->mythic_keystone_dungeon()->periods();
    $this->assert(is_array($data->periods));
  }

  /**
   * @throws ApiException
   */
  public function testPeriod() {
    $data = self::$Wow->mythic_keystone_dungeon()->period(641);
    $this->assertEqual(1523372400000, $data->start_timestamp);
  }

  /**
   * @throws ApiException
   */
  public function testSeasons() {
    $data = self::$Wow->mythic_keystone_dungeon()->seasons();
    $this->assert(is_array($data->seasons));
  }

  /**
   * @throws ApiException
   */
  public function testSeason() {
    $data = self::$Wow->mythic_keystone_dungeon()->season(1);
    $this->assert(is_array($data->periods));
  }
}
