# HeroBanner Component

## Sample usage

```php
use PreviousNext\Ds\Common\Component as CommonComponent;

$heroBannerImage = CommonComponent\HeroBanner\HeroBanner::create(
  'Title!',
  'Subtitle!',
  image: CommonComponent\Media\Image\Image::createSample(600, 200),
);
$heroBannerImage->modifiers[] = MixtapeComponents\HeroBanner\HeroBannerBackground::Dark;
$build['HeroBannerImage'] = $heroBannerImage();

$heroBannerImageLinkList = CommonComponent\HeroBanner\HeroBanner::create(
  'Hero Link List Title!',
  'Hero Link List Subtitle!',
  links: CommonComponent\LinkList\LinkList::create([
    Link::fromUrl(Url::fromRoute('<front>')),
  ]),
);
$heroBannerImageLinkList->modifiers[] = MixtapeComponents\HeroBanner\HeroBannerBackground::Dark;
$build['HeroBannerLinkList'] = $heroBannerImageLinkList();
```
