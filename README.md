# Blizzard API PHP Client - Updated Sept 2020

This package allows you to interface with the Blizzard API using the OAuth2 protocol for every request.

**Important**: This package does not support, nor will support China endpoints. 

## Table of contents
1. [Installation](#1-installation)
2. [Configuration](#2-configuration)
3. [Basic usage](#3-basic-usage)
   - 3.1 [Client credentials flow](#31-client-credential-flow)
   - 3.2 [Authorization code flow](#32-authorization-code-flow)
4. [Available endpoints](#4-available-endpoints)
   - 4.1. [World of Warcraft endpoints](#41-world-of-warcraft-endpoints)

## 1. Installation

At this moment no package manager is supported, installations options are: 

1. Download this repository
2. Add the repository as a git submodule

After that all you need to do is **require** the file `blizzard_api.php`. All the other files will be loaded as needed.  

## 2. Configuration

Before you use the api you must create a developer account at https://develop.battle.net, then create the client authorization keys.

Once you have a pair of Client ID and SECRET you must set up an initialization code by setting values to these class variables.

If you are using OAuth2 authorization code flow you must also supply the redirectURI.

```php
<?php
BlizzardApi\Config::$apiKey = '';
BlizzardApi\Config::$apiSecret = '';
BlizzardApi\Config::$redirectURI = '';

BlizzardApi\Config::$accessTokenSessionKey = 'blizzard_api_access_token';
BlizzardApi\Config::$storeAccessTokenInSession = true;
?>
```

## 3. Basic usage

### 3.1 Client credential flow

You can now consume the API by instantiating a specific endpoint. To reduce resource usage, a magic method is used to load classes on demand.

To obtain an instance of Blizzard\WoW\Profile::Character class you can use the following code:

```php
<?php
$apiClient = new BlizzardApi\Wow\Wow('us'); // If no region is passed 'US' is used
// This will autoload the Character class and return a new instance (Optional Locale option shown below)
$character = $apiClient->character()->get('realm_name', 'character', ['locale'=>'en_US']);
?>
```

Most **data** endpoints will have always 2 methods available `index` and `get`.

* `index` is used to get a list of all resources od that endpoint.
* `get` is used to get all information about a entry of the index returned data. It receives an id or slug as the first parameter, that depends on the endpoint.

### 3.2 Authorization code flow

To create a login with battle.net button you can use the following code:

```php
<?php
  $apiClient = new BlizzardApi\Wow\Request('us'); // If no region is passed 'US' is used
?>

<a href="<?= $apiClient->authorizationURL() ?>">Sign in with Battle.net</a>
```

In your redirect uri page, you must call:

```php
<?php
  $code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);

  $apiClient = new BlizzardApi\Wow\Request('us'); // If no region is passed 'US' is used
  $userAccessToken = $apiClient->createAccessToken($code);

```

## 4. Available endpoints

**Hint**: All methods support an additional optional array parameter [(Section 3.1)](#31-client-credential-flow) that allows you to override the following configurations for a single call:

* **ttl**: < int > - Cache duration (seconds) (Only works if you have redis enabled)
* **locale**: < locale id > - Changes the default locale (if any)
* **Classic Endpoints**: pass in optional - ['classic' => true]

### 4.1. World of Warcraft endpoints

* Blizzard::WoW::Achievement
    - index
    - get :id  
    - categories
    - category :id
    - media :id
    
  
* Blizzard::WoW::Auction
    - get :id
  
  
* Blizzard::WoW::AzeriteEssence
    - index
    - get :id
    - media :id
    - search
        - https://develop.battle.net/documentation/world-of-warcraft/guides/search
  
  
* Blizzard::WoW::ConnectedRealm
    - index
        - *Classic Supported*
    - get :id
        - *Classic Supported*
  
  
* Blizzard::WoW::Creature
    - get :id
        - *Classic Supported*
    - families
        - *Classic Supported*
    - family :id
        - *Classic Supported*
    - types
        - *Classic Supported*
    - type :id
        - *Classic Supported*
    - displayMedia :id
        - *Classic Supported*
    - familyMedia :id
        - *Classic Supported*
    - search
        - https://develop.battle.net/documentation/world-of-warcraft/guides/search
        - Classic endpoint not live yet
  
  
* Blizzard::WoW::GuildCrest
    - index
        - *Classic Supported*
    - borderMedia :id
        - *Classic Supported*
    - emblemMedia :id
        - *Classic Supported*
  
  
* Blizzard::WoW::Item
    - get :id
        - *Classic Supported*
    - classes
        - *Classic Supported*
    - class :id
        - *Classic Supported*
    - sets
    - set :id
    - subclass :class_id, :subclass_id
        - *Classic Supported*
    - media :id
        - *Classic Supported*
    - search
        - https://develop.battle.net/documentation/world-of-warcraft/guides/search
        - Classic endpoint not live yet
  
* Blizzard::WoW::Journal
    - expansions
    - expansion :id
    - encounters
    - encounter :id
    - instances
    - instance :id
    - media :id
    - search
        - https://develop.battle.net/documentation/world-of-warcraft/guides/search

* Blizzard::WoW::Media
    - search
        - https://develop.battle.net/documentation/world-of-warcraft/guides/search
        - Classic endpoint not live yet

  
* Blizzard::WoW::Mount
    - index
    - get :id
    - search
        - https://develop.battle.net/documentation/world-of-warcraft/guides/search
  
  
* Blizzard::WoW::MythicKeystoneAffix
    - index
    - get :id
    - media :id
  
  
* Blizzard::WoW::MythicKeystoneDungeon
    - index
    - dungeons
    - dungeon :id
    - periods
    - period :id
    - seasons
    - season :id
  
* Blizzard::WoW::MythicKeystoneLeaderboard
    - index :connected_realm_id
    - get :connected_realm_id, :dungeon_id, :period
  
  
* Blizzard::WoW::MythicRaidLeaderboard
    - get :raid, :faction
  
  
* Blizzard::WoW::Pet
    - index
    - get
    - ability :id
    - species :id
    - stats :level, :breed_id, :quality_id
    - types

* Blizzard::WoW::PlayableClass
    - index
        - *Classic Supported*
    - get :id
        - *Classic Supported*
    - media :id
        - *Classic Supported*
    - pvp_talent_slots :id


* Blizzard::WoW::PlayableRace
    - index
        - *Classic Supported*
    - get :id
        - *Classic Supported*
    - media :id
    
    
* Blizzard::WoW::PlayableSpecialization
    - index
    - get :id
    
* Blizzard::WoW::PowerType
    - index
        - *Classic Supported*
    - get :id
        - *Classic Supported*
  
* Blizzard::WoW::Profession
    - index
    - get :id
    - media :id
    - skillTier :profession_id, :skill_tier_id
    - recipe :id
    - recipeMedia :id
    
      
* Blizzard::WoW::PvPSeason
    - index
    - get :id
    - leaderboards :season_id
    - leaderboard :season_id, :bracket
    - rewards :season_id
    
* Blizzard::WoW::PvPTier
    - index
    - get :id
    - media :id
  
* Blizzard::WoW::Quest
    - index
    - get :id
    - categories
    - category :id
    - areas
    - area :id
    - types
    - type :id
   
* Blizzard::WoW::Realm
    - index
        - *Classic Supported*
    - get :realm_id or :realm_slug
        - *Classic Supported*
    
* Blizzard::WoW::Region
    - index
        - *Classic Supported*
    - get :id
        - *Classic Supported*

* Blizzard::WoW::Reputations
    - factions
    - faction :id
    - tiersIndex
    - tiers :id
  
* Blizzard::WoW::Spell
    - index
    - get :id
    - search
        - https://develop.battle.net/documentation/world-of-warcraft/guides/search

* Blizzard::WoW::Talent
    - index
    - get :id
    - pvpIndex
    - pvp :id
 
    
* Blizzard::WoW::Title
    - index
    - get :id

  
* Blizzard::WoW::WowToken
  - index


* BlizzardApi::WoW::CharacterProfile
  - get_user_characters :user_token
  - get :realm, :character, :fields
  - pvp_summary :realm, :character, :user_token
  - pvp_bracket :realm, :character, :bracket, :user_token
  - achievements :realm, :character
  - achievementsStatistics :realm, :character
  - appearance :realm, :character
  - collections :realm, :character
  - mount_collection :realm, :character
  - pet_collection :realm, :character
  - encounters :realm, :character
  - dungeons :realm, :character
  - raids :realm, :character
  - equipment :realm, :character
  - hunter_pets :realm, :character
  - media :realm, :character
  - professions :realm, :character
  - profile_status :realm, :character
  - pvp_bracket :realm, :character, :bracket
  - pvp_summary :realm, :character
  - quests :realm, :character
  - completed_quests :realm, :character
  - reputations :realm, :character
  - specializations :realm, :character
  - statistics :realm, :character
  - titles :realm, :character
  - mythic_keystone_profile :realm, :character
  - mythic_keystone_seasons :realm, :character

* Blizzard::WoW::GuildProfile
    - get :realm, :guild
    - activity :realm, :guild
    - achievements :realm, :guild
    - roster :realm, :guild


## Contributing

Bug reports and pull requests are welcome on Gitlab at https://gitlab.com/davidmatthew/blizzard-api-php/issues


## License

This package is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT).
