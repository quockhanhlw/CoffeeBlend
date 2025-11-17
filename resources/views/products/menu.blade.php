<x-app-layout>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>034 527 6156</h3>
	    						<p>Luu Quoc Khanh</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>12 Chua Boc</h3>
	    						<p>	Quang Trung, Dong Da, Ha Noi, Viet Nam</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Open Monday-Friday</h3>
	    						<p>8:00am - 9:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
			<div class="row mb-4">
				<div class="col-md-8 mx-auto">
					<div class="position-relative" style="position:relative;">
						<form method="GET" action="{{ route('products.menu') }}" class="d-flex" style="gap:10px;">
							<input id="menu-search-input" type="text" name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Search products..." autocomplete="off" style="background:#0b0b0b; color:#fff; border:1px solid #2b2b2b;">
							<button class="btn btn-primary" type="submit">Search</button>
							@if(($q ?? '') !== '')
								<a href="{{ route('products.menu') }}" class="btn btn-secondary">Clear</a>
							@endif
						</form>
						<!-- Suggestions dropdown -->
						<div id="menu-search-suggestions" style="display:none; position:absolute; top:100%; left:0; right:0; background:#0b0b0b; border:1px solid #2b2b2b; border-top:none; border-radius:0 0 6px 6px; z-index: 2000;">
							<ul id="menu-suggest-list" style="list-style:none; margin:0; padding:6px 0;">
								<!-- filled by JS -->
							</ul>
						</div>
					</div>
					@if(($q ?? '') !== '')
						<p class="mt-2" style="color:#c49b63;">Kết quả tìm kiếm cho: "{{ $q }}" ({{ $searchResults->count() }} sản phẩm)</p>
					@endif
				</div>
			</div>
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Each drink on this menu is a story of meticulousness. We hand-pick the finest ingredients to bring you the complete experience, whether it's a cup of coffee to wake you up in the morning or a sweet drink for a relaxing afternoon</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
			    	<div class="row">
					@if(isset($searchResults) && ($q ?? '') !== '')
					<div class="col-md-12 mb-5">
						<h3 class="mb-4" style="color:#c49b63;">Search Results</h3>
						<div class="row">
							@forelse($searchResults as $product)
								<div class="col-md-4 text-center">
									<div class="menu-wrap">
										<a href="{{ route('product.single',$product->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$product->image.'') }});"></a>
										<div class="text">
											<h3><a href="{{ route('product.single',$product->product_id) }}">{{ $product->name }}</a></h3>
											<p>{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
											<p class="price"><span>{{ $product->price }}₫</span></p>
											<p><a href="{{ route('product.single',$product->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
										</div>
									</div>
								</div>
							@empty
								<div class="col-md-12">
									<div class="alert alert-warning" style="background:#1f2937; color:#fff; border:1px solid #2b2b2b;">Không tìm thấy sản phẩm phù hợp.</div>
								</div>
							@endforelse
						</div>
						<hr style="border-color:#2b2b2b;">
					</div>
					@endif
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

		              <a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

					  <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Coffees</a>

		              <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Desserts</a>

					  <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Burgers</a>

                      <a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Pizzas</a>

					  <a class="nav-link" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false">Dishes</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              

		              <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">

                        @foreach ($drinks as $drink)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$drink->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$drink->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$drink->product_id) }}">{{ $drink->name }}</a></h3>
		              					<p>{{ $drink->description }}</p>
		              					<p class="price"><span>{{ $drink->price }}₫</span></p>
		              					<p><a href="{{ route('product.single',$drink->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach 

		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
                        @foreach ($coffees as $coffee)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$coffee->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$coffee->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$coffee->product_id) }}">{{ $coffee->name }}</a></h3>
		              					<p>{{ $coffee->description }}</p>
		              					<p class="price"><span>{{ $coffee->price }}</span></p>
		              					<p><a href="{{ route('product.single',$coffee->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

					  <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
		                <div class="row">
                        @foreach ($desserts as $dessert)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$dessert->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$dessert->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$dessert->product_id) }}">{{ $dessert->name }}</a></h3>
		              					<p>{{ $dessert->description }}</p>
		              					<p class="price"><span>{{ $dessert->price }}</span></p>
		              					<p><a href="{{ route('product.single',$dessert->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

					  <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
		                <div class="row">
                        @foreach ($burgers as $burger)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$burger->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$burger->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$burger->product_id) }}">{{ $burger->name }}</a></h3>
		              					<p>{{ $burger->description }}</p>
		              					<p class="price"><span>{{ $burger->price }}</span></p>
		              					<p><a href="{{ route('product.single',$burger->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

					  <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
		                <div class="row">
                        @foreach ($pizzas as $pizza)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$pizza->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$pizza->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$pizza->product_id) }}">{{ $pizza->name }}</a></h3>
		              					<p>{{ $pizza->description }}</p>
		              					<p class="price"><span>{{ $pizza->price }}</span></p>
		              					<p><a href="{{ route('product.single',$pizza->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>

						<div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
		                <div class="row">
                        @foreach ($dishes as $dish)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="{{ route('product.single',$dish->product_id) }}" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$dish->image.'') }});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.single',$dish->product_id) }}">{{ $dish->name }}</a></h3>
		              					<p>{{ $dish->description }}</p>
		              					<p class="price"><span>{{ $dish->price }}</span></p>
		              					<p><a href="{{ route('product.single',$dish->product_id) }}" class="btn btn-primary btn-outline-primary">Show detail</a></p>
		              				</div>
		              			</div>
		              		</div>
                        @endforeach
		              	</div>
		              </div>



		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
    
	<style>
	/* Typeahead styles for menu search */
	#menu-search-suggestions ul li { cursor: pointer; padding: 8px 12px; color:#e5e7eb; }
	#menu-search-suggestions ul li:hover, #menu-search-suggestions ul li.active { background:#1f2937; }
	#menu-search-suggestions .no-results { color:#9ca3af; cursor: default; }
	</style>

	<script>
	(function(){
		const inputEl = document.getElementById('menu-search-input');
		const dropdown = document.getElementById('menu-search-suggestions');
		const listEl = document.getElementById('menu-suggest-list');
		if(!inputEl || !dropdown || !listEl) return;

		const suggestUrl = "{{ route('products.suggest') }}";
		const productUrlTemplate = "{{ route('product.single', ['id' => 'ID_PLACEHOLDER']) }}";
		let debounceTimer = null;
		let items = [];
		let activeIndex = -1;

		function showDropdown(){ dropdown.style.display = 'block'; }
		function hideDropdown(){ dropdown.style.display = 'none'; activeIndex = -1; }
		function clearList(){ listEl.innerHTML = ''; }
		function setActive(index){
			const children = Array.from(listEl.children);
			children.forEach((li,i)=> li.classList.toggle('active', i===index));
			activeIndex = index;
		}
		function navigate(delta){
			if(!items.length) return;
			let next = activeIndex + delta;
			if(next < 0) next = items.length - 1;
			if(next >= items.length) next = 0;
			setActive(next);
		}
		function goToActive(){
			if(activeIndex < 0 || activeIndex >= items.length) return;
			const url = items[activeIndex].url;
			if(url) window.location.href = url;
		}

		function render(data){
			clearList();
			items = [];
			if(!data || !data.length){
				const li = document.createElement('li');
				li.textContent = 'Không có gợi ý phù hợp';
				li.className = 'no-results';
				listEl.appendChild(li);
				showDropdown();
				return;
			}
			data.forEach((item, idx)=>{
				const li = document.createElement('li');
				li.setAttribute('role','option');
				const url = productUrlTemplate.replace('ID_PLACEHOLDER', item.product_id);
				li.innerHTML = `<span>${item.name}</span>`;
				li.addEventListener('mousedown', function(e){
					// mousedown to prevent input blur before navigation
					e.preventDefault();
					window.location.href = url;
				});
				listEl.appendChild(li);
				items.push({ name: item.name, url });
			});
			setActive(0);
			showDropdown();
		}

		async function fetchSuggest(q){
			try{
				const resp = await fetch(`${suggestUrl}?q=${encodeURIComponent(q)}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
				if(!resp.ok) throw new Error('Network error');
				const data = await resp.json();
				render(data);
			}catch(err){
				clearList();
				const li = document.createElement('li');
				li.textContent = 'Lỗi tải gợi ý';
				li.className = 'no-results';
				listEl.appendChild(li);
				showDropdown();
			}
		}

		function onInput(){
			const q = inputEl.value.trim();
			if(q.length < 2){ hideDropdown(); clearList(); return; }
			if(debounceTimer) clearTimeout(debounceTimer);
			debounceTimer = setTimeout(()=> fetchSuggest(q), 180);
		}

		inputEl.addEventListener('input', onInput);
		inputEl.addEventListener('focus', ()=>{ if(inputEl.value.trim().length >= 2) onInput(); });
		inputEl.addEventListener('keydown', (e)=>{
			if(dropdown.style.display === 'block'){
				if(e.key === 'ArrowDown'){ e.preventDefault(); navigate(1); }
				else if(e.key === 'ArrowUp'){ e.preventDefault(); navigate(-1); }
				else if(e.key === 'Enter'){ e.preventDefault(); goToActive(); }
				else if(e.key === 'Escape'){ hideDropdown(); }
			}
		});

		document.addEventListener('click', (e)=>{
			const container = inputEl.closest('.position-relative') || inputEl.parentElement;
			if(container && !container.contains(e.target)) hideDropdown();
		});
	})();
	</script>

</x-app-layout>