<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SocialShare;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Component\SocialShare\SocialShareSocialMediaInterface;

enum SocialMedia implements SocialShareSocialMediaInterface {

  case Facebook;
  case LinkedIn;
  case Twitter;
  case Bluesky;
  case Email;

  public function defaultUrl(): Url {
    return match ($this) {
      static::Facebook => Url::fromUri(\sprintf('https://www.facebook.com/sharer/sharer.php?u=%s', Url::fromRoute('<current>')->setAbsolute()->toString())),
      static::LinkedIn => Url::fromUri(\sprintf('https://www.linkedin.com/sharing/share-offsite/?url=%s', Url::fromRoute('<current>')->setAbsolute()->toString())),
      static::Twitter => Url::fromUri(\sprintf('https://twitter.com/intent/tweet?url=%s', Url::fromRoute('<current>')->setAbsolute()->toString())),
      static::Bluesky => Url::fromUri(\sprintf('https://bsky.app/intent/compose?text=%s', Url::fromRoute('<current>')->setAbsolute()->toString())),
      static::Email => Url::fromUri(\sprintf('mailto:?subject=&body=%s', Url::fromRoute('<current>')->setAbsolute()->toString())),
    };
  }

}
