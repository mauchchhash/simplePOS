/* 
$(document).ready(function() {
  $('#open-modal').on('click', function () {
    $('#modal-example').modal();
  });
});
*/

var pos = new Vue({
  el: '#pos-row',
  data: {
    activeChoice: 'category',
    products: products,
    productsInOrder: []
  },
  methods: {
    setCategory: function(){
      this.activeChoice = 'category';
    },
    setBeverage: function(){
      this.activeChoice = 'beverage';
    },
    setFood: function(){
      this.activeChoice = 'food';
    },
    setOther: function(){
      this.activeChoice = 'other';
    },
    addProduct: function(product){
      this.productsInOrder.push(product);
    }
  }
});
