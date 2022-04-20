<?php
/**
 * Footer widgets for import.
 */
$widgets = array();

// Footer widget 1
ob_start();
?>
<!-- wp:genesis-blocks/gb-columns {"backgroundImgURL":"https://demo.coaching-pro.thebrandid.com/wp-content/uploads/2021/10/NewsletterBkgd.jpg","backgroundDimRatio":50,"focalPoint":{"x":0.5,"y":0.25},"columns":1,"layout":"one-column","align":"full","paddingSync":true,"padding":30,"backgroundColor":"black","columnMaxWidth":800} -->
<div class="wp-block-genesis-blocks-gb-columns gb-layout-columns-1 one-column gb-has-background-dim gb-has-background-dim-50 gb-background-cover gb-background-no-repeat has-black-background-color gb-columns-center alignfull" style="padding:30px;background-image:url(https://demo.coaching-pro.thebrandid.com/wp-content/uploads/2021/10/NewsletterBkgd.jpg);background-position:50% 25%"><div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column" style="max-width:800px"><!-- wp:genesis-blocks/gb-column {"textColor":"white","textAlign":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column"><div class="gb-block-layout-column-inner has-white-color" style="text-align:center"><!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2 id="sign-up-for-our-newsletter"><strong>Sign up for our Newsletter</strong></h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"textColor":"bgcolorone","fontSize":"large"} -->
<h3 class="has-bgcolorone-color has-text-color has-large-font-size" id="and-get-our-free-e-book-instantly">And get our free e-book instantly</h3>
<!-- /wp:heading -->

<!-- wp:wpforms/form-selector {"formId":"2921"} /-->

<!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->
<?php
$widgets['footer'][]['content'] = ob_get_clean();

// Footer widget 2.
ob_start();
?>
<!-- wp:columns {"align":"full","backgroundColor":"colorthree"} -->
<div class="wp-block-columns alignfull has-colorthree-background-color has-background"><!-- wp:column {"verticalAlignment":"center","width":"40%","textColor":"white"} -->
<div class="wp-block-column is-vertically-aligned-center has-white-color has-text-color" style="flex-basis:40%"><!-- wp:genesis-blocks/gb-columns {"columns":1,"layout":"one-column","paddingSync":true,"padding":20} -->
<div class="wp-block-genesis-blocks-gb-columns gb-layout-columns-1 one-column" style="padding:20px"><div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column"><!-- wp:genesis-blocks/gb-column {"textAlign":"center","columnVerticalAlignment":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center"><div class="gb-block-layout-column-inner" style="text-align:center"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="has-text-align-center" id="connect-with-us"><strong>Connect with us</strong></h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Bright Future Coaching<br>1234 Success Street<br>Contentment City, USA</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>+1 555 728 1937<br>info@mywebsite.com</strong></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","className":"items-justified-center is-style-logos-only"} -->
<ul class="wp-block-social-links has-icon-color items-justified-center is-style-logos-only"><!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->

<!-- wp:social-link {"url":"twitter.com","service":"twitter"} /-->

<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->

<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%","backgroundColor":"white"} -->
<div class="wp-block-column has-white-background-color has-background" style="flex-basis:60%"><!-- wp:genesis-blocks/gb-columns {"columns":1,"layout":"one-column","paddingSync":true,"padding":20} -->
<div class="wp-block-genesis-blocks-gb-columns gb-layout-columns-1 one-column" style="padding:20px"><div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column"><!-- wp:genesis-blocks/gb-column {"textAlign":"center","paddingSync":true,"padding":40,"columnVerticalAlignment":"top"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-top"><div class="gb-block-layout-column-inner" style="padding:40px;text-align:center"><!-- wp:heading {"gbResponsiveSettings":{"1200px":{"fontSize":"large"},"600px":{"fontSize":"24px"}}} -->
<h2 id="request-a-free-consultation"><strong>Request a Free Consultation</strong></h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"textColor":"colortwo"} -->
<h3 class="has-colortwo-color has-text-color" id="a-quick-way-to-reach-you">A quick way to reach you</h3>
<!-- /wp:heading -->

<!-- wp:wpforms/form-selector {"formId":"2919"} /--></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<?php
$widgets['footer'][]['content']  = ob_get_clean();

// Now return.
return $widgets;
