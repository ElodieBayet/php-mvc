'use strict';
/**
 * @author Elodie Bayet
 *   @file Main Program for Modules
 */

import GUIService from 'https://demo.elodiebayet.com/warehouse/js/services/guiService.js'; 
import HeaderManager from 'https://demo.elodiebayet.com/warehouse/js/managers/headerManager.js';

// Remove class '.nojs'
document.documentElement.removeAttribute('class');

/** @global Get HTML Element of this script */
const jsMain = document.querySelector('#jsMain');

/** @global Define source for dist */
const source = 'https://demo.elodiebayet.com/neptune/assets/';

(() => {
	const uihead = document.querySelector('#uihead');

	if (null !== uihead) {
		try {
			const headerManager = new HeaderManager(
				uihead,
				document.querySelector('#uihead button'),
				document.querySelector('#uihead .navigation'),
				960
			);

			GUIService.delayedResizer(headerManager.autoCompute);
		} catch (error) {
			GUIService.moduleError('Menu');
		}
	}
})();


/** Filter Module */
((filter) => {
	if (null !== filter) {
		const node = document.createElement('script');
		node.src = source + 'js/modules/filter.js';
		node.type = 'module';
		jsMain.after(node);
	}
})(document.querySelector('#filter'));


/** Chronographic Module */
((chronographic) => {
	if (null !== chronographic) {
		const node = document.createElement('script');
		node.src = source + 'js/modules/chronographic.js';
		node.type = 'module';
		jsMain.after(node);
	}
})(document.querySelector('#chronographic'));
