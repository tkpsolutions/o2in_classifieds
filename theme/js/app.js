//alert box for operation loading screen
var waitingDialog = waitingDialog || (function ($) {
    'use strict';

	// Creating modal dialog's DOM
	var $dialog = $(
		'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content">' +
			'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			if (typeof options === 'undefined') {
				options = {};
			}
			if (typeof message === 'undefined') {
				message = 'Loading';
			}
			var settings = $.extend({
				dialogSize: 'm',
				progressType: '',
				onHide: null // This callback runs after the dialog was hidden
			}, options);

			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h3').text(message);
			// Adding callbacks
			if (typeof settings.onHide === 'function') {
				$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
					settings.onHide.call($dialog);
				});
			}
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal('hide');
		}
	};

})(jQuery);

function showAlert(elementId, message, className)
{
	document.getElementById(elementId).innerHTML = message;
	document.getElementById(elementId).className = className;
}

//select2
$(document).ready(function() {
	var elementTemp = document.getElementsByClassName("select2");
	if( elementTemp.length > 0 )
	{
		$('.select2').select2({
			placeholder: "Search here...",
			allowClear: true,
			//tags: true,
			escapeMarkup: function(m) {
				return m;
			 }
		});
	}
});

//datatable
$(document).ready( function () {
	var elementTemp = document.getElementsByClassName("data-table");
	if( elementTemp.length > 0 )
	{
		$('.data-table').DataTable({
			stateSave: true,
			"searching": true,
			dom: 'Bfrtip',
			destroy: true,
			buttons: [
				{ extend: 'excel', footer: true },
				//{ extend: 'pdf', footer: true },
				//{ extend: 'print', footer: true },
				/*
				{
					popoverTitle: 'Visibility control',
					extend: 'colvis',
					collectionLayout: 'two-column'
				}
				*/
			],	
		});
	}
} );

$(document).ready( function () {
	var elementTemp = document.getElementsByClassName("data-table-no-search");
	if( elementTemp.length > 0 )
	{
		$('.data-table-no-search').DataTable({
			"searching": false,
			dom: 'Bfrtip',
			destroy: true,
			buttons: [
				{ extend: 'excel', footer: true },
				{ extend: 'pdf', footer: true },
				{ extend: 'print', footer: true },
			],			
		});
	}
} );

$(document).ready( function () {
	var elementTemp = document.getElementsByClassName("data-table-no-sort");
	if( elementTemp.length > 0 )
	{
		$('.data-table-no-sort').DataTable({
			"bSort" : false,
		});
	}
} );

$(document).ready( function () {
	var elementTemp = document.getElementsByClassName("data-table-custom-1");
	if( elementTemp.length > 0 )
	{
		$('.data-table-custom-1').DataTable({
			"searching": false,
			dom: 'Bfrtip',
			destroy: true,
			"paging":   false,
			"bSort" : false,
			buttons: [
				{ extend: 'excel', footer: true },
				//{ extend: 'pdf', footer: true },
				//{ extend: 'print', footer: true },
			],	
		});
	}
} );

/*
CKEDITOR.replace( '.myCkeditor', {
	removePlugins: 'clipboard, toolbar',
	allowedContent: 'Redo',
	enterMode : CKEDITOR.ENTER_BR,
	shiftEnterMode: CKEDITOR.ENTER_P,
	height: 100
} );
*/


function gotopage(url)
{
	window.location.replace(url);
}

var alertType = 2;
var alertClass = "danger";
function showAlert(type, message)
{
	alertType = type;
	if( alertType == 1 )
	{
		alertClass = "success";
	}
	else if( alertType == 2 )
	{
		alertClass = "danger";
	}
	else
	{
		alertClass = "warning";
	}
	
	$("#app-page-alert").removeClass("app-alert");
	$("#app-page-alert").removeClass("success");
	$("#app-page-alert").removeClass("danger");
	$("#app-page-alert").removeClass("warning");
	$("#app-page-alert").addClass("hidden");
	
	$("#app-page-alert").addClass("app-alert");
	$("#app-page-alert").addClass(alertClass);
	$("#app-page-alert").removeClass("hidden");	
	
	$("#app-page-alert-message").text(message);
	//window.setTimeout( dismissAlert, 5000 );
}

function dismissAlert()
{
	$("#app-page-alert").removeClass("app-alert");
	$("#app-page-alert").removeClass("success");
	$("#app-page-alert").removeClass("danger");
	$("#app-page-alert").removeClass("warning");
	$("#app-page-alert").addClass("hidden");
}


function copyText(elementId)
{
	var element = document.getElementById(elementId);
	element.select();
	element.setSelectionRange(0, 99999); /* For mobile devices */

	/* Copy the text inside the text field */
	document.execCommand("copy");

	/* Alert the copied text */
	//alert("Copied the text: " + element.value);
}