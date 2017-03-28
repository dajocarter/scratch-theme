jQuery( document ).ready( function( $ ) {
	$( '#header' ).headroom({
		'classes': {
			'initial': 'animated',
			'pinned': 'slideInDown',
			'unpinned': 'slideOutUp'
		},
    'offset': 72
	});
	$( '.slick' ).slick({
		autoplay: false,
		dots: true,
		arrows: true,
		prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" role="button"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" role="button"><i class="fa fa-chevron-right"></i></button>'
	});
	$( '.nav-toggle' ).click( function() {
		if ( 'down' === $( this ).data( 'direction' ) ) {
			$( 'nav ul.main-nav' )
				.velocity( 'slideDown', {
					duration: 250
				});
			$( this ).data( 'direction', 'up' );
		} else {
			$( 'nav ul.main-nav' )
				.velocity( 'slideUp', {
					duration: 250
				});
			$( this ).data( 'direction', 'down' );
		}
		$( this ).toggleClass( 'active' );
	});
	$( '.toggle-heading' ).click( function() {
		if ( 'down' === $( this ).data( 'direction' ) ) {
			$( this ).next( '.toggle-content' )
				.velocity( 'slideDown', {
					duration: 250
				});
			$( this ).data( 'direction', 'up' );
		} else {
			$( this ).next( '.toggle-content' )
				.velocity( 'slideUp', {
					duration: 250
				});
			$( this ).data( 'direction', 'down' );
		}
		$( this ).toggleClass( 'active' );
	});
	$( '.popup-link' ).magnificPopup({
		type: 'inline',
		midClick: true
	});
	$( '.image-link' ).magnificPopup({
		type: 'image',
		midClick: true
	});
	$( '.iframe-link' ).magnificPopup({
		type: 'iframe',
		midClick: true
	});
	$( '.popup-gallery' ).each( function() {
		$( this ).magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [ 0, 1 ]
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function( item ) {
					return item.el.attr( 'title' );
				}
			}
		});
	});
	$( '.scroll-link' ).click( function( e ) {
		var string = $( this ).attr( 'href' ).split( '#' )[ 1 ];
    e.preventDefault();
    $( this ).blur();
		$( '#' + string )
			.velocity( 'scroll', 400 );
	});
});
