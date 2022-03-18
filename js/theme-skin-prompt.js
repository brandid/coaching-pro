( function() {
	var starterPacks = document.querySelectorAll( '.genesis-onboarding-starter-packs .pack-summary' );

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

		button.addEventListener( 'click', function( e ) {
			e.preventDefault();
			Swal.fire({
				title: 'Import Styles and Content',
				icon: 'question',
				html: '<div style="text-align: left; display: flex; flex-wrap: wrap;"><p class="description" style="text-align: center;">When installing a new starter-pack/skin, it is highly recommended to overwrite the skin\'s previous settings.</p><label for="coaching-pro-customizer-option" style="display: block; width: 100%; margin-top: 15px;margin-bottom: 10px; font-size: 14px;"><input type="checkbox" id="coaching-pro-customizer-option" value="customizer_true" checked="checked" />Overwrite Customizer Settings (Recommended)</label><label style="display: block; width: 100%; font-size: 14px;" for="coaching-pro-posts-option"><input type="checkbox" id="coaching-pro-posts-option" value="posts_true" checked="checked" />Remove and Install Theme Content (Recommended)</label>',
				preConfirm: function() {
					var customizerCheckedValue = document.getElementById( '#coaching-pro-customizer-option' ).value;
					var postsCheckedValue = document.getElementById( '#coaching-pro-posts-option' ).value;

					console.log( customizerCheckedValue );
					console.log( postsCheckedValue );
				}
			  } )
		} );

		// Add button to UI.
		container.querySelector( '.pack-actions' ).append( button );

		console.log( button );

		

		// var packAction = packActions[i].cloneNode();
		// packActions[i].addEventListener('click', function(event) {
		// 	event.preventDefault();
		// 	alert( 'click' );
		// });
	}

}() );