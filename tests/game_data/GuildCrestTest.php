<?php

namespace BlizzardApi\Test;
use BlizzardApi\ApiException;

class GuildCrestTest extends ApiTest
{
  /**
   * @throws ApiException
   */
  public function testIndex() {
    $data = self::$Wow->guild_crest()->index();
    $this->assertEqual(6, count($data->borders));
    $this->assertEqual(196, count($data->emblems));
  }

  /**
   * @throws ApiException
   */
  public function testIndexClassic() {
    $data = self::$Wow->guild_crest()->index(['classic' => true]);
    $this->assertEqual(196, count($data->emblems));
    $this->assertEqual(6, count($data->borders));
  }

  /**
   * @throws ApiException
   */
  public function testBordersMedia() {
    $data = self::$Wow->guild_crest()->borderMedia(0);
    $this->assertEqual('https://render-us.worldofwarcraft.com/guild/tabards/border_00.png', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testBorderMediaClassic() {
    $data = self::$Wow->guild_crest()->borderMedia(0, ['classic' => true]);
    $this->assertEqual('https://render-classic-us.worldofwarcraft.com/guild/tabards/border_00.png', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testEmblemMedia() {
    $data = self::$Wow->guild_crest()->emblemMedia(0);
    $this->assertEqual('https://render-us.worldofwarcraft.com/guild/tabards/emblem_00.png', $data->assets[0]->value);
  }

  /**
   * @throws ApiException
   */
  public function testEmblemMediaClassic() {
    $data = self::$Wow->guild_crest()->emblemMedia(0, ['classic' => true]);
    $this->assertEqual('https://render-classic-us.worldofwarcraft.com/guild/tabards/emblem_00.png', $data->assets[0]->value);
  }
}