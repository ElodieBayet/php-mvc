'use strict';
/**
 * @author :: Elodie Bayet
 *   @role :: Fullstack Web Developer
 *   @date :: 2020.04 + 2021.09
 * @origin :: Belgium, EU
 */

/**
 * Independant Script :: Toggle Language
 */

( () => {
    let anchors = document.querySelectorAll('.langmenu li a');

    function toggleLang(evt){
        evt.preventDefault();
        let lang = evt.target.getAttribute('href').replace('#', '');
        document.documentElement.lang = lang;
        evt.currentTarget.blur();
        anchors.forEach( a => { a.classList.toggle('selected') } );
    }

    document.documentElement.removeAttribute('class');

    anchors.forEach( link => { link.addEventListener('click', toggleLang) });
} )();