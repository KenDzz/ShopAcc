var $grid = $('.grid').isotope({
  itemSelector: '#left',
  layoutMode: 'fitRows',
  getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.money-gird parseInt',
    category: '[data-category]'
  }
});
function sort_name() {
  var sortByValue = "name";
  $grid.isotope({ sortBy: sortByValue });
}
function original_order() {
  var sortByValue = "original-order";
  $grid.isotope({ sortBy: sortByValue });
}
function sort_number() {
  var sortByValue = "number";
  $grid.isotope({ sortBy: sortByValue });
}