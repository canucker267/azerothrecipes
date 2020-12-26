<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class ReputationsTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testFactions() {
    $data = $this::$Wow->reputations()->factions();
    $this->assert(is_array($data->factions));
  }

  /**
   * @throws ApiException
   */
  public function testFaction() {
    $data = $this::$Wow->reputations()->faction(67);
    $this->assertEqual("Horde", $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testTiersIndex() {
    $data = $this::$Wow->reputations()->tiersIndex();
    $this->assert(is_array($data->reputation_tiers));
  }

  /**
   * @throws ApiException
   */
  public function testTiers() {
    $data = $this::$Wow->reputations()->tiers(2);
    $this->assert(is_array($data->tiers));
  }
}
