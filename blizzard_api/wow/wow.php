<?php /** @noinspection PhpIncludeInspection */

namespace BlizzardApi\Wow;
use BlizzardApi\Cache\CacheInterface;
use BlizzardApi\ApiException;

require_once __DIR__ . '/request.php';
require_once __DIR__ . '/game_data/generic_endpoint.php';

class Wow {
  private $defaultRegion;
  private $cache;

  public function __construct($region = 'us', CacheInterface $cache = null) {
    $this->defaultRegion = $region;
    $this->cache = $cache;
  }

  # GAME DATA ENDPOINTS

  /**
   * @return GameData\Achievement
   * @throws ApiException
   */
  public function achievement() {
    return new GameData\Achievement($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Auction
   * @throws ApiException
   */
  public function auction() {
    return new GameData\Auction($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\AzeriteEssence
   * @throws ApiException
   */
  public function azerite_essence() {
    return new GameData\AzeriteEssence($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\ConnectedRealms
   * @throws ApiException
   */
  public function connected_realms() {
    return new GameData\ConnectedRealms($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Creature
   * @throws ApiException
   */
  public function creatures() {
    return new GameData\Creature($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\GuildCrest
   * @throws ApiException
   */
  public function guild_crest() {
    return new GameData\GuildCrest($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Item
   * @throws ApiException
   */
  public function item() {
    return new GameData\Item($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Journal
   * @throws ApiException
   */
  public function journal() {
    return new GameData\Journal($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Media
   * @throws ApiException
   */
  public function media() {
    return new GameData\Media($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Mount
   * @throws ApiException
   */
  public function mount() {
    return new GameData\Mount($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\MythicKeystoneAffix
   * @throws ApiException
   */
  public function mythic_keystone_affix() {
    return new GameData\MythicKeystoneAffix($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\MythicKeystoneDungeon
   * @throws ApiException
   */
  public function mythic_keystone_dungeon() {
    return new GameData\MythicKeystoneDungeon($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\MythicKeystoneLeaderboard
   * @throws ApiException
   */
  public function mythic_keystone_leaderboard() {
    return new GameData\MythicKeystoneLeaderboard($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\MythicRaidLeaderboard
   * @throws ApiException
   */
  public function mythic_raid_leaderboard() {
    return new GameData\MythicRaidLeaderboard($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Pet
   * @throws ApiException
   */
  public function pet() {
    return new GameData\Pet($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\PlayableClass
   * @throws ApiException
   */
  public function playable_class() {
    return new GameData\PlayableClass($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\PlayableRace
   * @throws ApiException
   */
  public function playable_race() {
    return new GameData\PlayableRace($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\PlayableSpecialization
   * @throws ApiException
   */
  public function playable_specialization() {
    return new GameData\PlayableSpecialization($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\PowerType
   * @throws ApiException
   */
  public function power_type() {
    return new GameData\PowerType($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Profession
   * @throws ApiException
   */
  public function profession() {
    return new GameData\Profession($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\PvpSeason
   * @throws ApiException
   */
  public function pvp_season() {
    return new GameData\PvpSeason($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\PvpTier
   * @throws ApiException
   */
  public function pvp_tier() {
    return new GameData\PvpTier($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Quest
   * @throws ApiException
   */
  public function quest() {
    return new GameData\Quest($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Realm
   * @throws ApiException
   */
  public function realm() {
    return new GameData\Realm($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Region
   * @throws ApiException
   */
  public function region() {
    return new GameData\Region($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Reputations
   * @throws ApiException
   */
  public function reputations() {
    return new GameData\Reputations($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Spell
   * @throws ApiException
   */
  public function spell() {
    return new GameData\Spell($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Talent
   * @throws ApiException
   */
  public function talent() {
    return new GameData\Talent($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\Title
   * @throws ApiException
   */
  public function title() {
    return new GameData\Title($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return GameData\WowToken
   * @throws ApiException
   */
  public function wow_token() {
    return new GameData\WowToken($this->defaultRegion, null, $this->cache);
  }

  # Profile endpoints

  /**
   * @return Profile\Character
   * @throws ApiException
   */
  public function character() {
    return new Profile\Character($this->defaultRegion, null, $this->cache);
  }

  /**
   * @return Profile\Guild
   * @throws ApiException
   */
  public function guild() {
    return new Profile\Guild($this->defaultRegion, null, $this->cache);
  }
}