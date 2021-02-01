<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        <form method="post" action="">
            @csrf

            <!-- Item Name -->
            <div>
                <x-label for="Item" :value="__('Item')" />

                <!--x-input class="block mt-1 w-full" type="text" name="item"  required autofocus /-->
                <select class="block mt-1 w-full" name="item_id" id="item_id">
                    <!--option value="0">Select Item</option-->
                @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->item_name}}</option>
                @endforeach
                </select>
            </div>

            <!-- Item_ Qty -->
            <div class="mt-4">
                <x-label for="Quantity" :value="__('Quantity')" />

                <input class="block mt-1 w-full"
                                type="text"
                                name="quantity"
                                id="qty"
                                required />
            </div>
            <div class="mt-4">
                <x-label for="Item per Rate" :value="__('Item per Rate')" />

                <input class="block mt-1 w-full"
                                type="text"
                                name="item_rate"
                                id="item_rate"
                                required />
            </div>

            <div class="mt-4">
                <x-label for="Total Amount" :value="__('Total Amount')" />

                <input class="block mt-1 w-full"
                                type="text"
                                name="total_amt"
                                id="total"
                                required />
            </div>

            <div class="mt-4">
                <x-button class="ml-3">
                    submit
                </x-button>
            </div>
        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $("#item_id").change(function() {
    $.ajax({
    url: '/getprice/' + $(this).val(),
    type: 'get',
    data: {},
    success: function(data) {
      //console.log(data);
      $('#item_rate').val(data);
    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
});
$('input[name=\'quantity\']').on('change keyup click', function() {
  var price = $('#item_rate').val();
 // var currency = $('.price').val().substr(0, 1);
  var quantity = $('#qty').val();
  $('#total').val(price * quantity);
});
</script>
