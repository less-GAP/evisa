document.addEventListener("DOMContentLoaded", () => {
  handleMenu()
  handleSelect()
  handleTabs()
  handleToggle()
})

function handleTabs() {
  $('.js-tab').on('click', function(){
    let tabId = $(this).data('tab-id')
    let tabContent = $(`.js-tab-content[data-tab-id="${tabId}"]`)
    $('.js-tab').removeClass('active')
    $(this).addClass('active')

    $(`.js-tab-content`).addClass('hidden')
    tabContent.removeClass('hidden')
  })
}
function handleToggle() {
  $('.js-toggle').on('click', function(){
    let toggleId = $(this).data('toggle')
    let tabContent = $(`.js-toggle-content[data-toggle="${toggleId}"]`)
    $(this).addClass('active')
    tabContent.removeClass('hidden')
  })

  $('.js-toggle[data-toggle="list-country"]').on('click', function(){
    $(this).remove()
  })
}

function handleSelect() {
  $('.js-select2').select2({
    width: '100%'
  });
}

function handleMenu() {
  let toggleBtn = document.querySelector("#navbar-toggle");
  let collapse = document.querySelector("#navbar-collapse");

  toggleBtn.onclick = () => {
    collapse.classList.toggle("active");
    toggleBtn.classList.toggle("active");
  };

  $('.menu-toggle').on('click', function(){
    $(this).toggleClass('active')
    $(this).parent().next().toggleClass('hidden')
  })
}