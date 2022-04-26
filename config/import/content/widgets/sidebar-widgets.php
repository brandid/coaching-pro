<?php
/**
 * Footer widgets for import.
 */
$widgets = array();

$newsletter_id = get_option( 'coaching-pro-wp-forms-newsletter-id', 0 );
$contact_id    = get_option( 'coaching-pro-wp-forms-footer-contact-id', 0 );
$widget_image_dir = CHILD_URL . '/config/import/content/widgets/images/';
// Footer widget 1
ob_start();
?>
<!-- wp:genesis-blocks/gb-columns {"backgroundImgURL":"<?php echo esc_url( $widget_image_dir . 'NewsletterBkgd.jpeg' ); ?>","backgroundDimRatio":50,"focalPoint":{"x":0.5,"y":0.25},"columns":1,"layout":"one-column","align":"full","paddingSync":true,"padding":30,"backgroundColor":"black","columnMaxWidth":800} -->
<div class="wp-block-genesis-blocks-gb-columns gb-layout-columns-1 one-column gb-has-background-dim gb-has-background-dim-50 gb-background-cover gb-background-no-repeat has-black-background-color gb-columns-center alignfull" style="padding:30px;background-image:url(<?php echo esc_url( $widget_image_dir . 'NewsletterBkgd.jpeg' ); ?>);background-position:50% 25%"><div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column" style="max-width:800px"><!-- wp:genesis-blocks/gb-column {"textColor":"white","textAlign":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column"><div class="gb-block-layout-column-inner has-white-color" style="text-align:center"><!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2 id="sign-up-for-our-newsletter"><strong>Sign up for our Newsletter</strong></h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"textColor":"bgcolorone","fontSize":"large"} -->
<h3 class="has-bgcolorone-color has-text-color has-large-font-size" id="and-get-our-free-e-book-instantly">And get our free e-book instantly</h3>
<!-- /wp:heading -->

<!-- wp:wpforms/form-selector {"formId":"<?php echo absint( $newsletter_id ); ?>"} /-->

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

<!-- wp:wpforms/form-selector {"formId":"<?php echo absint( $contact_id ); ?>"} /--></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<?php
$widgets['footer'][]['content'] = ob_get_clean();

// Sidebar Widget 1 - Search Widget.
ob_start();
?>
<!-- wp:search {"label":"\u003cmark style=\u0022background-color:rgba(0, 0, 0, 0)\u0022 class=\u0022has-inline-color has-colortwo-color\u0022\u003e\u003cstrong\u003eSearch\u003c/strong\u003e\u003c/mark\u003e","placeholder":"Search...","widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true} /-->
<?php
$widgets['sidebar'][]['content'] = ob_get_clean();

// Sidebar widget 2

ob_start();
?>
<!-- wp:genesis-blocks/gb-columns {"columns":1,"layout":"one-column","marginBottom":30,"paddingSync":true,"padding":30,"backgroundColor":"bgcolortwo","className":"is-style-roundedcorners"} -->
<div class="wp-block-genesis-blocks-gb-columns is-style-roundedcorners gb-layout-columns-1 one-column has-bgcolortwo-background-color" style="margin-bottom:30px;padding:30px"><div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column"><!-- wp:genesis-blocks/gb-column -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column"><div class="gb-block-layout-column-inner"><!-- wp:heading {"style":{"typography":{"fontSize":"2em"}}} -->
<h2 style="font-size:2em"><strong>Showcase your latest product</strong></h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5em"}},"textColor":"colortwo"} -->
<h3 class="has-colortwo-color has-text-color" style="font-size:1.5em">Coach by day, Author by night</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Books, courses, products, whatever the tools needed to further guide and educate your audience.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":2778,"sizeSlug":"full","linkDestination":"media"} -->
<figure class="wp-block-image size-full"><a href="<?php echo esc_url( $widget_image_dir . 'book_cropped.png' ); ?>"><img src="<?php echo esc_url( $widget_image_dir . 'book_cropped.png' ); ?>" alt="" class="wp-image-2778"/></a></figure>
<!-- /wp:image -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"colortwo","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link has-colortwo-background-color has-background" href="https://www.thebrandid.me/coaching-pro" target="_blank" rel="noreferrer noopener">Buy Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"featured","fontSize":"small"} -->
<p class="featured has-small-font-size"><strong>AS FEATURED IN</strong></p>
<!-- /wp:paragraph -->

<!-- wp:genesis-blocks/gb-columns {"columns":4,"layout":"gb-4-col-equal","columnsGap":1} -->
<div class="wp-block-genesis-blocks-gb-columns gb-layout-columns-4 gb-4-col-equal"><div class="gb-layout-column-wrap gb-block-layout-column-gap-1 gb-is-responsive-column"><!-- wp:genesis-blocks/gb-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center"><div class="gb-block-layout-column-inner"><!-- wp:image {"align":"center","id":3074,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="<?php echo esc_url( $widget_image_dir . 'logo-WomensDay.png' ); ?>" alt="" class="wp-image-3074"/></figure></div>
<!-- /wp:image --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center"><div class="gb-block-layout-column-inner"><!-- wp:image {"align":"center","id":3072,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="<?php echo esc_url( $widget_image_dir . 'logo-MarthaStewartLiving.png' ); ?>" alt="" class="wp-image-3072"/></figure></div>
<!-- /wp:image --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center"><div class="gb-block-layout-column-inner"><!-- wp:image {"align":"center","id":3073,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="<?php echo esc_url( $widget_image_dir . 'logo-OWN.png' ); ?>" alt="" class="wp-image-3073"/></figure></div>
<!-- /wp:image --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center"><div class="gb-block-layout-column-inner"><!-- wp:image {"align":"center","id":3071,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="<?php echo esc_url( $widget_image_dir . 'logo-DrOzShow.png' ); ?>" alt="" class="wp-image-3071"/></figure></div>
<!-- /wp:image --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->
<?php
$widgets['sidebar'][]['content'] = ob_get_clean();

// Sidebar widget 3.
ob_start();
?>
<!-- wp:cover {"url":"<?php echo esc_url( $widget_image_dir . 'kobu-agency-7okkFhxrxNw-unsplash.jpeg' ); ?>","id":3015,"dimRatio":50,"focalPoint":{"x":"0.50","y":"0.25"},"minHeight":300,"isDark":false,"className":"is-style-roundedcorners"} -->
<div class="wp-block-cover is-light is-style-roundedcorners" style="min-height:300px"><span aria-hidden="true" class="wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-3015" alt="" src="<?php echo esc_url( $widget_image_dir . 'kobu-agency-7okkFhxrxNw-unsplash.jpeg' ); ?>" style="object-position:50% 25%" data-object-fit="cover" data-object-position="50% 25%"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"1.5em"}}} -->
<h2 class="has-text-align-center has-white-color" style="font-size:1.5em"><strong>Purchase the theme</strong></h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center has-white-color">Start your adventure today</h3>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"colortwo","textColor":"white","className":"is-style-fill","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-fill has-small-font-size"><a class="wp-block-button__link has-white-color has-colortwo-background-color has-text-color has-background" href="https://www.thebrandid.me/coaching-pro" target="_blank" rel="noreferrer noopener">Buy Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
<?php
$widgets['sidebar'][]['content'] = ob_get_clean();

// Sidebar widget 4.
ob_start();
?>
<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
<?php
$widgets['sidebar'][]['content'] = ob_get_clean();

// Sidebar widget 5.
ob_start();
?>
<!-- wp:genesis-blocks/gb-container {"className":"featured-post"} -->
<div class="wp-block-genesis-blocks-gb-container featured-post gb-block-container"><div class="gb-container-inside"><div class="gb-container-content"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"2em"}}} -->
<h2 class="has-text-align-center" style="font-size:2em">Featured Post</h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.5em"}},"textColor":"colortwo"} -->
<h3 class="has-text-align-center has-theme-color-4-color has-text-color" style="font-size:1.5em">Articles, media, research and more</h3>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:genesis-blocks/gb-columns {"columns":1,"layout":"one-column"} -->
<div class="wp-block-genesis-blocks-gb-columns gb-layout-columns-1 one-column"><div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column"><!-- wp:genesis-blocks/gb-column {"textAlign":"center"} -->
<div class="wp-block-genesis-blocks-gb-column gb-block-layout-column"><div class="gb-block-layout-column-inner" style="text-align:center"><!-- wp:latest-posts {"postsToShow":1,"excerptLength":30,"displayFeaturedImage":true,"featuredImageAlign":"center","featuredImageSizeSlug":"medium","addLinkToFeaturedImage":true} /--></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div></div>
<!-- /wp:genesis-blocks/gb-container -->
<?php
$widgets['sidebar'][]['content'] = ob_get_clean();


// Now return.
return $widgets;
