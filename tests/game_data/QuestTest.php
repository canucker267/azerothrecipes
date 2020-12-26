<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class QuestTest extends ApiTest {
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->quest()->index();
    $this->assertEqual("https://us.api.blizzard.com/data/wow/quest/?namespace=static-9.0.2_36532-us", $data->_links->self->href);
  }

  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->quest()->get(2);
    $this->assertEqual("Sharptalon's Claw", $data->title->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testCategories() {
    $data = self::$Wow->quest()->categories();
    $this->assert(is_array($data->categories));
  }

  /**
   * @throws ApiException
   */
  public function testCategory() {
    $data = self::$Wow->quest()->category(370);
    $this->assertEqual("Brewfest", $data->category->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testAreas() {
    $data = self::$Wow->quest()->areas();
    $this->assert(is_array($data->areas));
  }

  /**
   * @throws ApiException
   */
  public function testArea() {
    $data = self::$Wow->quest()->area(10);
    $this->assertEqual("Duskwood", $data->area->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testTypes() {
    $data = self::$Wow->quest()->types();
    $this->assert(is_array($data->types));
  }

  /**
   * @throws ApiException
   */
  public function testType() {
    $data = self::$Wow->quest()->type(62);
    $this->assertEqual("Raid", $data->type->en_US);
  }
}
