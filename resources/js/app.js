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
		returnedProductReport: [],
		reportShowSection: 'report',
		previousSection: 'report',
		activeChoice: 'category',
		returnedResult: '',
		returnedOrder: [],
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
				// console.log(this.returnedResult);
				this.returnedResult.orders.forEach((order) => order.created_at = (new Date(Date.parse(order.created_at))).toDateString().split(" ").slice(1,4).join(" "));
				// console.log(response.data);
			})
				.catch();
		},
		goToOrderClicked(orderId){
			// console.log('/orders/'+orderId);
			axios.get('/orders/'+orderId).then( (response) => {
				this.returnedOrder = response.data.order;
				this.reportShowSection = 'order';
				// console.log(response.data.order.products[0].pivot.quantity);
				// console.log(response.data.order.products[0].pivot.price);
			})
				.catch();
		},
		getProductSales(productId){
			axios.post('/productsReport/' + productId, {
				startDate: this.range.start,
				endDate: this.range.end
			}).then( (response) => {
				this.returnedProductReport = response.data;
				this.returnedProductReport.order_entry.forEach( item => console.log(item) );
				this.reportShowSection = 'product';
			})
				.catch();
		},
		// goBack(currentSection){
		// 	this.reportShowSection = this.previousSection;
		// 	this.previousSection = currentSection;
		// }
	},
	mounted(){
		// console.log(this.range.start);
		// console.log(this.range.end);
	}
});
