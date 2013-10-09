
// Gumby is ready to go
Gumby.ready(function() {
	console.log('Gumby is ready to go...', Gumby.debug());
});

Gumby.oldie(function() {
	$('input, textarea').placeholder();
});

$(function() {

	// initialize dynamically added toggles/switches
	//$('body').append('<a href="#" class="toggle" data-for="body" data-on="click">Click me!</a>');
	//Gumby.initialize('toggles');

	// checkbox events
	$('.checkbox').on('gumby.onCheck', function(e) {
		console.log('Checkbox checked', $(this).find('input').attr('checked'));
	}).on('gumby.onUncheck', function(e) {
		console.log('Checkbox unchecked');
	});

	// check first checkbox on page
	//$('.checkbox:first-child').trigger('gumby.check');

	// checkbox events
	$('.radio').on('gumby.onCheck', function(e) {
		console.log('Radio button checked');
	});

	// check first checkbox on page
	//$('.radio:first-child').trigger('gumby.check');

	// dynamically set tab
	$('.pill.tabs').trigger('gumby.set', 1);

	// add callback to tab change event
	$('.pill.tabs').on('gumby.onChange', function(e, index) {
		alert('Tab '+index+' has been set!');
	});

	$('.skiplink, .skip').on('gumby.onComplete', function() {
		console.log("Skip complete!");
	});

	$('.navbar').on('gumby.onFixed', function() {
		console.log("Navbar is fixed");
	}).on('gumby.onUnfixed', function() {
		console.log("Navbar is unfixed");
	});

	// form validation plugin
	$('form.validation-example').validation({
		// required fields fieldname and optional validate function
		// if none specified then input checked for present value
		required: [
			{ name : 'field-1' },
			{ name : 'field-2' },
			{ name : 'field-3' },
			{ name : 'field-4' },
			{ name : 'field-5' },
			{ name : 'field-6' },
			{ name : 'field-7' },
			{ name : 'field-8' },
			{ name : 'field-9' },
			{ name : 'field-10' },
			{ name : 'field-11' },
			{ name : 'field-12' },
			{ name : 'field-13' },
			{ name : 'field-14' },
			{
		        name : 'field-15',
		        validate : function($el) {
		          return $el.val() !== '#';
		        }
		      },
		      {
		        name : 'field-16[]',
		        validate: function($el) {
		        	return !!$el.filter(':checked').length;
		        }
		      },
		      {
		        name : 'field-17',
		        validate: function($el) {
		          return $el.is(':checked');
		        }
		      }
		],
		fail: function(failed) {
			alert("A callback function like this can be called when the form validation fails.");
		},
		submit: function(data) {
			alert("A callback function like this can be called on successful validation or if none present the form will submit");
		}
	});
});

