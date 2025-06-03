<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Icon;

use PreviousNext\Ds\Common\Atom\Icon\IconModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

/**
 * Note that you dont need to use this class, you can just pass a string to the `icon` parameter of Icon atom.
 */
#[Mutex]
enum Icons: string implements IconModifierInterface {

  case ArrowDown = 'arrow-down';
  case ArrowLeft = 'arrow-left';
  case ArrowUp = 'arrow-up';
  case ArrowRight = 'arrow-right';
  case ChevronDown = 'chevron-down';
  case ChevronLeft = 'chevron-left';
  case ChevronRight = 'chevron-right';
  case ChevronUp = 'chevron-up';
  case Close = 'close';
  case Collapse = 'collapse';
  case Download = 'download';
  case Drupal = 'drupal';
  case Error = 'error';
  case Expand = 'expand';
  case ExternalLink = 'external-link';
  case Facebook = 'facebook';
  case Google = 'google';
  case Info = 'info';
  case Instagram = 'instagram';
  case Linkedin = 'linkedin';
  case Mastodon = 'mastodon';
  case Menu = 'menu';
  case Search = 'search';
  case Success = 'success';
  case Twitter = 'twitter';
  case Warning = 'warning';
  case Youtube = 'youtube';
  case Email = 'email';
  case HeartSelected = 'heart-selected';
  case HeartUnselected = 'heart-unselected';
  case Link = 'link';
  case Lock = 'lock';
  case Login = 'login';
  case More = 'more';
  case Pencil = 'pencil';
  case Phone = 'phone';
  case Pin = 'pin';
  case Print = 'print';
  case Restart = 'restart';
  case StarSelected = 'star-selected';
  case StarUnselected = 'star-unselected';
  case Tick = 'tick';
  case Trash = 'trash';
  case User = 'user';

  /**
   * The class name without the `mx-icon--` prefix.
   */
  public function className(): string {
    return \sprintf('%s', $this->value);
  }

}
