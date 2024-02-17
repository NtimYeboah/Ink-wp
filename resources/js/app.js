jQuery(document).ready(function($) {
    var themeToggleDarkIcon = $('#theme-toggle-dark-icon');
    var themeToggleLightIcon = $('#theme-toggle-light-icon');
    
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.removeClass('hidden');
    } else {
        themeToggleDarkIcon.removeClass('hidden');
    }

    var themeToggleBtn = $('#theme-toggle');

    themeToggleBtn.on('click', function () {
        // toggle icons inside button
        themeToggleDarkIcon.toggleClass('hidden');
        themeToggleLightIcon.toggleClass('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                $(document.documentElement).addClass('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                $(document.documentElement).removeClass('dark');
                localStorage.setItem('color-theme', 'light');
            }

        // if NOT set via local storage previously
        } else {
            if ($(document.documentElement).hasClass('dark')) {
                $(document.documentElement).removeClass('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                $(document.documentElement).addClass('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });

    var smSearchDiv = $('#sm-search');
    var smSearchToggleIcon = $('#search-icon');

    smSearchToggleIcon.on('click', function (e) {
        smSearchDiv.toggleClass('hidden');
    });

    var smMenuIcon = $('#sm-menu-icon');
    var smCancelIcon = $('#sm-cancel-icon');

    smMenuIcon.on('click', onToggleMenuIcon);
    smCancelIcon.on('click', onToggleMenuIcon);

    function onToggleMenuIcon(element) {
        showMenu = $(this).attr('id') === 'sm-menu-icon';
        $(this).addClass('hidden');

        menuForSmallScreens = $('#sm-menu');

        if (showMenu) {
            cancelMenuIcon = $('#sm-cancel-icon');
            cancelMenuIcon.removeClass('hidden');

            menuForSmallScreens.removeClass('hidden');
        } else {
            showMenuIcon = $('#sm-menu-icon');
            showMenuIcon.removeClass('hidden');

            menuForSmallScreens.addClass('hidden')
        }
    }
});
