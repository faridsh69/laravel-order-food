<div class="seperate"></div>

		<div class="block">
			<div class="block-inner">
				<div id="vue">
        
				    <div v-cloak>
					  @{{ active }}
					</div>
					<!-- <a v-for="seat in row " href="javascript:void(0)" class="btn theater-seats"
						v-bind:title=" 'ردیف:' + seat.row + ' شماره صندلی:' + seat.identifier "
						v-bind:class="{ seat ,'free':seat.status=='free' , 'empty':seat.status=='x' , 'blocked':seat.status=='blocked' , 'sold':seat.status=='sold' , 'reserved':seat.status=='reserved' , 'selected':seat.status=='selected'} "
						v-bind:disabled=" seat.status=='sold' || seat.status=='reserved' ||  seat.status == disable_item "
						v-on:click="select(seat)"> @{{ seat.identifier | persian_digits }}
					</a> -->
				</div>
			</div>
		</div>
		
	</div>
</div>

@push('script')
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- <script src="http://darsa.in/sly/examples/js/vendor/plugins.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Sly/1.6.1/sly.min.js"></script> -->
<script src="/public/js/slider.js"></script>
<script>
      window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
      ]); ?>
    </script>
<script>


	new Vue({
		el: '#vue',
		// props: {
		// 	number: {
		// 		type: Number
		// 	},
		// 	text: {
		// 		type: String
		// 	}
		// },
		data: {
			active: 'home'
		},
		methods: {
			fetchData: function () {
				this.$http.get('/api/demo/data/seat-diagram/' + this.theater).then(function (response) {
					this.diagram = response.data;
				});
			},
			select: function (seat) {
				this.$emit('select', {id: seat, seats: this.selectedSeats});
			}
		},
		mounted: function () {

		},
		computed: {
			revers_diagram: function () {
				var diagram = this.diagram;
				return diagram.slice().reverse();
			}
		}
	});
	</script>
@endpush