<?php

namespace BlizzardApi\Wow\GameData;

class Achievement extends GenericDataEndpoint
{
  /**
   * Returns an index of achievement categories
   * @param $options array Request options
   * @return mixed
   */
  public function categories($options = []) {
    return $this->apiRequest("{$this->endpointUri('category')}/index", $this->defaultOptions($options));
  }

  /**
   * Returns an Achievement Category by ID
   * @param $id int The ID of the achievement category
   * @param $options array Request options
   * @return mixed
   */
  public function category($id, $options = []) {
    return $this->apiRequest("{$this->endpointUri('category')}/$id", $this->defaultOptions($options));
  }

  /**
   * Returns media for an Achievement by ID
   * @param $id int The ID of the achievement
   * @param $options array Request options
   * @return mixed
   */
  public function media($id, $options = []) {
    return $this->apiRequest("{$this->baseUrl('media')}/achievement/$id", $this->defaultOptions($options));
  }

  protected function endpointSetup($options = []) {
    $this->namespace = STATIC_NAMESPACE;
    $this->ttl = self::CACHE_TRIMESTER;
    $this->endpoint = 'achievement';
  }
}