/* Javascript for Blacklisting Gutenberg Editor Block types */
/* I couldn't find good documentation for javascript globals, some of it is downright horrible (https://codex.wordpress.org/Javascript_Reference/wp) */
/* Leveraging some pre-WP5 techniques to pass variables etc. */



wp.domReady( function() {
	console.log( 'debug');
	var allblocks = wp.blocks.getBlockTypes(); // Example output - 0: Object { name: "ase/image", title: "Aesop Image Block", category: "aesop-story-engine", … }
	var category_blacklist = [ 'aesop-story-engine' ]; //we can block at the vendor level as needed here, block category slug
	var block_blacklist = [
		    'core/gallery', //FOR FUTURE VERSIONS WE SHOULD ENABLE GALLERY
            'core/file',
            'core/video',
            'core/verse',
            'core/code',
            'core/preformatted',
            'core/pullquote',
            'core/text-columns', 
            'core/media-text',   
            'core/more',
            'core/nextpage',  
            'core/shortcode',
            'core/archives',
            'core/categories',
            'core/latest-comments',
            'core/latest-posts',
            'core/calendar',
            'core/rss',
            'core/search',
            'core/tag-cloud',
            'core-embed/animoto',
            'core-embed/cloudup',
            'core-embed/collegehumor',
            'core-embed/dailymotion',
            //'core-embed/funnyordie', //No longer part of the core I guess
            'core-embed/issuu',
            'core-embed/mixcloud',
            'core-embed/reverbnation',
            'core-embed/scribd',
            'core-embed/smugmug',
            'core-embed/speaker',
            'core-embed/tumblr',
            'core-embed/videopress',
            'core-embed/wordpress-tv'

	];
	var theblacklist = [];
	jQuery.each(allblocks, function() {//use jQuery to avoid any ES5 or above JS
      if (category_blacklist.includes( this.category ) ){
      	theblacklist.push( this.name );
      }
	});
	theblacklist = theblacklist.concat(block_blacklist);

	if(screen.post_type === 'page'){
		// ADD OR REMOVE BLACKLIST BY POST TYPE HERE

	}
	if(debug){ console.log('deregistered Block Types: '+ theblacklist); }
	for(i=0;i<theblacklist.length;i++){
		wp.blocks.unregisterBlockType(  theblacklist[i] );
	}
	 
} );

/* COMPLETE LIST OF CORE BLOCKS AS OF 13/08/2019
			'core/block',
            'core/paragraph',
            'core/image',
            'core/heading',
            'core/subhead',
            'core/gallery', //FOR FUTURE VERSIONS WE SHOULD ENABLE GALLERY
            'core/list',
            'core/quote',
            'core/audio',
            'core/cover',
            'core/file',
            'core/video',
            //FORMATTING
            'core/table',
            'core/verse',
            'core/code',
            'core/freeform', // Classic Editor Block
            'core/html', // Custom HTML Block
            'core/preformatted',
            'core/pullquote',
            //LAYOUT ELEMENTS
            'core/button',
            'core/text-columns',  // Columns
            'core/media-text',   // Media and Text
            'core/more',
            'core/nextpage',  // Page break
            'core/separator',
            'core/spacer',
            //WIDGETS
            'core/shortcode',
            'core/archives',
            'core/categories',
            'core/latest-comments',
            'core/latest-posts',
            'core/calendar',
            'core/rss',
            'core/search',
            'core/tag-cloud',
            //EMBEDS
            'core/embed',
            'core-embed/twitter',
            'core-embed/youtube',
            'core-embed/facebook',
            'core-embed/instagram',
            'core-embed/wordpress',
            'core-embed/soundcloud',
            'core-embed/spotify',
            'core-embed/flickr',
            'core-embed/vimeo',
            'core-embed/animoto',
            'core-embed/cloudup',
            'core-embed/collegehumor',
            'core-embed/dailymotion',
            'core-embed/hulu',
            'core-embed/imgur',
            'core-embed/issuu',
            'core-embed/kickstarter',
            'core-embed/meetup-com',
            'core-embed/mixcloud',
            'core-embed/photobucket',
            'core-embed/polldaddy',
            'core-embed/reddit',
            'core-embed/reverbnation',
            'core-embed/screencast',
            'core-embed/scribd',
            'core-embed/slideshare',
            'core-embed/smugmug',
            'core-embed/speaker',
            'core-embed/ted',
            'core-embed/tumblr',
            'core-embed/videopress',
            'core-embed/wordpress-tv',
*/