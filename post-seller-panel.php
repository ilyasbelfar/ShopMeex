</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dashboard Seller -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript">
        // Parse the URL parameter
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        // Give the parameter a variable name
        var dynamicContent = getParameterByName('post_type');

         $(document).ready(function() {

            $('.big_container').hide();

            // Check the URL parameter
            if (dynamicContent == 'product') {
                $('#my_products').show();
                $('#new_product').show();
            } 
            // Check the URL parameter
            else if (dynamicContent == 'order') {
                $('#my_orders').show();
            } 
            // Check the URL parameter
            else if (dynamicContent == 'review') {
                $('#my_reviews').show();
            } 
            // Check the URL parameter
            else if (dynamicContent == 'coupon') {
                $('#my_coupons').show();
                $('#new_coupon').show();
            }
            // Check if the URL parmeter is empty or not defined, display default content
            else {
                $('#my_products').show();
                $('#new_product').show();
            }
        });
    </script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/TweenMax.min.js"></script>
        <script src="js/jquery.nice-select.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>
        <script src="js/custom.js"></script>
    </body>
</html>