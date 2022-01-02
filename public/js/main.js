'use strict';
/**
 * @author :: Elodie Bayet
 *   @role :: Fullstack Web Developer
 *   @date :: 2020.04 + 2021.09
 * @origin :: Belgium, EU
 */

/**
 * Cross-Page requirements and management
 */
import GUIServices from './modules/guiServices.js';
import Opener from './modules/opener.js';

( () => {
	const _NAV = {
		container: document.querySelector('#uihead'), 
		trigger: document.querySelector('#uihead button'), 
		receptor: document.querySelector('#uihead .navigation')
	}
	
	const menu = GUIServices.implementController( _NAV, Opener ) || GUIServices.moduleError('menu');
	
	if ( menu instanceof Opener ){
		GUIServices.delayedResizer( menu.autoCompute );
	}
})();


/** Remove class '.nojs' */
document.documentElement.removeAttribute('class');


/** 
 * Module requirement detections
 */
if (document.querySelectorAll('a.anchor').length && getComputedStyle( document.querySelector('#uihead') ).getPropertyValue('position') === 'sticky') {
	// Adjust scrolling because of sticky header
	import('./modules/scroller.js')
		.then( ({default: Scroller}) => { 
			const $anchors = document.querySelectorAll('a.anchor');
			const $header = document.querySelector('#uihead');
			const scroller = new Scroller($anchors, $header);
		})
		.catch( Errors => {
			GUIServices.moduleError('Scroller');
			console.error(Errors);
		});
}