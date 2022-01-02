'use strict';
/**
 * @author :: Elodie Bayet
 *   @role :: Fullstack Web Developer
 *   @date :: 2020.04 + 2021.09
 * @origin :: Belgium, EU
 */

/**
 * Manage Scrolling inside Page
 * @param {Array} triggers HTML elements List that trigger scrolling effect
 * @param {Object} header Header HTML element
 */
 class Scroller {

    constructor(triggers, header){
        this._triggers = triggers;
        this._header = header;
        /** Attach Events */
        this._triggers.forEach( trigger => trigger.addEventListener('click', this.adjustScroll) );
    }

    /**
     * Ajust scrolling when sticky-header obstructs viewport.
     * @param {Object} evt Event object
     */
    adjustScroll = evt => {
        evt.preventDefault();
        let href = evt.target.getAttribute('href').match(/^#[a-z0-9]{1,}/);
        let section = href ? document.querySelector(href) : null;
        if (section) {
            let destination = (section.offsetParent.offsetTop + section.offsetTop) - this._header.offsetHeight;
            window.scrollTo(0, destination);
        }
        evt.currentTarget.blur();
    }
}

export default Scroller;