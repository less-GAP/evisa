window.document.addEventListener('DOMContentLoaded', function () {
    // animation packages
    var body = document.body;
    var boxPackages = document.querySelectorAll('.product_packages .box');
    if (boxPackages && window.innerWidth > 1280) {
        // event on mouse over
        boxPackages.forEach(function (boxPackage) {
            boxPackage.addEventListener('mouseover', function () {
                this.classList.add('animation--bounce-in');
                this.classList.remove('animation--bounce-out');
            })
            boxPackage.addEventListener('mouseleave', function () {
                this.classList.add('animation--bounce-out');
                this.classList.remove('animation--bounce-in');
            })
        })
    }

    // menu handle
    var btnOpenMenu = document.getElementById('open-menu');
    var btnCloseMenu = document.getElementById('close-menu');
    var menu = document.getElementById('navigation-main');
    btnOpenMenu.addEventListener('click', function () {
        body.classList.add('openMenu');
        menu.classList.add('open');
    })
    btnCloseMenu.addEventListener('click', function () {
        body.classList.remove('openMenu');
        menu.classList.remove('open');
    })

    var product_nav = document.getElementById('product-nav');
    var product_nav_items = document.querySelectorAll('#product-nav a');
    var product_tab = document.getElementById('product-tab');
    var product_tab_items = document.querySelectorAll('#product-tab .tab');
    if (product_nav && product_tab) {
        product_nav_items.forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                if(this.classList.contains('active')) {
                    return;
                }
                var target = this.getAttribute('data-target');
                product_tab_items.forEach(function (tab) {
                    tab.classList.remove('active');
                })
                product_nav_items.forEach(function (nav) {
                    nav.classList.remove('active');
                })
                this.classList.add('active');
                document.querySelector(target).classList.add('active');
            })
        })
    }

});
