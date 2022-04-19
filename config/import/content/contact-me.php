<?php
/**
 * Coaching Pro - One-Click Theme Setup - Contact page content.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package Coaching Pro
 */

// Get default images.
$skin_slug = coaching_pro_get_active_skin_slug();
$coachingpro_contact1 = CHILD_URL . '/config/skins/' . $skin_slug . '/images/demo-contact-1.jpg';

// Has form_id as a placeholder. It is replaced in `genesis_onboarding_after_import_content` hook.
// Output page content.
return <<<CONTENT
<!-- wp:image {"align":"wide","id":1971,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image alignwide size-full"><img src="$coachingpro_contact1" alt="Contact Us" class="wp-image-1971"/></figure>
<!-- /wp:image -->

<!-- wp:wpforms/form-selector {"formId":"{{form_id}}","displayTitle":true,"displayDesc":true} /-->

<!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
CONTENT;
