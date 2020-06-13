<?php
	include 'includes/session.php';

	$pageTitle = 'Analytics';

	$breadcrumbSlug = 'analytics.php?id='.$_SESSION['id'];

	$breadcrumbName = 'Analytics';

	$prodEditErrors = '';

	include 'pre-seller-panel.php';
?>

<div class="row analytics">
	<div class="col-primary-02">
	    <div class="chart-card">
	        <div class="chart-body">
	            <div class="chart-infos">
	            	<?php
                        $totOrd = 0;
                        $stmt_500 = $db->prepare("SELECT *, COUNT(DISTINCT order_id) AS singleOrder FROM orders_items LEFT JOIN (SELECT id, owner_id FROM products) AS products on orders_items.product_id = products.id LEFT JOIN (SELECT order_id AS OrderID, order_date FROM placed_orders) AS placed_orders ON orders_items.order_id = placed_orders.OrderID WHERE owner_id=:userID AND YEAR(order_date)=:yearlyOrders GROUP BY order_id");
                        try {
                            $stmt_500->execute(['userID'=>$_SESSION['id'], 'yearlyOrders'=>date('Y')]);
                            foreach($stmt_500 as $key_500) {
                                if (isset($key_500['singleOrder']) && !empty($key_500['singleOrder'])) {
                            		$totOrd+=$key_500['singleOrder'];
                            	} else {
                            		$totOrd+=0;
                            	}
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    ?>
	            	<h4>This Year Total Orders: <?php echo $totOrd; ?></h4>
	            </div>
	            <canvas id="line" class="chartjs" width="770" height="385" style="display: block; width: 100%; height: 100%;"></canvas>
	            <script>
	                var line = document.getElementById("line").getContext("2d");

	                var gradientFill_1 = line.createLinearGradient(49, 103, 235, 1);
	                gradientFill_1.addColorStop(0, "rgba(49,103,235,0.10196)");
	                gradientFill_1.addColorStop(1, "rgba(49,103,235,0.30196)");

	                var lChart = new Chart(line,{
	                    type: 'line',
	                    data: {
	                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	                        datasets: [{
	                            label: "Orders Analytics For <?php echo date('Y'); ?>",
	                            pointRadius: 4,
	                            pointBackgroundColor: 'rgba(255,255,255,1)',
	                            pointBorderWidth: 2,
	                            fill: true,
	                            backgroundColor: gradientFill_1,
	                            borderColor: '#3167eb',
	                            borderWidth: 2,
	                            data: [<?php
	                                            for($i=1; $i<13; $i++) {
	                                                $totalOrders = 0;
	                                                $stmt = $db->prepare("SELECT *, COUNT(DISTINCT order_id) AS totalOrders FROM orders_items LEFT JOIN (SELECT id, owner_id FROM products) AS products on orders_items.product_id = products.id LEFT JOIN (SELECT order_id AS OrderID, order_date FROM placed_orders) AS placed_orders ON orders_items.order_id = placed_orders.OrderID WHERE owner_id=:userID AND MONTH(order_date)=:orderMonth AND YEAR(order_date)=:orderYear GROUP BY order_id");
	                                                try {
	                                                    $stmt->execute(['userID'=>$_SESSION['id'], 'orderMonth'=>$i, 'orderYear'=>date('Y')]);
	                                                    foreach($stmt as $key_1) {
	                                                        if (isset($key_1['totalOrders']) && !empty($key_1['totalOrders'])) {
	                                                            $totalOrders += $key_1['totalOrders'];
	                                                        } else {
	                                                            $totalOrders += 0;
	                                                        }
	                                                        
	                                                    }
	                                                    echo $totalOrders;
	                                                    echo ", ";
	                                                } catch (PDOException $e) {
	                                                    echo "Error: " . $e->getMessage();
	                                                }
	                                            }
	                                        ?>]
	                        }]
	                    },
	                    options: {
	                        responsive: false,
	                        legend: {
	                            display: true,
	                            fontFamily: "Poppins"
	                        },

	                        scales: {
	                            xAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Date'
	                                },
	                                ticks: {
	                                    display: true,
	                                    // hide main x-axis line
	                                    beginAtZero: true,
	                                    fontFamily: "Poppins"
	                                },
	                                barPercentage: 1.8,
	                                categoryPercentage: 0.2
	                            }],
	                            yAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    // hide main y-axis line
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Monthly Orders'
	                                },
	                                ticks: {
	                                    display: true,
	                                    beginAtZero: true,
	                                    min: 0,
	                                    max: <?php
                                                            switch (true) {
                                                                case ($totOrd < 10):
                                                                    echo $totOrd+5;
                                                                    break;
                                                                case ($totOrd < 100):
                                                                    echo $totOrd+10;
                                                                    break;
                                                                case ($totOrd < 1000):
                                                                    echo $totOrd+100;
                                                                    break;
                                                                case ($totOrd < 10000):
                                                                    echo $totOrd+1000;
                                                                    break;
                                                                
                                                                default:
                                                                    echo $totOrd+500;
                                                                    break;
                                                            }
                                                        ?>,

	                                    // forces step size to be in units
                                        stepSize: <?php
                                                            switch (true) {
                                                                case ($totOrd < 10):
                                                                    echo "1";
                                                                    break;
                                                                case ($totOrd < 100):
                                                                    echo "10";
                                                                    break;
                                                                case ($totOrd < 1000):
                                                                    echo "100";
                                                                    break;
                                                                case ($totOrd < 10000):
                                                                    echo "1000";
                                                                    break;
                                                                
                                                                default:
                                                                    echo "500";
                                                                    break;
                                                            }
                                                        ?>
                                    },
                                }]
                            },
	                        tooltips: {
	                            enabled: true,
	                            bodyFontFamily: "'Poppins', 'Helvetica', 'Arial', sans-serif"
	                        },
	                        animation: {
	                          easing: 'easeInOutElastic',
	                          duration: 5000
	                        }
	                    }
	                });
	            </script>
	        </div>
	    </div>
	</div>
	<div class="col-primary-02">
	    <div class="chart-card">
	        <div class="chart-body">
	            <div class="chart-infos">
	            	<?php
                        $soldItems = 0;
                        $stmt_500 = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, owner_id FROM products) AS products ON orders_items.product_id=products.id LEFT JOIN (SELECT order_id AS orderIdent, order_date, order_status FROM placed_orders) AS placed_orders ON orders_items.order_id = placed_orders.orderIdent WHERE owner_id=:userID AND order_status = 4 AND YEAR(order_date)=:yearlySales");
                        try {
                            $stmt_500->execute(['userID'=>$_SESSION['id'], 'yearlySales'=>date('Y')]);
                            foreach($stmt_500 as $key_500) {
                            	if (isset($key_500['quantity']) && !empty($key_500['quantity'])) {
                            		$soldItems+=$key_500['quantity'];
                            	} else {
                            		$soldItems+=0;
                            	}
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    ?>
	            	<h4>This Year Sold Items: <?php echo $soldItems; ?></h4>
	            </div>
	            <canvas id="line_2" class="chartjs" width="770" height="385" style="display: block; width: 100%; height: 100%;"></canvas>
	            <script>
	                var line = document.getElementById("line_2").getContext("2d");

	                var gradientFill_1 = line.createLinearGradient(49, 103, 235, 1);
	                gradientFill_1.addColorStop(0, "rgba(49,103,235,0.10196)");
	                gradientFill_1.addColorStop(1, "rgba(49,103,235,0.30196)");

	                var lChart = new Chart(line,{
	                    type: 'line',
	                    data: {
	                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	                        datasets: [{
	                            label: "Sold Items Analytics For <?php echo date('Y'); ?>",
	                            pointRadius: 4,
	                            pointBackgroundColor: 'rgba(255,255,255,1)',
	                            pointBorderWidth: 2,
	                            fill: true,
	                            backgroundColor: gradientFill_1,
	                            borderColor: '#3167eb',
	                            borderWidth: 2,
	                            data: [<?php
	                                            for($i=1; $i<13; $i++) {
	                                                $totalSoldItems = 0;
	                                                $stmt = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, owner_id FROM products) AS products ON orders_items.product_id=products.id LEFT JOIN (SELECT order_id AS orderIdent, order_date, order_status FROM placed_orders) AS placed_orders ON orders_items.order_id = placed_orders.orderIdent WHERE owner_id=:userID AND order_status = 4 AND YEAR(order_date)=:itemYear AND MONTH(order_date)=:itemMonth");
	                                                try {
	                                                    $stmt->execute(['userID'=>$_SESSION['id'], 'itemMonth'=>$i, 'itemYear'=>date('Y')]);
	                                                    foreach($stmt as $key_1) {
	                                                        if (isset($key_1['quantity']) && !empty($key_1['quantity'])) {
	                                                            $totalSoldItems += $key_1['quantity'];
	                                                        } else {
	                                                            $totalSoldItems += 0;
	                                                        }
	                                                        
	                                                    }
	                                                    echo $totalSoldItems;
	                                                    echo ", ";
	                                                } catch (PDOException $e) {
	                                                    echo "Error: " . $e->getMessage();
	                                                }
	                                            }
	                                        ?>]
	                        }]
	                    },
	                    options: {
	                        responsive: false,
	                        legend: {
	                            display: true,
	                            fontFamily: "Poppins"
	                        },

	                        scales: {
	                            xAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Date'
	                                },
	                                ticks: {
	                                    display: true,
	                                    // hide main x-axis line
	                                    beginAtZero: true,
	                                    fontFamily: "Poppins"
	                                },
	                                barPercentage: 1.8,
	                                categoryPercentage: 0.2
	                            }],
	                            yAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    // hide main y-axis line
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Monthly Sold Items'
	                                },
	                                ticks: {
	                                    display: true,
	                                    beginAtZero: true,
	                                    min: 0,
	                                    max: <?php
                                                            switch (true) {
                                                                case ($soldItems < 10):
                                                                    echo $soldItems+5;
                                                                    break;
                                                                case ($soldItems < 100):
                                                                    echo $soldItems+10;
                                                                    break;
                                                                case ($soldItems < 1000):
                                                                    echo $soldItems+100;
                                                                    break;
                                                                case ($soldItems < 10000):
                                                                    echo $soldItems+1000;
                                                                    break;
                                                                
                                                                default:
                                                                    echo $soldItems+500;
                                                                    break;
                                                            }
                                                        ?>,

	                                    // forces step size to be in units
                                        stepSize: <?php
                                                            switch (true) {
                                                                case ($soldItems < 10):
                                                                    echo "1";
                                                                    break;
                                                                case ($soldItems < 100):
                                                                    echo "10";
                                                                    break;
                                                                case ($soldItems < 1000):
                                                                    echo "100";
                                                                    break;
                                                                case ($soldItems < 10000):
                                                                    echo "1000";
                                                                    break;
                                                                
                                                                default:
                                                                    echo "500";
                                                                    break;
                                                            }
                                                        ?>
                                    },
                                }]
                            },
	                        tooltips: {
	                            enabled: true,
	                            bodyFontFamily: "'Poppins', 'Helvetica', 'Arial', sans-serif"
	                        },
	                        animation: {
	                          easing: 'easeInOutElastic',
	                          duration: 5000
	                        }
	                    }
	                });
	            </script>
	        </div>
	    </div>
	</div>
	<div class="col-primary-02">
	    <div class="chart-card">
	        <div class="chart-body">
	            <div class="chart-infos">
	            	<?php
                        $discountedOrders = 0;
                        $stmt_500 = $db->prepare("SELECT DISTINCT *, COUNT(*) AS yearlyDiscountedOrders FROM placed_orders LEFT JOIN (SELECT DISTINCT order_id, product_id FROM orders_items) AS orders_items ON placed_orders.order_id = orders_items.order_id LEFT JOIN products ON orders_items.product_id = products.id WHERE placed_orders.coupon_used = 1 AND YEAR(order_date) =:yearlyDiscountedOrders AND owner_id=:userID GROUP BY orders_items.order_id");
                        try {
                            $stmt_500->execute(['userID'=>$_SESSION['id'], 'yearlyDiscountedOrders'=>date('Y')]);
                            foreach($stmt_500 as $key_500) {
                            	if (isset($key_500['yearlyDiscountedOrders']) && !empty($key_500['yearlyDiscountedOrders'])) {
                            		$discountedOrders+=$key_500['yearlyDiscountedOrders'];
                            	} else {
                            		$discountedOrders+=0;
                            	}
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    ?>
	            	<h4>This Year Discounted Orders: <?php echo $discountedOrders; ?></h4>
	            </div>
	            <canvas id="line_3" class="chartjs" width="770" height="385" style="display: block; width: 100%; height: 100%;"></canvas>
	            <script>
	                var line = document.getElementById("line_3").getContext("2d");

	                var gradientFill_1 = line.createLinearGradient(49, 103, 235, 1);
	                gradientFill_1.addColorStop(0, "rgba(49,103,235,0.10196)");
	                gradientFill_1.addColorStop(1, "rgba(49,103,235,0.30196)");

	                var lChart = new Chart(line,{
	                    type: 'line',
	                    data: {
	                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	                        datasets: [{
	                            label: "Discounted Orders Analytics For <?php echo date('Y'); ?>",
	                            pointRadius: 4,
	                            pointBackgroundColor: 'rgba(255,255,255,1)',
	                            pointBorderWidth: 2,
	                            fill: true,
	                            backgroundColor: gradientFill_1,
	                            borderColor: '#3167eb',
	                            borderWidth: 2,
	                            data: [<?php
	                                            for($i=1; $i<13; $i++) {
	                                                $totalDiscountedOrders = 0;
	                                                $stmt = $db->prepare("SELECT DISTINCT *, COUNT(*) AS monthlyDiscountedOrders FROM placed_orders LEFT JOIN (SELECT DISTINCT order_id, product_id FROM orders_items) AS orders_items ON placed_orders.order_id = orders_items.order_id LEFT JOIN products ON orders_items.product_id = products.id WHERE placed_orders.coupon_used = 1 AND YEAR(order_date) =:yearlyDiscountedOrders AND MONTH(order_date) =:monthlyDiscountedOrders AND owner_id=:userID GROUP BY orders_items.order_id");
	                                                try {
	                                                    $stmt->execute(['userID'=>$_SESSION['id'], 'monthlyDiscountedOrders'=>$i, 'yearlyDiscountedOrders'=>date('Y')]);
	                                                    foreach($stmt as $key_1) {
	                                                        if (isset($key_1['monthlyDiscountedOrders']) && !empty($key_1['monthlyDiscountedOrders'])) {
	                                                            $totalDiscountedOrders += $key_1['monthlyDiscountedOrders'];
	                                                        } else {
	                                                            $totalDiscountedOrders += 0;
	                                                        }
	                                                        
	                                                    }
	                                                    echo $totalDiscountedOrders;
	                                                    echo ", ";
	                                                } catch (PDOException $e) {
	                                                    echo "Error: " . $e->getMessage();
	                                                }
	                                            }
	                                        ?>]
	                        }]
	                    },
	                    options: {
	                        responsive: false,
	                        legend: {
	                            display: true,
	                            fontFamily: "Poppins"
	                        },

	                        scales: {
	                            xAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Date'
	                                },
	                                ticks: {
	                                    display: true,
	                                    // hide main x-axis line
	                                    beginAtZero: true,
	                                    fontFamily: "Poppins"
	                                },
	                                barPercentage: 1.8,
	                                categoryPercentage: 0.2
	                            }],
	                            yAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    // hide main y-axis line
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Monthly Discounted Orders'
	                                },
	                                ticks: {
	                                    display: true,
	                                    beginAtZero: true,
	                                    min: 0,
	                                    max: <?php switch (true) {
                                                                case ($discountedOrders < 10):
                                                                    echo $discountedOrders+5;
                                                                    break;
                                                                case ($discountedOrders < 100):
                                                                    echo $discountedOrders+10;
                                                                    break;
                                                                case ($discountedOrders < 1000):
                                                                    echo $discountedOrders+100;
                                                                    break;
                                                                case ($discountedOrders < 10000):
                                                                    echo $discountedOrders+1000;
                                                                    break;
                                                                
                                                                default:
                                                                    echo $discountedOrders+500;
                                                                    break;
                                                            } ?>,

	                                    // forces step size to be in units
                                        stepSize: <?php
                                                            switch (true) {
                                                                case ($discountedOrders < 10):
                                                                    echo "1";
                                                                    break;
                                                                case ($discountedOrders < 100):
                                                                    echo "10";
                                                                    break;
                                                                case ($discountedOrders < 1000):
                                                                    echo "100";
                                                                    break;
                                                                case ($discountedOrders < 10000):
                                                                    echo "1000";
                                                                    break;
                                                                
                                                                default:
                                                                    echo "500";
                                                                    break;
                                                            }
                                                        ?>
                                    },
                                }]
                            },
	                        tooltips: {
	                            enabled: true,
	                            bodyFontFamily: "'Poppins', 'Helvetica', 'Arial', sans-serif"
	                        },
	                        animation: {
	                          easing: 'easeInOutElastic',
	                          duration: 5000
	                        }
	                    }
	                });
	            </script>
	        </div>
	    </div>
	</div>
	<div class="col-primary-02">
	    <div class="chart-card">
	        <div class="chart-body">
	            <div class="chart-infos">
	            	<?php
                        $usedCouponsAmount = 0;
                        $stmt_500 = $db->prepare("SELECT * FROM placed_orders LEFT JOIN (SELECT order_id AS orderID, product_id, quantity, usedcoupon_code FROM orders_items) AS orders_items ON placed_orders.order_id = orders_items.orderID LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id = products.id LEFT JOIN (SELECT coupon_code, discount, product_id FROM coupons) AS coupons ON coupons.coupon_code = orders_items.usedcoupon_code AND coupons.product_id = orders_items.product_id WHERE products.owner_id =:userID AND placed_orders.coupon_used = 1 AND YEAR(order_date) =:yearlyusedCouponsAmount ORDER BY placed_orders.order_id");
                        try {
                            $stmt_500->execute(['userID'=>$_SESSION['id'], 'yearlyusedCouponsAmount'=>date('Y')]);
                            foreach($stmt_500 as $key_500) {
                            	if (isset($key_500['quantity']) && !empty($key_500['quantity'])) {
                            		$usedCouponsAmount+=(($key_500['quantity']*$key_500['price'])*$key_500['discount'])/100;
                            	} else {
                            		$usedCouponsAmount+=0;
                            	}
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    ?>
	            	<h4>This Year Used Coupons Amount: $<?php echo $usedCouponsAmount; ?></h4>
	            </div>
	            <canvas id="line_4" class="chartjs" width="770" height="385" style="display: block; width: 100%; height: 100%;"></canvas>
	            <script>
	                var line = document.getElementById("line_4").getContext("2d");

	                var gradientFill_1 = line.createLinearGradient(49, 103, 235, 1);
	                gradientFill_1.addColorStop(0, "rgba(49,103,235,0.10196)");
	                gradientFill_1.addColorStop(1, "rgba(49,103,235,0.30196)");

	                var lChart = new Chart(line,{
	                    type: 'line',
	                    data: {
	                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	                        datasets: [{
	                            label: "Used Coupons Amount Analytics For <?php echo date('Y'); ?>",
	                            pointRadius: 4,
	                            pointBackgroundColor: 'rgba(255,255,255,1)',
	                            pointBorderWidth: 2,
	                            fill: true,
	                            backgroundColor: gradientFill_1,
	                            borderColor: '#3167eb',
	                            borderWidth: 2,
	                            data: [<?php
	                                            for($i=1; $i<13; $i++) {
	                                                $totalUsedCouponsAmount = 0;
	                                                $stmt = $db->prepare("SELECT * FROM placed_orders LEFT JOIN (SELECT order_id AS orderID, product_id, quantity, usedcoupon_code FROM orders_items) AS orders_items ON placed_orders.order_id = orders_items.orderID LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id = products.id LEFT JOIN (SELECT coupon_code, discount, product_id FROM coupons) AS coupons ON coupons.coupon_code = orders_items.usedcoupon_code AND coupons.product_id = orders_items.product_id WHERE products.owner_id =:userID AND placed_orders.coupon_used = 1 AND YEAR(order_date) =:yearlyusedCouponsAmount AND MONTH(order_date) =:monthlyusedCouponsAmount ORDER BY placed_orders.order_id");
	                                                try {
	                                                    $stmt->execute(['userID'=>$_SESSION['id'], 'monthlyusedCouponsAmount'=>$i, 'yearlyusedCouponsAmount'=>date('Y')]);
	                                                    foreach($stmt as $key_1) {
	                                                        if (isset($key_1['quantity']) && !empty($key_1['quantity'])) {
	                                                            $totalUsedCouponsAmount += (($key_1['quantity']*$key_1['price'])*$key_1['discount'])/100;
	                                                        } else {
	                                                            $totalUsedCouponsAmount += 0;
	                                                        }
	                                                        
	                                                    }
	                                                    echo $totalUsedCouponsAmount;
	                                                    echo ", ";
	                                                } catch (PDOException $e) {
	                                                    echo "Error: " . $e->getMessage();
	                                                }
	                                            }
	                                        ?>]
	                        }]
	                    },
	                    options: {
	                        responsive: false,
	                        legend: {
	                            display: true,
	                            fontFamily: "Poppins"
	                        },

	                        scales: {
	                            xAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Date'
	                                },
	                                ticks: {
	                                    display: true,
	                                    // hide main x-axis line
	                                    beginAtZero: true,
	                                    fontFamily: "Poppins"
	                                },
	                                barPercentage: 1.8,
	                                categoryPercentage: 0.2
	                            }],
	                            yAxes: [{
	                                gridLines: {
	                                    drawBorder: true,
	                                    // hide main y-axis line
	                                    display: true
	                                },
	                                scaleLabel: {
	                                    display: true,
	                                    labelString: 'Monthly Used Coupons Amount'
	                                },
	                                ticks: {
	                                    display: true,
	                                    beginAtZero: true,
	                                    min: 0,
	                                    max: <?php switch (true) {
                                                                case ($usedCouponsAmount < 10):
                                                                    echo $usedCouponsAmount+5;
                                                                    break;
                                                                case ($usedCouponsAmount < 100):
                                                                    echo $usedCouponsAmount+10;
                                                                    break;
                                                                case ($usedCouponsAmount < 1000):
                                                                    echo $usedCouponsAmount+100;
                                                                    break;
                                                                case ($usedCouponsAmount < 10000):
                                                                    echo $usedCouponsAmount+1000;
                                                                    break;
                                                                
                                                                default:
                                                                    echo $usedCouponsAmount+500;
                                                                    break;
                                                            } ?>,

	                                    // forces step size to be in units
                                        stepSize: <?php
                                                            switch (true) {
                                                                case ($usedCouponsAmount < 10):
                                                                    echo "1";
                                                                    break;
                                                                case ($usedCouponsAmount < 100):
                                                                    echo "10";
                                                                    break;
                                                                case ($usedCouponsAmount < 1000):
                                                                    echo "100";
                                                                    break;
                                                                case ($usedCouponsAmount < 10000):
                                                                    echo "1000";
                                                                    break;
                                                                
                                                                default:
                                                                    echo "500";
                                                                    break;
                                                            }
                                                        ?>
                                    },
                                }]
                            },
	                        tooltips: {
	                            enabled: true,
	                            bodyFontFamily: "'Poppins', 'Helvetica', 'Arial', sans-serif"
	                        },
	                        animation: {
	                          easing: 'easeInOutElastic',
	                          duration: 5000
	                        }
	                    }
	                });
	            </script>
	        </div>
	    </div>
	</div>
</div>


<?php
	include 'post-seller-panel.php';
?>