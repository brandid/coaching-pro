( function() {
	var starterPacks = document.querySelectorAll( '.genesis-onboarding-starter-packs .pack-summary' );
	var starterPacksModalTrigger = document.querySelectorAll( '.pack-summary' );

	function coachingProSkinPopup( element ) {
		button.addEventListener( 'click', function( e ) {
			e.preventDefault();
			var selectedSkin = e.target.dataset.pack;

			Swal.fire({
				title: 'Import Styles and Content',
				icon: 'question',
				showCancelButton: true,
  				confirmButtonText: 'Proceed with Installation',
				showLoaderOnConfirm: true,
				html: '<div style="text-align: left; display: flex; flex-wrap: wrap;"><p class="description" style="text-align: center;">When installing a new starter-pack/skin, it is highly recommended to overwrite the skin\'s previous settings.</p><label for="coaching-pro-customizer-option" style="display: block; width: 100%; margin-top: 15px;margin-bottom: 10px; font-size: 14px;"><input type="checkbox" id="coaching-pro-customizer-option" value="true" checked="checked" />Overwrite Customizer Settings (Recommended)</label><label style="display: block; width: 100%; font-size: 14px;" for="coaching-pro-posts-option"><input type="checkbox" id="coaching-pro-posts-option" value="true" checked="checked" />Remove and Install Theme Content (Recommended)</label>',
				preConfirm: function() {
					var customizerChecked = document.getElementById( 'coaching-pro-customizer-option' ).checked;
					var postsChecked = document.getElementById( 'coaching-pro-posts-option' ).checked;
					
					customizerCheckedValue = customizerChecked ? document.getElementById( 'coaching-pro-customizer-option' ).value : "false";
					postsCheckedValue = postsChecked ? document.getElementById( 'coaching-pro-posts-option' ).value : "false";
					console.log( customizerCheckedValue );
					console.log( postsCheckedValue );
					return;
					document.querySelector( '.swal2-cancel' ).style.display = 'none';
					Swal.showLoading();
					return jQuery.ajax({
						method: "POST",
						url: ajaxurl,
						data: { action: 'coaching_pro_save_import_settings', customizerOption: customizerCheckedValue, postsOption: postsCheckedValue, skin: selectedSkin, nonce: adminSkinNonce }
					  })
					.done(function( response ) {
						if ( response.success ) {
							var clickedButton = e.target;
							var clickedButtonWrapper = clickedButton.parentElement;
							var genesisButton = clickedButtonWrapper.querySelector( '.genesis-install-pack' );
							clickedButton.style.display = 'none';
							genesisButton.style.display = 'block';
							genesisButton.click();
						} else {
							Swal.fire({
								title: 'Something went wrong...',
								icon: 'error',
								text: 'The pre-install script could not run. This may be a permissions issue.',
								confirmButtonText: 'Close',
							});
						}
						
					});
				}
			  } )
		} );
	}

	for ( var i = 0; i < starterPacksModalTrigger.length; i++ ) {
		var modalTrigger = starterPacksModalTrigger[i].querySelector( '.js-modal' );
		modalTrigger.addEventListener( 'click', function( e ) {
			var modal = document.querySelector( '#js-modal' );

			
			var container = modal.querySelector( '.pack-info-details' );
		
			// Retrieve skin slug.
			var skinSlug = container.querySelector( 'button' ).getAttribute( 'data-pack' );

			// Clone button and add data attribute of skin slug.
			var button = container.querySelector( 'button' ).cloneNode( true );
			button.dataset.modalContentId = skinSlug;

			// Remove CSS targeting.
			button.classList.remove( 'genesis-install-pack' ); // Needed so installation doesn't proceed automatically upon button click.
			button.classList.add( 'pack-prompt' );

			coachingProSkinPopup( button );

			container.querySelector( '.pack-info-actions' ).append( button );
		} );
	}

	// Attach events to all buttons.
	for (var i = 0; i < starterPacks.length; i++) {

		// Retrieve parent container.
		var container = starterPacks[i].querySelector( '.pack-details' );
		
		// Retrieve skin slug.
		var skinSlug = container.querySelector( 'button' ).getAttribute( 'data-pack' );

		// Clone button and add data attribute of skin slug.
		var button = container.querySelector( 'button' ).cloneNode( true );
		button.dataset.modalContentId = skinSlug;

		// Remove CSS targeting.
		button.classList.remove( 'genesis-install-pack' ); // Needed so installation doesn't proceed automatically upon button click.
		button.classList.add( 'pack-prompt' );

		coachingProSkinPopup( button );

		// Add button to UI.
		container.querySelector( '.pack-actions' ).append( button );
	}

}() );