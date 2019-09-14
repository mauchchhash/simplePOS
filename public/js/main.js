var pos = new Vue({
  el: '#pos-row',
  data: {
    activeChoice: 'category',
    products: products,
    productsInOrder: [],
    cashByCustomer: 0,
  },
  computed: {
    orderAmount: function(){
      return this.productsInOrder.reduce(function(sum, i){
        return Number(sum) + Number(i.priceInOrder);
      }, 0);
    },
    changeMoney: function(){
      return Number(this.cashByCustomer) - Number(this.orderAmount);
    },
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
    addProduct: function(productName, productId, productPrice){
      var product = {};
      product.name = productName;
      product.quantity = 1;
      product.id = productId;
      product.price = productPrice;
      product.priceInOrder = productPrice;
      // console.log(product);
      this.productsInOrder.push(product);
      // console.log(this.productsInOrder);
    },
    updatePrice: function(productId, productQuantity){
      var i = this.productsInOrder.findIndex(r => r.id == productId);
      this.productsInOrder[i].priceInOrder = productQuantity * this.productsInOrder[i].price;
    },
  }
});
