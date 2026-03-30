<style>

    .header-cart {
        position: relative;
        display: inline-block;
    }

    .header-cart-toggle {
        position: relative;
        background: transparent;
        border: 1px solid var(--accent);
        border-radius: 14px;
        padding: 10px 14px;
        color: var(--text-main);
        cursor: pointer;
    }

    .cart-count {
        position: absolute;
        top: -6px;
        right: -6px;
        min-width: 18px;
        height: 18px;
        padding: 0 5px;
        border-radius: 999px;
        background: var(--bg-main);
        color: var(--text-main);
        font-size: 12px;
        line-height: 18px;
        text-align: center;
    }

    .header-cart-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 320px;
        background: var(--bg-main);
        border: 1px solid var(--accent);
        border-radius: 18px;
        padding: 16px;
        display: none;
        z-index: 999;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .header-cart-toggle:hover {
        background: var(--accent);
    }

    .header-cart:hover .header-cart-dropdown {
        display: block;
    }

    .mini-cart-item {
        display: flex;
        gap: 12px;
        margin-bottom: 14px;
    }

    .mini-cart-item img {
        /*width: 56px;*/
        /*height: 56px;*/
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid var(--accent);
        background: var(--bg-main);
    }

    .mini-cart-name {
        color: var(--text-main);
        font-weight: 600;
    }

    .mini-cart-meta,
    .mini-cart-total,
    .mini-cart-empty {
        color: var(--text-main);
        font-size: 14px;
    }

    .mini-cart-footer {
        border-top: 1px solid rgba(212,160,23,0.3);
        padding-top: 12px;
        margin-top: 12px;
    }

    .mini-cart-button {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 14px;
        border-radius: 12px;
        background: var(--accent);
        color: var(--text-main);
        text-decoration: none;
        font-weight: 600;
    }

</style>

<div class="header-cart">
    <button type="button" class="header-cart-toggle">
        <i style="color: var(--text-main)" class="fa-solid fa-cart-shopping fa-lg"></i>
        <span class="cart-count">{{ $cartCount }}</span>
    </button>

    <div class="header-cart-dropdown">
        @if($cartCount > 0)
            @foreach($cart as $item)
                <div class="mini-cart-item">
                    <img src="{{ asset('storage/' . $item['image_path']) }}" alt="{{ $item['name'] }}">
                    <div class="mini-cart-details">
                        <div class="mini-cart-name">{{ $item['name'] }}</div>
                        <div class="mini-cart-meta">
                            {{ $item['quantity'] }} x R{{ number_format($item['price'], 2) }}
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mini-cart-footer">
                <div class="mini-cart-total">
                    Total: R{{ number_format($cartTotal, 2) }}
                </div>
                <a href="#" class="mini-cart-button">Go To Cart</a>
            </div>
        @else
            <div class="mini-cart-empty">
                Your cart is empty.
            </div>
        @endif
    </div>
</div>
