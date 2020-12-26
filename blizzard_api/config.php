<?php

namespace BlizzardApi;

class Config
{
  const VERSION = '1.0.0';

  public static $apiKey = 'e6ea0ca3adbb46e691dcafc87ed8daeb';
  public static $apiSecret = 'v40DzzrJswGv26jcBLRgwe428VXBi2Qy';
  public static $redirectURI = 'https://canucker267.github.io/wowrecipes/';

  public static $storeAccessTokenInSession = true;
  public static $accessTokenSessionKey = 'blizzard_api_access_token';
}