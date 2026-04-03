'use strict';
/**
 * @author Elodie Bayet
 *   @file Individual Scripts for special Pages
 */

/**
 * Toggle Language
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