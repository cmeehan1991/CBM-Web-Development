/**
 * plugin.js
 *
 * Released under LGPL License.
 * Copyright (c) 2016 Christopher Spires
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

/*global tinymce:true */

tinymce.PluginManager.add('advhr', function(editor) {
	var hrMenuItems, lastStyles = {};

	function buildMenuItems(hrName, styleValues) {
		var items = [];

		tinymce.each(styleValues.split(','), function(styleValue) {
			items.push({
				text: styleValue.replace(/\-/g, ' ').replace(/\b\w/g, function(chr) {
					return chr.toUpperCase();
				}),
				data: styleValue == 'default' ? '' : styleValue
			});
		});

		return items;
	}

	hrMenuItems = buildMenuItems('HR', editor.getParam(
		"advhr_styles",
		"default,half,mini"
	));

	function applyHrFormat(styleValue) {
		if (styleValue == 'default' || styleValue == '') {
			editor.execCommand('mceInsertContent', false, editor.dom.createHTML('hr'));
		} else {
			editor.execCommand('mceInsertContent', false, editor.dom.createHTML('hr', {
				class: styleValue
			}));
		}
		
		
	}

	function updateSelection(e) {
		var hrStyleType = editor.dom.getStyle(editor.selection.getNode(), 'hrStyleType') || '';

		e.control.items().each(function(ctrl) {
			ctrl.active(ctrl.settings.data === hrStyleType);
		});
	}

	editor.addButton('advhr', {
		type: 'splitbutton',
		icon: 'hr',
		tooltip: 'Horizontal Rule',
		menu: hrMenuItems,
		onselect: function(e) {
			applyHrFormat(e.control.settings.data);
		},
		onclick: function(e) {
			applyHrFormat(e.control.settings.data);
		}
	});
	
});