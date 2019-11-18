require('./bootstrap');

window.VCalender = require('v-calendar');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Vue.use(VCalender, {
// });

new Vue({
	el: '#pos-row',
	data: {
		range: {
			start: new Date(), // Jan 16th, 2018
			end: new Date()    // Jan 19th, 2018
		},
		reportShowSection: 'report',
		activeChoice: 'category',
		returnedResult: '',
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
		removeFromOrder: function(productId, productQuantity){
			var i = this.productsInOrder.findIndex(r => r.id == productId);
			console.log(i);
			this.productsInOrder.splice(i,1);
			// this.productsInOrder[i].priceInOrder = productQuantity * this.productsInOrder[i].price;
		},
		reportFormSubmitted: function(){
			axios.post('/report', {
				startDate: this.range.start,
				endDate: this.range.end
			}).then( (response) => {
				this.reportShowSection = 'result';
				this.returnedResult = response.data;
				console.log(response.data);
			})
			.catch();
		}
	},
	mounted(){
		// console.log(this.range.start);
		// console.log(this.range.end);
	}
});
