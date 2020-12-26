<?php

namespace BlizzardApi\Wow\Profile;

use BlizzardApi\Wow\Request;
use Error;

class Guild extends Request
{
  public function index() {
    throw new Error('The Guild endpoint does not have an index method.');
  }

  /**
   * Returns a single guild's activity by name and realm
   * @param $realm string The slug of the realm
   * @param $guild string The slug of the guild
   * @param $options array Request options
   * @return mixed
   */
  public function get($realm, $guild, $options = []) {
    return $this->guild_request($realm, $guild, $options);
  }
  /**
   * Returns a single guild's activity by name and realm
   * @param $realm string The slug of the realm
   * @param $guild string The slug of the guild
   * @param $options array Request options
   * @return mixed
   */
  public function activity($realm, $guild, $options = []) {
    return $this->guild_request($realm, $guild, 'activity', $options);
  }
  /**
   * Returns a single guild's achievements by name and realm
   * @param $realm string The slug of the realm
   * @param $guild string The slug of the guild
   * @param $options array Request options
   * @return mixed
   */
  public function achievements($realm, $guild, $options = []) {
    return $this->guild_request($realm, $guild, 'achievements', $options);
  }

  /**
   * Returns a single guild's roster by its name and realm
   * @param $realm string The slug of the realm
   * @param $guild string The slug of the guild
   * @param $options array Request options
   * @return mixed
   */
  public function roster($realm, $guild, $options = []) {
    return $this->guild_request($realm, $guild, 'roster', $options);
  }

  private function guild_request($realm, $guild, $variant = null, $options = []) {
    $realm = $this->createSlug($realm);
    $guild = $this->createSlug($guild);
    $url = "{$this->baseUrl('game_data')}/guild/$realm/$guild";
    if ($variant) {
      $url .= "/$variant";
    }
    return $this->apiRequest($url, array_merge(['namespace' => PROFILE_NAMESPACE, 'ttl' => self::CACHE_DAY], $options));
  }
}