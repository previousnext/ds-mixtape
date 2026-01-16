<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SocialShare;

use PreviousNext\Ds\Common\Component\SocialShare\SocialShareSocialMediaInterface;

enum SocialMedia implements SocialShareSocialMediaInterface {

  case Facebook;
  case LinkedIn;
  case Twitter;
  case Bluesky;
  case Email;

}
