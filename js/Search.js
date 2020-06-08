/***
 * // Search
//import $ from 'jquery';

//import $ from 'jquery';

class Search {
    // 1. describe and create/initiate our object
    constructor() {
        this.openButton = document.querySelector(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
    }

    // 2. events
    events() {
        this.openButton.addEventListener('click', () => {
            this.openButton.bind(this)
        });
        this.closeButton.on("click", this.closeOverlay.bind(this));
    }


    // 3. methods (function, action...)
    openOverlay() {
        //this.searchOverlay.addClass("search-overlay--active");
        console.log('hello');
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
    }
}

var search = new Search;
 */
//export default Search;