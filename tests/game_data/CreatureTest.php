<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class CreatureTest extends ApiTest
{
  /**
   * @throws ApiException
   */
  public function testGet() {
    $data = self::$Wow->creatures()->get(42722);
    $this->assertEqual('Young Mastiff', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testGetClassic() {
    $data = self::$Wow->creatures()->get(107, ['classic' => true]);
    $this->assertEqual('Raptor', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testFamilies() {
    $data = self::$Wow->creatures()->families();
    $this->assertEqual(81, count($data->creature_families));
  }

  /**
   * @throws ApiException
   */
  public function testFamiliesClassic() {
    $data = self::$Wow->creatures()->families(['classic' => true]);
    $this->assertEqual(23, count($data->creature_families));
  }

  /**
   * @throws ApiException
   */
  public function testFamily() {
    $data = self::$Wow->creatures()->family(1);
    $this->assertEqual('Wolf', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testFamilyClassic() {
    $data = self::$Wow->creatures()->family(1, ['classic' => true]);
    $this->assertEqual('Wolf', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testFamilyMedia() {
    $data = self::$Wow->creatures()->familyMedia(1);
    $this->assertEqual('https://render-us.worldofwarcraft.com/icons/56/ability_hunter_pet_wolf.jpg', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testFamilyMediaClassic() {
    $data = self::$Wow->creatures()->familyMedia(1, ['classic' => true]);
    $this->assertEqual('https://render-classic-us.worldofwarcraft.com/icons/56/ability_hunter_pet_wolf.jpg', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testTypes() {
    $data = self::$Wow->creatures()->types();
    $this->assertEqual(15, count($data->creature_types));
  }

  /**
   * @throws ApiException
   */
  public function testTypesClassic() {
    $data = self::$Wow->creatures()->types(['classic' => true]);
    $this->assertEqual(11, count($data->creature_types));
  }

  /**
   * @throws ApiException
   */
  public function testType() {
    $data = self::$Wow->creatures()->type(1);
    $this->assertEqual('Beast', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testTypeClassic() {
    $data = self::$Wow->creatures()->type(1, ['classic' => true]);
    $this->assertEqual('Beast', $data->name->en_US);
  }

  /**
   * @throws ApiException
   */
  public function testDisplayMedia() {
    $data = self::$Wow->creatures()->displayMedia(30221);
    $this->assertEqual('https://render-us.worldofwarcraft.com/npcs/zoom/creature-display-30221.jpg', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testDisplayMediaClassic() {
    $data = self::$Wow->creatures()->displayMedia(180, ['classic' => true]);
    $this->assertEqual('https://render-classic-us.worldofwarcraft.com/npcs/portrait/creature-display-180.jpg', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testSearch() {
    $data = self::$Wow->creatures()->search(['search' => 'data.id=40624', '&locale=en_US', '&orderby=id', '&_page=1']);
    $this->assertEqual('Celestial Dragon', $data->results[0]->data->name->en_US);
  }

}