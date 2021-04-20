(function() {
	'use strict';

	(function($) {
		/**
		 * jQuery plugin for remove button.
		 */
		$.fn.deleteAction = function() {
			this.each((index, elem) => {
				var deleteUrl = $(elem).data('url');
				if (! deleteUrl) {
					console.error('data-url is required');
					return;
				}
				$(elem).on('click', () => {
					if (!takeConfirmation()) {
						return;
					}
					var csrf = $('meta[name="_token"]').attr('content') || '';
					var form = $('<form action="' + deleteUrl + '" method="POST"><input type="hidden" name="_token" value="' + csrf + '"></form>');
					form.appendTo('body').submit();
					form.remove();
				});
			});
		};

		/**
		 * @returns boolean user has confirmed or not
		 */
		function takeConfirmation(confirmString) {
			return confirm(confirmString || "Are you sure you want to delete?");
		};
	})(jQuery);

	(function($) {

		/**
		 * jQuery plugin for single Image Uploading
		 * Dependencies: jquery-file-upload
		 */
		$.fn.imageUpload = function() {
			var jqElem = this;
			var input = jqElem.find('[data-input]'); // <input type="hidden">
			var image = jqElem.find('[data-image]'); // <img>
			var file = jqElem.find('[data-file]'); // <input type="file">
			var progress = jqElem.find('[data-progress]'); // <div class="progress">
			var progressBar = jqElem.find('[data-progress-bar]'); // <div class="progress-bar">
			var btnRemove = jqElem.find('[data-btn-remove]');
			var btnSelect = jqElem.find('[data-btn-select]');
			var btnChange = jqElem.find('[data-btn-change]');

			var hasImage = input.val() && (input.val().trim() !== '');

			function updateProgress(percentage) {
				if (typeof percentage === 'number') {
					progressBar.removeClass('progress-bar-danger')
						.addClass('progress-bar-info');
					progressBar.css('width', percentage + '%')
						.text(percentage + '%');
					progress.show();
				}
				else if (percentage === null) {
					progress.hide();
				}
				else if (percentage === false) {
					progressBar.removeClass('progress-bar-info')
						.addClass('progress-bar-danger');
					progressBar.css('width', '100%')
						.text('Failed to upload');
					progress.show();
				}
			}

			function updateImage(url) {
				if (typeof url === 'string')
					image.attr('src', url);
				else if (url === null)
					image.removeAttr('src');
			}

			function updateInput(value) {
				if (typeof value === 'string')
					input.val(value);
			}

			function updateButton() {
				if (hasImage) {
					btnSelect.hide();
					btnChange.show();
					btnRemove.show();
				}
				else {
					btnSelect.show();
					btnChange.hide();
					btnRemove.hide();

					updateImage(null);
					updateInput('');
				}
			}

			file.fileupload({
				formData: {
					'_token' : $('meta[name="_token"]').attr('content'),
				},
				dataType: 'json',
				progressall: function(e, data) {
					console.log('progressall', data.loaded, data.total);
					updateProgress(parseInt(data.loaded / data.total * 100, 10));
				},
				done: function(e, data) {
					$.each(data.result, function(index, file) {
						if (file.error) {
							alert("Failed to upload image. Please check image dimension and file size.");
							updateProgress(false);
							return false;
						}else{
							updateImage(file.url);
							updateProgress(null);
							updateInput(file.name);
							hasImage = true;
							updateButton();
						}
					});
				},
				fail: function() {
					console.log('fail');
					updateProgress(false);
					updateButton();
				},
				paramName: 'files[]',
			});

			btnRemove.on('click', () => {
				updateImage(null);
				updateInput('');

				hasImage = false;
				updateButton();
			});

			updateButton();

			return this;
		};
	})(jQuery);
})();
