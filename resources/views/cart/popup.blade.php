<style>
    .cart-popup {
        position: fixed;
        top: 90px;
        right: -420px;
        width: 360px;
        max-width: calc(100vw - 40px);
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: var(--shadow);
        z-index: 9999;
        transition: right 0.35s ease;
        overflow: hidden;
    }

    .cart-popup.show {
        right: 10px;
    }

    .cart-popup-content {
        padding: 20px;
        color: var(--text-main);
    }

    .cart-popup-header h4 {
        margin: 0 0 5px;
        font-size: 22px;
        color: var(--text-main);
    }

    .cart-popup-header p {
        margin: 0 0 20px;
        color: var(--text-muted);
    }

    .cart-popup-body {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-bottom: 20px;
    }

    .cart-popup-image {
        width: 110px;
        height: auto;
        border-radius: 12px;
        background: var(--bg-main);
        object-fit: contain;
        padding: 8px;
        border: 1px solid var(--border);
    }

    .cart-popup-details h5 {
        margin: 0 0 10px;
        font-size: 20px;
        color: var(--text-main);
    }

    .cart-popup-details p {
        margin: 4px 0;
        color: var(--text-main);
    }

    .cart-popup-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .cart-popup-close {
        position: absolute;
        top: 12px;
        right: 14px;
        border: none;
        background: transparent;
        color: var(--text-main);
        font-size: 28px;
        cursor: pointer;
        line-height: 1;
    }

    .cart-popup-close:hover {
        color: var(--accent);
    }

    .cart-popup .button {
        width: 100%;
        text-align: center;
    }

    .button-secondary {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-main);
    }

    .button-secondary:hover {
        background: var(--bg-header);
        border-color: var(--accent);
    }

    @media (max-width: 768px) {
        .cart-popup {
            top: 80px;
            width: calc(100vw - 20px);
            right: -110%;
        }

        .cart-popup.show {
            right: 10px;
        }
    }

</style>

<div id="cart-popup" class="cart-popup">
    <button type="button" id="close-cart-popup" class="cart-popup-close">&times;</button>

    <div class="cart-popup-content">
        <div class="cart-popup-header">
            <h4>Added to cart</h4>
            <p>Item saved to your cart</p>
        </div>

        <div class="cart-popup-body">
            <img id="cart-popup-image" src="" alt="Product image" class="cart-popup-image">

            <div class="cart-popup-details">
                <h5 id="cart-popup-name"></h5>
                <p id="cart-popup-price"></p>
                <p id="cart-popup-quantity"></p>
                <p id="cart-popup-total"></p>
            </div>
        </div>

        <div class="cart-popup-actions">
            <a href="#" class="button">View Cart</a>
            <button type="button" id="continue-shopping" class="button button-secondary">
                Continue Shopping
            </button>
        </div>
    </div>
</div>

<script>
    function showCartPopup() {
        let selected = $('#product').find(':selected');
        let quantity = parseInt($('#quantity').val()) || 1;
        let price = parseFloat(selected.data('price')) || 0;
        let image = selected.data('image');
        let name = selected.data('name');
        let unit = selected.data('unit');

        if (!selected.val()) {
            return;
        }

        let total = quantity * price;

        $('#cart-popup-image').attr('src', '/storage/' + image);
        $('#cart-popup-name').text(name);
        $('#cart-popup-price').text('R' + price.toFixed(2) + ' / ' + unit);
        $('#cart-popup-quantity').text('Quantity: ' + quantity);
        $('#cart-popup-total').text('Total: R' + total.toFixed(2));

        $('#cart-popup').addClass('show');

        clearTimeout(window.cartPopupTimeout);
        window.cartPopupTimeout = setTimeout(function () {
            $('#cart-popup').removeClass('show');
        }, 10000);
    }

    // $('#add-to-cart').on('click', function () {
    //     showCartPopup();
    // });

    $('#close-cart-popup, #continue-shopping').on('click', function () {
        $('#cart-popup').removeClass('show');
    });
</script>
