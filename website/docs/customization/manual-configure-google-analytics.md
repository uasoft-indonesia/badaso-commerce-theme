---
sidebar_position: 3
---

# Google Analytics Configuration Alternative

This configuration alternative is used when hit google analytics is not running on badaso post theme

1. In `.env` add new configuration on `MIX_ANALYTICS_TRACKING_ID` key
2. In `resources/views` create a folder named `partials`
3. In the `resources/views/partials` folder create a blade file with the name `google-analytics.blade.php` with the following contents:
```
@php
$measurement_id = env('MIX_ANALYTICS_TRACKING_ID', null);
// output : UA-2155XXXXX-X
@endphp

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="{{ "https://www.googletagmanager.com/gtag/js?id={$measurement_id}" }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '{{ $measurement_id }}');
</script>

<script>
    // record location analytics
    let href = window.location.href
    setInterval(() => {
        let listenHref = window.location.href
        if (listenHref != href) {
            let page_title = document.title
            let {
                href: page_location,
                pathname: page_path
            } = window.location
            let configurationSet = {
                page_title,
                page_location,
                page_path,
            }

            gtag('config', '{{ $measurement_id }}', configurationSet);

            href = listenHref
        }
    }, 1000);
</script>

```
4. In `resources/views` create a folder named `vendor/post-theme`
5. Copy the `vendor/badaso/post-theme/src/resources/views/app.blade.php` file to the `resources/views/vendor/post-theme` folder
6. Calling `resources/views/partials/google-analytics.blade.php` in `resources/views/vendor/post-theme/app.blade.php`
```
<!DOCTYPE html>
<html lang="en">

<head>
  ...

  <!-- Google Analytics -->
  @include('partials.google-analytics')
  <!-- End Google Analytics -->

  ...

</head>
...
</html>
```