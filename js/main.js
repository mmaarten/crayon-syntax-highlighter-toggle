jQuery(document).ready(function($)
{
	$( '.crayon-syntax' ).each(function()
	{
		var crayon = $(this);

		var height     = crayon.height();
		var lineHeight = crayon.find( '.crayon-num' ).height();
		var maxLines   = parseInt( MM_Crayon_Toggle.max_lines );

		var maxHeight = lineHeight * maxLines;

		if ( crayon.height() <= maxHeight )
		{
			return true;
		};

		crayon.height( maxHeight );

		$('<a href="#"></a>')
			.addClass( 'mm-crayon-toggle' )
			.text( MM_Crayon_Toggle.expand_text )
			.click(function(e)
			{
				e.preventDefault();

				this.blur();

				var args = {};

				if ( crayon.height() > maxHeight )
				{
					args.height = maxHeight;

					$(this).text( MM_Crayon_Toggle.expand_text );
				}

				else
				{
					args.height = height;

					$(this).text( MM_Crayon_Toggle.collapse_text );
				};

				crayon.stop().animate( args );
			})
			.insertAfter( crayon );
	});
});