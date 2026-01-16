<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SocialShare;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\IdsTools\Scenario\Scenario;

final class SocialShareScenarios {

  #[Scenario]
  final public static function socialShareStandard(): CommonComponents\SocialShare\SocialShare {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');
    $mailtoUrl = \Mockery::mock(Url::class);
    $mailtoUrl->expects('toString')->andReturn('mailto:john@example.com');

    return CommonComponents\SocialShare\SocialShare::create()
      ->addSocialMedia(SocialMedia::Facebook, $url)
      ->addSocialMedia(SocialMedia::LinkedIn, $url)
      ->addSocialMedia(SocialMedia::Twitter, $url)
      ->addSocialMedia(SocialMedia::Bluesky, $url)
      ->addSocialMedia(SocialMedia::Email, $mailtoUrl);
  }

}
