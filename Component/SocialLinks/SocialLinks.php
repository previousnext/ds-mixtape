<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SocialLinks;

use Pinto\Attribute\Asset;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('social-links.css', preprocess: TRUE)]
#[Scenarios([
  CommonComponent\SocialLinks\SocialLinksScenarios::class,
])]
class SocialLinks extends CommonComponent\SocialLinks\SocialLinks implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

}
