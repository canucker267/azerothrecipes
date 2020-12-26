<?php

namespace BlizzardApi\Wow\GameData;

use Error;

class Auction extends GenericDataEndpoint {

  public function index($options = []) {
    throw new Error('The Auction endpoint does not have an index method.');
  }

  /**
   * Returns Returns all active auctions for a connected realm
   * @param $id int The ID of the connected realm
   * @param $options array Request options
   * @return mixed
   */
  public function get($id, $options = []) {
    return $this->apiRequest("{$this->endpointUri()}/$id/auctions", $this->defaultOptions($options));
  }

  protected function endpointSetup($options = []) {
    $this->namespace = DYNAMIC_NAMESPACE;
    $this->ttl = self::CACHE_TRIMESTER;
    $this->endpoint = 'connected-realm';
  }
}