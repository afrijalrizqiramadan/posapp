<div class="input-group d-flex justify-content-center">
    <select name="price" id="price" class="form-control"
    wire:key="update-price-{{ $cart_item->rowId }}" wire:change="updatePrice('{{ $cart_item->rowId }}', $event.target.value)">
        <option value="{{ $cart_item->options->price1 }}">{{ format_currency($cart_item->options->price1) }}</option>
        <option value="{{ $cart_item->options->price2 }}">{{ format_currency($cart_item->options->price2) }}</option>
    </select>
</div>
