<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class ConnectedRealmTest extends ApiTest
{
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->connected_realms()->index();
    $this->assertGreaterThanOrEqual(10, count($data->connected_realms));
  }

  /**
   * @throws ApiException
   */
  public function testIndexClassic() {
    $data = self::$Wow->connected_realms()->index(['classic' => true]);
    $this->assertEqual(76, count($data->connected_realms));
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->connected_realms()->get(61);
    $this->assertEqual("Zul'jin", $data->realms[0]->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testGetClassic() {
    $data = self::$Wow->connected_realms()->get(4388, ['classic' => true]);
    $this->assertEqual("Westfall", $data->realms[0]->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testSearch() {
    $data = self::$Wow->connected_realms()->search(['search' => 'realms.slug=zuljin']);
    $this->assertEqual("America/New_York", $data->results[0]->data->realms[0]->timezone);
  }

  /**
   * @throws ApiException
   */
  public function testSearchClassic() {
    $data = self::$Wow->connected_realms()->search(['search' => 'realms.slug=mankrik'], ['classic' => true]);
    $this->assertEqual("America/New_York", $data->results[0]->data->realms[0]->timezone);
  }
}