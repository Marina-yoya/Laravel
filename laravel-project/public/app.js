// import '../resources/js/bootstrap';
$(document).ready(function () {

    const loginButton = $('.login-btn');
    loginButton.click(function () {
        window.location.href = 'loginPage.php';
    });


    const mapImage = $('#map-image');
    const popup = $('#popup');
    const range1 = { minX: 150, maxX: 300, minY: 235, maxY: 355 };
    const range2 = { minX: 1000, maxX: 1090, minY: 130, maxY: 280 };

    let popupVisible = false;

    function hidePopup() {
        popup.hide();
        popupVisible = false;
    }

    mapImage.click(function (event) {

        const x = event.offsetX;
        const y = event.offsetY;

        console.log(x, y);

        if (x >= range1.minX && x <= range1.maxX && y >= range1.minY && y <= range1.maxY) {
            popup.css({ left: x + 'px', top: y + 'px' });
            popup.show();
            popupVisible = true;

        }

        else if (x >= range2.minX && x <= range2.maxX && y >= range2.minY && y <= range2.maxY) {
            popup.css({ left: x + 'px', top: y + 'px' });
            popup.show();
            popupVisible = true;

        } else {

            if (popupVisible) {
                hidePopup();
            }
        }
    });

    popup.click(function () {
        hidePopup();
    });




    function updateCartBadge(count) {
        $('#cart-badge').text(count);
    }

    function getCartItemCount() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        console.log(csrfToken);
        $.ajax({
            type: 'GET',
            url: '/get_cart_item_count',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function (data) {
                console.log("here")
                if (data.success) {
                    updateCartBadge(data.cartItemCount);
                    console.log('Updated cart count:', data.cartItemCount);
                } else {
                    console.error('Failed to retrieve cart item count.');
                }
            },
            error: function (status) {
                console.error('An error occurred while fetching cart item count.');
                console.error('Status:', status);
                
            }
        });
    }

    getCartItemCount();




    let carouselContainer = $(".carousel-container");
    let carousel = carouselContainer.find(".carousel");
    let products = carouselContainer.find(".part-container");
    let productWidth = products.eq(0).width() + parseInt(products.eq(0).css("marginRight"));
    let currentPosition = 0;

    $(".left-arrow").on("click", function () {
        console.log("clicked")
        if (currentPosition < 0) {
            currentPosition += productWidth;
            if (currentPosition > 0) {
                currentPosition = 0;
            }
            carousel.css("transform", "translateX(" + currentPosition + "px)");
            // carousel.style.transform = "translateX(" + currentPosition + "px)";
        }
    });


    $(".right-arrow").on("click", function () {
        console.log("clicked")
        if (currentPosition > -productWidth * (products.length - 3)) {
            currentPosition -= productWidth;
            if (currentPosition < -productWidth * (products.length - 3)) {
                currentPosition = -productWidth * (products.length - 3);
            }
            carousel.css("transform", "translateX(" + currentPosition + "px)");
            //   carousel.style.transform = "translateX(" + currentPosition + "px)";
        }
    });







});
