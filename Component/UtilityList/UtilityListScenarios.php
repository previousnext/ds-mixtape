<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\UtilityList;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Common\Component\UtilityList\UtilityListDirection;
use PreviousNext\Ds\Mixtape\Component\SocialShare\SocialMedia;
use PreviousNext\IdsTools\Scenario\Scenario;

final class UtilityListScenarios {

  #[Scenario]
  final public static function standardMxUtilityList(): CommonComponents\UtilityList\UtilityList {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');
    $mailtoUrl = \Mockery::mock(Url::class);
    $mailtoUrl->expects('toString')->andReturn('mailto:john@example.com');

    /** @var \PreviousNext\Ds\Mixtape\Component\UtilityList\UtilityList $instance */
    $instance = CommonComponents\UtilityList\UtilityList::create(UtilityListDirection::Horizontal);
    $instance->socialShare
      ->addSocialMedia(SocialMedia::Facebook, $url)
      ->addSocialMedia(SocialMedia::LinkedIn, $url)
      ->addSocialMedia(SocialMedia::Twitter, $url)
      ->addSocialMedia(SocialMedia::Bluesky, $url)
      ->addSocialMedia(SocialMedia::Email, $mailtoUrl);
    return $instance;
  }

}
