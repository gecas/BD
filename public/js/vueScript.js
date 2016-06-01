Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


new Vue({

	el: 'body',

	data : {
		product: {id:'', title: '', description: '', price: '', stock:'', image_path: '', image_name:'' },
 		products: [],
 		quantity: '',
 		count : '',
 		total : '',
 		address : {},
 		image: "",
 		carts: [],
 		product_count: [],

	},

	ready: function(){
		 this.fetchProducts();
		 //gathis.editCart();
		// / this.fetchCart();
		this.cartCount(); 
	},

	methods: {

		fetchProducts: function()
		{
			this.$http.get('/products/Ajax').then(function (products) {
		          this.$set('products', products.data);
		      }, function (response) {
		          console.log(error);
		      });
		},

		// fetchCart: function()
		// {
		// 	this.$http.get('/cartAjax').then(function (carts) {
		//           this.$set('carts', carts.data);
		//       }, function (response) {
		//           console.log(error);
		//       });
		// },
		postToCart: function(product, quantity){
			this.$http.put('/products/cart/'+product.id, {"product":this.product, 'quantity':quantity}).then(function (d) {
				//console.log(products);
				this.$set('count', d.data.count);
				this.$set('total', d.data.total);
				this.$set('quantity', 1);
		     	 // this.cartCount();
		      }, function (response) {
		          console.log(error);
		      });
		},

		cartCount: function(product){
			this.$http.post('/products/cartCount').then(function (count) {
				this.$set('count', count.data.count);
				this.$set('total', count.data.total);
		      }, function (response) {
		          console.log(error);
		      });
		},

		editCart: function(id, count){
			this.$http.post('/products/cart/edit', {id: id, count: count}).then(function (cart) {
				//console.log(total);
				this.$set('count', cart.data.count);
				this.$set('total', cart.data.total);
		      }, function (response) {
		          console.log(error);
		      });
		},

		// getAddress:function(address){
		// 	this.$http.post('https://postit.lt/data/?address='+address, this.address,{_token: "{{ csrf_token() }}"}).then(function(address){
				
		// 	});
		// }
	}

});