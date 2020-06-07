( function( api ) {

	// Extends our custom "babysitter-lite" section.
	api.sectionConstructor['babysitter-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );