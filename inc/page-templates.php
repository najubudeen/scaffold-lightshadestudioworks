<?php
/**
 * Page Templates: Gutenberg Content
 */

function lightshadestudioworks_render_home() {
    $html = <<<'EOD'
<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"simple-call-to-action","name":"Simple call to action"},"align":"full","style":{"color":{"text":"#000000","background":"#ffffff"}}} -->
<div class="wp-block-group alignfull has-text-color has-background" style="color:#000000;background-color:#ffffff"><!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":".9","textAlign":"center"}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="line-height:.9"><strong>GET IN TOUCH</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":59,"lineHeight":"1.15","textAlign":"center"}},"anchor":"schedule-a-visit"} -->
<h2 class="wp-block-heading has-text-align-center" id="schedule-a-visit" style="font-size:59px;line-height:1.15"><strong>Schedule a Visit</strong></h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"width":50,"style":{"color":{"background":"#000000","text":"#ffffff"},"border":{"radius":"50px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-50"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:50px;color:#ffffff;background-color:#000000">Contact us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"top","metadata":{"categories":["gallery"],"patternName":"offset-images-with-descriptions","name":"Offset images with descriptions"},"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"480px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":525,"sizeSlug":"large","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"50%"}}} -->
<figure class="wp-block-image size-large"><img src="{POSITIVE_FIRST_LEFT}" alt="Beautiful photomechanical prints of White Irises (1887-1897) by Ogawa Kazumasa. Original from The Rijksmuseum. " class="wp-image-525"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><strong>White Irises</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Ogawa Kazumasa</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"480px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"0px","style":{"layout":{"flexSize":"80px","selfStretch":"fixed"}}} -->
<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><strong>Cherry Blossom</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Ogawa Kazumasa</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"id":524,"sizeSlug":"large","linkDestination":"none","style":{"typography":{"fontSize":"14px"}}} -->
<figure class="wp-block-image size-large" style="font-size:14px"><img src="{POSITIVE_FIRST_RIGHT}" alt="Beautiful photomechanical prints of Cherry Blossom (1887-1897) by Ogawa Kazumasa. Original from The Rijksmuseum. " class="wp-image-524"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
EOD;
   
    return $html;
}

function lightshadestudioworks_render_services() {
    $html = <<<'EOD'
<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"simple-call-to-action","name":"Simple call to action"},"align":"full","style":{"color":{"text":"#000000","background":"#ffffff"}}} -->
<div class="wp-block-group alignfull has-text-color has-background" style="color:#000000;background-color:#ffffff"><!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":".9","textAlign":"center"}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="line-height:.9"><strong>GET IN TOUCH</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":59,"lineHeight":"1.15","textAlign":"center"}},"anchor":"schedule-a-visit"} -->
<h2 class="wp-block-heading has-text-align-center" id="schedule-a-visit" style="font-size:59px;line-height:1.15"><strong>Schedule a Visit</strong></h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"width":50,"style":{"color":{"background":"#000000","text":"#ffffff"},"border":{"radius":"50px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-50"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:50px;color:#ffffff;background-color:#000000">Contact us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"top","metadata":{"categories":["gallery"],"patternName":"offset-images-with-descriptions","name":"Offset images with descriptions"},"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"480px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:image {"id":525,"sizeSlug":"large","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"50%"}}} -->
<figure class="wp-block-image size-large"><img src="{POSITIVE_FIRST_LEFT}" alt="Beautiful photomechanical prints of White Irises (1887-1897) by Ogawa Kazumasa. Original from The Rijksmuseum. " class="wp-image-525"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><strong>White Irises</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Ogawa Kazumasa</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"480px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"0px","style":{"layout":{"flexSize":"80px","selfStretch":"fixed"}}} -->
<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><strong>Cherry Blossom</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Ogawa Kazumasa</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"id":524,"sizeSlug":"large","linkDestination":"none","style":{"typography":{"fontSize":"14px"}}} -->
<figure class="wp-block-image size-large" style="font-size:14px"><img src="{POSITIVE_FIRST_RIGHT}" alt="Beautiful photomechanical prints of Cherry Blossom (1887-1897) by Ogawa Kazumasa. Original from The Rijksmuseum. " class="wp-image-524"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
EOD;
    return $html;
}