<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class JournalTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testExpansions() {
    $data = self::$Wow->journal()->expansions();
    $this->assert(is_array($data->tiers));
  }

  /**
   * @throws ApiException
   */
  public function testExpansion() {
    $data = self::$Wow->journal()->expansion(68);
    $this->assertEqual('Blackfathom Deeps', $data->dungeons[0]->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testEncounters() {
    $data = self::$Wow->journal()->encounters();
    $this->assert(is_array($data->encounters));
  }

  /**
   * @throws ApiException
   */
  public function testEncounter() {
    $data = self::$Wow->journal()->encounter(89);
    $this->assertEqual('Glubtok', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testInstances() {
    $data = self::$Wow->journal()->instances();
    $this->assert(is_array($data->instances));
  }

  /**
   * @throws ApiException
   */
  public function testInstance() {
    $data = self::$Wow->journal()->instance(68);
    $this->assertEqual('The Vortex Pinnacle', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testMedia() {
    $data = self::$Wow->journal()->media(63);
    $this->assert(is_array($data->assets));
  }

  /**
   * @throws ApiException
   */
  public function testSearch() {
    $data = self::$Wow->journal()->search(['search'=>'instance.id=73', '&_pageSize=1']);
    $this->assertEqual("Blackwing Descent", $data->results[0]->data->instance->name->en_US);
  }
}
