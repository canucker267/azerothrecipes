<?php

namespace BlizzardApi\Wow\GameData;

class ConnectedRealms extends GenericDataEndpoint {
  /**
   * Performs a search of connected realms
   * @param $search array Search parameters
   * @param $options array Request options
   * @return mixed
   */
  public function search($search = [], $options = []) {
    return $this->apiSearchRequest("{$this->baseUrl('game_data')}/search/$this->endpoint", $search, $this->defaultOptions($options));
  }

  protected function endpointSetup() {
    $this->namespace = DYNAMIC_NAMESPACE;
    $this->ttl = self::CACHE_MONTH;
    $this->endpoint = 'connected-realm';
  }
}