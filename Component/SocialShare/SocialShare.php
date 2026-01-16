<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SocialShare;

use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Slots\Attribute\ModifySlots(add: [SocialMedia::class])]
#[Slots\Attribute\RenameSlot(original: SocialMedia::Facebook, new: 'facebook')]
#[Slots\Attribute\RenameSlot(original: SocialMedia::LinkedIn, new: 'linkedin')]
#[Slots\Attribute\RenameSlot(original: SocialMedia::Twitter, new: 'twitter')]
#[Slots\Attribute\RenameSlot(original: SocialMedia::Bluesky, new: 'bluesky')]
#[Slots\Attribute\RenameSlot(original: SocialMedia::Email, new: 'email')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([SocialShareScenarios::class])]
class SocialShare extends CommonComponent\SocialShare\SocialShare implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

}
