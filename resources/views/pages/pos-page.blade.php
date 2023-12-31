<x-filament::page @class(['fullscreen-pos'])>
    <div class="rounded shadow-inner">
        <div class="flex lg:flex-row flex-col-reverse shadow">
            <!-- left section -->
            <div class="bg-white rounded p-3 mx-2 w-4/5 min-h-screen">
                <!-- header -->
                <x-filament-pos::left-section.header />
                <!-- end header -->
                <!-- categories -->
                <x-filament-pos::left-section.categories :categories="$categories"/>
                <!-- end categories -->
                <!-- search -->
                <x-filament-pos::left-section.search :search="$search"/>
                <!-- end search -->

                <div class="flex lg:flex-row flex-col-reverse">
                    <div class="w-4/5">
                        <!-- products -->
                        @if($products)
                            <div class="grid grid-cols-3 gap-3 py-2 overflow-y-auto h-3/4">
                                @foreach ($products as $key => $prduct)
                                    <x-filament-pos::left-section.product 
                                        :id="$prduct->id"
                                        :name="$prduct->name"
                                        :image="$prduct->image" 
                                        :description="$prduct->description" 
                                        :brand="$prduct->brand->name" 
                                        :currency="$currency"
                                        :price="$prduct->price"
                                        :has_variations="$prduct->has_variations"
                                    />
                                @endforeach
                            </div>
                        @else
                            <div class="filament-tables-empty-state mx-auto shadow flex flex-1 flex-col items-center justify-center space-y-6 bg-white p-6">
                                <div class="flex h-50 w-50 p-3 items-center justify-center text-center rounded-full bg-primary-50 text-primary-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="150" height="150">
                                        <path fill="#607D8B" d="M13.1,33c-0.7,0-1.2-0.5-1.3-1.2L9.2,9.7C9,8.1,7.7,7,6.2,7H5v2h1.2c0.5,0,0.9,0.4,1,0.9l2.6,22.2c0.2,1.7,1.6,2.9,3.3,2.9H24v-2H13.1z" />
                                        <path fill="#FFC107" d="M14 31H43V35H14z" />
                                        <path fill="#37474F" d="M38 35A3 3 0 1 0 38 41 3 3 0 1 0 38 35zM19 35A3 3 0 1 0 19 41 3 3 0 1 0 19 35z" />
                                        <path fill="#607D8B" d="M38 37A1 1 0 1 0 38 39 1 1 0 1 0 38 37zM19 37A1 1 0 1 0 19 39 1 1 0 1 0 19 37z" />
                                        <path fill="#FF9800" d="M38,31H18c-1.1,0-2-0.9-2-2V9c0-1.1,0.9-2,2-2h20c1.1,0,2,0.9,2,2v20C40,30.1,39.1,31,38,31z" />
                                        <path fill="#8A5100" d="M30 11h-4c-.6 0-1-.4-1-1v0c0-.6.4-1 1-1h4c.6 0 1 .4 1 1v0C31 10.6 30.6 11 30 11zM30 24h-4c-.6 0-1-.4-1-1v0c0-.6.4-1 1-1h4c.6 0 1 .4 1 1v0C31 23.6 30.6 24 30 24z" />
                                        <path fill="#C77600" d="M16 18H40V20H16z" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <!-- end products -->
                    </div>
                    <div class="w-1/5 px-2 mt-2">
                        <div class="overflow-y-autoh-64">
                            <div class="p-2 bg-danger-500 rounded-md shadow-lg">
                                <p class="text-white text-center p-2 ordinal slashed-zero tabular-nums">
                                    Variations
                                </p>
                            </div>
                        </div>
                        <!-- variations -->
                        @if(count($variations))
                            <div class="grid grid-cols-1 gap-1 mt-2 py-2 overflow-y-auto h-3/4">
                                @foreach ($variations as $key => $variation)
                                    <x-filament-pos::left-section.variation 
                                        :id="$variation->product_id"
                                        :name="$variation->name"
                                        :image="$variation->image" 
                                        :description="$variation->product->description" 
                                        :brand="$variation->product->brand->name" 
                                        :currency="$currency"
                                        :price="$variation->default_sell_price"
                                    />
                                @endforeach
                            </div>
                        @else
                            <div class="filament-tables-empty-state mx-auto shadow flex flex-1 flex-col items-center justify-center space-y-6 bg-white p-6">
                                <div class="flex h-50 w-50 p-3 items-center justify-center text-center rounded-full bg-primary-50 text-primary-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="150" height="150">
                                        <path fill="#607D8B" d="M13.1,33c-0.7,0-1.2-0.5-1.3-1.2L9.2,9.7C9,8.1,7.7,7,6.2,7H5v2h1.2c0.5,0,0.9,0.4,1,0.9l2.6,22.2c0.2,1.7,1.6,2.9,3.3,2.9H24v-2H13.1z" />
                                        <path fill="#FFC107" d="M14 31H43V35H14z" />
                                        <path fill="#37474F" d="M38 35A3 3 0 1 0 38 41 3 3 0 1 0 38 35zM19 35A3 3 0 1 0 19 41 3 3 0 1 0 19 35z" />
                                        <path fill="#607D8B" d="M38 37A1 1 0 1 0 38 39 1 1 0 1 0 38 37zM19 37A1 1 0 1 0 19 39 1 1 0 1 0 19 37z" />
                                        <path fill="#FF9800" d="M38,31H18c-1.1,0-2-0.9-2-2V9c0-1.1,0.9-2,2-2h20c1.1,0,2,0.9,2,2v20C40,30.1,39.1,31,38,31z" />
                                        <path fill="#8A5100" d="M30 11h-4c-.6 0-1-.4-1-1v0c0-.6.4-1 1-1h4c.6 0 1 .4 1 1v0C31 10.6 30.6 11 30 11zM30 24h-4c-.6 0-1-.4-1-1v0c0-.6.4-1 1-1h4c.6 0 1 .4 1 1v0C31 23.6 30.6 24 30 24z" />
                                        <path fill="#C77600" d="M16 18H40V20H16z" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <!-- end variations -->
                    </div>
                </div>
            </div>
            <!-- end left section -->
            <!-- right section -->
            <div class="bg-white rounded p-3 mx-2 w-2/5">
                <x-filament-pos::right-section.customer-banner
                :currency="$currency"
                :total="$total" 
                />
                <!-- header -->
                <x-filament-pos::right-section.header
                :currency="$currency"
                :total="$total" 
                />
                <!-- end header -->
                <!-- order list -->
                <div class="py-4 mt-5">
                    <div class="p-2 rounded-md shadow">
                        @forelse ($selected_products as $key => $prduct)
                                <x-filament-pos::right-section.order-list 
                                    :key="$key"
                                    :name="$prduct['name']"
                                    :image="$prduct['image']"
                                    :description="$prduct['description']"
                                    :currency="$currency"
                                    :price="$prduct['price']"
                                    :variations="$prduct['variations']"
                                    wire:key="$key"
                                    />
                        @empty
                            <div class="filament-tables-empty-state mx-auto flex flex-1 flex-col items-center justify-center space-y-6 bg-white p-6">
                                <div class="flex h-50 w-50 p-3 items-center justify-center text-center rounded-full bg-primary-50 text-primary-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="100" height="100">
                                        <path fill="#009688" d="M18,32c-1.1,0-2-0.9-2-2l0-10l-4,0l0,10c0,3.3,2.7,6,6,6h19v-4H18z" />
                                        <path fill="#009688" d="M12.8,10l-0.4-1.3C11.8,7.1,10.3,6,8.6,6H5v4h3.6l5.5,16.6c0.3,0.8,1,1.4,1.9,1.4h19c0.8,0,1.5-0.5,1.8-1.2L44.4,10H12.8z" />
                                        <path fill="#00695C" d="M5 6A2 2 0 1 0 5 10A2 2 0 1 0 5 6Z" />
                                        <path fill="#37474F" d="M34 36A3 3 0 1 0 34 42 3 3 0 1 0 34 36zM19 36A3 3 0 1 0 19 42 3 3 0 1 0 19 36z" />
                                        <g>
                                            <path fill="#607D8B" d="M34 38A1 1 0 1 0 34 40 1 1 0 1 0 34 38zM19 38A1 1 0 1 0 19 40 1 1 0 1 0 19 38z" />
                                        </g>
                                    </svg>
                                </div>
                                <p class="text-center p-6 text-xl ordinal slashed-zero tabular-nums">
                                    No Item selected
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- end order list -->
                <!-- totalItems -->
                <x-filament-pos::right-section.total-items 
                :currency="$currency"
                :subtotal="$subtotal"
                :discount="$discount"
                :tax="$tax"
                :total="$total"
                />
                <!-- end total -->
                <!-- cash -->
                <x-filament-pos::right-section.cash 
                :currency="$currency"
                :total="$total"
                />
                <!-- end cash -->
                <!-- button pay-->
                <x-filament-pos::right-section.button-pay />
                <!-- end button pay -->
            </div>
            <!-- end right section -->
        </div>
    </div>
</x-filament::page>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () { 
        @this.on('fireCancel', el => {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    @this.cancel()
                    Swal.fire(
                    'Canceled !',
                    'Items has been deleted.',
                    'success'
                    )
                }
            })
        })

        @this.on('error', value => {
            if(value)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: value,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        })

        @this.on('success', value => {
            if(value)
            {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: value,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })

        @this.on('audio_play_delete', value => {
            if(value)
            {
                //var audio = document.getElementById("audio_play_delete");
                //audio.play();
            }
        })
        
        @this.on('audio_play_success', value => {
            if(value)
            {
                //var success = new Audio('/filament/assets/success.wav');
                //success.play();
            }
        })

        @this.on('audio_play_choose', value => {
            if(value)
            {
                //var audio = document.getElementById("audio_play_choose");
                //audio.play();
            }
        })

        @this.on('audio_play_error', value => {
            if(value)
            {
                //var audio = document.getElementById("audio_play_error");
                //audio.play();
            }
        })
    })
</script>
@endpush