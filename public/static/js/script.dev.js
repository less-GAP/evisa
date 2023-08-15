"use strict";

document.addEventListener("DOMContentLoaded", function () {
  handleMenu();
  handleTabs();
  handleToggle();
});

function handleTabs() {
  $('.js-tab').on('click', function () {
    var tabId = $(this).data('tab-id');
    var tabContent = $(".js-tab-content[data-tab-id=\"".concat(tabId, "\"]"));
    $('.js-tab').removeClass('active');
    $(this).addClass('active');
    $(".js-tab-content").addClass('hidden');
    tabContent.removeClass('hidden');
  });
}

function handleToggle() {
  $('.js-toggle').on('click', function () {
    var toggleId = $(this).data('toggle');
    var tabContent = $(".js-toggle-content[data-toggle=\"".concat(toggleId, "\"]"));
    $(this).addClass('active');
    tabContent.removeClass('hidden');
  });
  $('.js-toggle[data-toggle="list-country"]').on('click', function () {
    $(this).remove();
  });
}

function handleMenu() {
  var toggleBtn = document.querySelector("#navbar-toggle");
  var collapse = document.querySelector("#navbar-collapse");

  toggleBtn.onclick = function () {
    collapse.classList.toggle("active");
    toggleBtn.classList.toggle("active");
  };

  $('.menu-toggle').on('click', function () {
    $(this).toggleClass('active');
    $(this).parent().next().toggleClass('hidden');
  });
}