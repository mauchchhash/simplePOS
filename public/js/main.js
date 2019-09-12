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
    addProduct: function(productName, productId){
      product = {};
      product.name = productName;
      product.quantity = 1;
      product.id = productId;
      console.log(product);
      this.productsInOrder.push(product);
    }
  }
});
