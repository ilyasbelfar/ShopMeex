<?php

    include 'includes/session.php';

    $pageTitle = 'Home';

    $breadcrumbSlug = 'seller-dashboard.php?page=home';

    $breadcrumbName = 'Home';

    include 'pre-seller-panel.php';

?>
                                <div class="row">
                                    <?php
                                        $sql = $db->prepare("SELECT *, COUNT(owner_id) AS prodsTotal, owner_id FROM products LEFT JOIN users ON products.owner_id = users.id WHERE users.id =?");
                                        $sql->bindValue(1, $_SESSION['id']);
                                        try {
                                            $sql->execute();
                                            $result=$sql->fetch(PDO::FETCH_ASSOC);
                                        } catch (PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    ?>
                                    <div class="col-primary-01">
                                        <div class="card-wrapper">
                                            <div class="card-head">
                                                <div class="wlcm-msg-txt">
                                                    <h5>Welcome Back !</h5>
                                                    <p>In Seller Dashboard</p>
                                                </div>
                                                <div class="wlcm-msg-img">
                                                    <img src="images/welcome-message-wrapper-image.png">
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-content-wrapper">
                                                    <div class="col-42">
                                                        <div class="avatar-profile-user">
                                                            <img title="Your Profile Picture" alt="Your Profile Picture" src="images/users/<?php echo $result['picture'] ?>">
                                                        </div>
                                                        <h5 title="<?php echo ucwords($result['firstname'].' '.$result['lastname']); ?>"><?php echo ucwords($result['firstname'].' '.$result['lastname']); ?></h5>
                                                        <p><?php if($result['type'] == 2) {echo 'Seller';} if($result['type'] == 4) {echo 'Seller/Buyer';} ?></p>
                                                    </div>
                                                    <div class="col-43">
                                                        <div class="col-stats">
                                                            <div class="col-stats-content">
                                                                <h5><?php echo $result['prodsTotal'] ?></h5>
                                                                <p>Products</p>
                                                            </div>
                                                            <div class="col-stats-content">
                                                                <?php
                                                                    $costTotal = 0;
                                                                    $stmt = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id=products.id LEFT JOIN placed_orders ON orders_items.order_id = placed_orders.order_id WHERE owner_id=:userID AND order_status = 4");
                                                                    try {
                                                                        $stmt->execute(['userID'=>$_SESSION['id']]);
                                                                    foreach($stmt as $key) {
                                                                        $costTotal+=$key['price']*$key['quantity'];
                                                                    }
                                                                    } catch (PDOException $e) {
                                                                        echo "Error: " . $e->getMessage();
                                                                    }
                                                                ?>
                                                                <h5>$<?php echo number_format($costTotal); ?></h5>
                                                                <p>Revenue</p>
                                                            </div>
                                                        </div>
                                                        <div class="post-link">
                                                            <a href="profile.php?id=<?php echo $_SESSION['id']; ?>">
                                                                Edit Profile <i class="fas fa-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-earnings">
                                            <?php
                                                $monthly_cost = 0;
                                                $stmt = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id=products.id LEFT JOIN placed_orders ON orders_items.order_id = placed_orders.order_id WHERE owner_id=:userID AND order_status = 4 AND order_date >= DATE_FORMAT(CURDATE() ,'%Y-%m-01') AND order_date <= now()");
                                                try {
                                                    $stmt->execute(['userID'=>$_SESSION['id']]);
                                                    foreach($stmt as $ko) {
                                                        $monthly_cost+=$ko['price']*$ko['quantity'];
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "Error: " . $e->getMessage();
                                                }
                                            ?>
                                            <div class="card-earnings-content">
                                                <div class="card-head-title">Monthly Earning</div>
                                                <div class="earnings-row">
                                                    <div class="earnings-col">
                                                        <p class="col-text">This month</p>
                                                        <h3>$<?php echo number_format($monthly_cost); ?></h3>
                                                        <p class="col-text">
                                                            <?php
                                                                $increase_arrow = '';
                                                                $increase_class = '';
                                                                $increase_percentage = 0;
                                                                $previous_month_cost = 0;
                                                                $stmt = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id=products.id LEFT JOIN placed_orders ON orders_items.order_id = placed_orders.order_id WHERE owner_id=:userIdent AND order_status = 4 AND order_date >= DATE_FORMAT( CURRENT_DATE - INTERVAL 1 MONTH, '%Y/%m/01' ) AND order_date < DATE_FORMAT( CURRENT_DATE, '%Y/%m/01' )");
                                                                try {
                                                                    $stmt->execute(['userIdent'=>$_SESSION['id']]);
                                                                    foreach($stmt as $ko) {
                                                                        $previous_month_cost+=$ko['price']*$ko['quantity'];
                                                                    }

                                                                    if ($previous_month_cost != 0) {
                                                                        if (($monthly_cost - $previous_month_cost) >= 0) {
                                                                        $increase_percentage = (($monthly_cost - $previous_month_cost)/$previous_month_cost) * 100;
                                                                        $increase_arrow = 'up';
                                                                        $increase_class = '';
                                                                        } else {
                                                                            $increase_percentage = (($previous_month_cost - $monthly_cost)/$previous_month_cost) * 100;
                                                                            $increase_arrow = 'down';
                                                                            $increase_class = 'dec';
                                                                        }
                                                                    } else {
                                                                        $increase_percentage = 100;
                                                                        $increase_arrow = 'up';
                                                                        $increase_class = '';
                                                                    }
                                                                    
                                                                } catch (PDOException $e) {
                                                                    echo "Error: " . $e->getMessage();
                                                                }
                                                            ?>
                                                            <span class="col-msg <?php echo $increase_class;  ?>">
                                                                <?php echo number_format((float)$increase_percentage, 2, '.', '');  ?>% <i class="fas fa-arrow-<?php echo $increase_arrow; ?>"></i>
                                                            </span>
                                                            From previous period
                                                        
                                                        </p>
                                                        <div class="post-link">
                                                            <a href="#">
                                                                View More <i class="fas fa-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="earnings-col has-chart">
                                                        <p>Trending Product For This Month:</p>
                                                        <div id="earnings-col-chart" class="earnings-col-chart">
                                                            <?php
                                                                $previous_total_price = 0;
                                                                $total_price = 0;
                                                                $top_selling_product_name = '';
                                                                $top_selling_product_percentage = 0;
                                                                $stmt = $db->prepare("SELECT *, SUM(quantity) AS qty FROM orders_items LEFT JOIN (SELECT id, name, slug, owner_id, price FROM products) AS products on orders_items.product_id = products.id LEFT JOIN (SELECT order_id AS OrderID, order_date, order_status FROM placed_orders) AS placed_orders ON orders_items.order_id = placed_orders.OrderID WHERE owner_id =:userIdentificateur AND order_status = 4 AND order_date >= DATE_FORMAT(CURDATE() ,'%Y-%m-01') AND order_date <= now() GROUP BY product_id");
                                                                try {
                                                                    $stmt->execute(['userIdentificateur'=>$_SESSION['id']]);
                                                                    foreach($stmt as $keys) {
                                                                        $total_price=$keys['price']*$keys['qty'];
                                                                        if ($total_price > $previous_total_price) {
                                                                            $previous_total_price = $total_price;
                                                                            $top_selling_product_name = $keys['name'];
                                                                            $top_selling_product_slug = $keys['slug'];
                                                                        }
                                                                    }
                                                                    $top_selling_product_percentage = ($previous_total_price/$monthly_cost) * 100;
                                                                    
                                                                } catch (PDOException $e) {
                                                                    echo "Error: " . $e->getMessage();
                                                                }
                                                            ?>
                                                            <canvas class="chart__canvas" id="chartCanvas" width="135" height="137.5" role="img"></canvas>
                                                            <script type="text/javascript">
                                                                const percent = <?php echo number_format((float)$top_selling_product_percentage, 2, '.', ''); ?>;
                                                                const color = '#3167eb';
                                                                const canvas = 'chartCanvas';
                                                                const container = 'earnings-col-chart';

                                                                const percentValue = percent;
                                                                const colorBlue = color,
                                                                    animationTime = '1400';

                                                                const chartCanvas = document.getElementById(canvas),
                                                                    chartContainer = document.getElementById(container),
                                                                    divElement = document.createElement('div'),
                                                                    domString = '<div class="chart__value"><p title="Top Selling Product Percentage">' + percentValue + '%</p></div>';


                                                                const doughnutChart = new Chart(chartCanvas, {
                                                                    type: 'doughnut',
                                                                    data: {
                                                                        datasets: [
                                                                            {
                                                                                data: [percentValue, 100 - percentValue],
                                                                                backgroundColor: [colorBlue],
                                                                                borderWidth: 0
                                                                            }
                                                                        ]
                                                                    },
                                                                    options: {
                                                                        cutoutPercentage: 84,
                                                                        responsive: false,
                                                                        tooltips: {
                                                                            enabled: false
                                                                        }
                                                                    }
                                                                });

                                                                Chart.defaults.global.animation.duration = animationTime;

                                                                divElement.innerHTML = domString;
                                                                chartContainer.appendChild(divElement.firstChild);

                                                            </script>
                                                        </div>
                                                        <p title="Top Selling Product This Month"><a target="_blank" href="product.php?product=<?php echo $top_selling_product_slug; ?>"><?php echo ucwords($top_selling_product_name); ?></a></p>
                                                    </div>
                                                </div>
                                                <p>We craft digital, graphic and dimensional thinking.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-primary-02">
                                        <div class="card-row-2">
                                            <div class="card-col-2">
                                                <div class="wid-stats-card">
                                                    <div class="wid-stats-card-content">
                                                        <div class="wid-stats-body">
                                                            <?php
                                                                $ordersNum = 0;
                                                                $on_hold = 0;
                                                                $refunded = 0;
                                                                $failed = 0;
                                                                $processing = 0;
                                                                $stmt = $db->prepare("SELECT *, COUNT(*) AS ordersNum FROM orders_items LEFT JOIN products ON orders_items.product_id = products.id LEFT JOIN (SELECT order_id AS OrderID, order_status FROM placed_orders) AS placed_orders ON orders_items.order_id=placed_orders.OrderID WHERE owner_id = ? GROUP BY order_id");
                                                                $stmt->bindValue(1, $_SESSION['id']);
                                                                try {
                                                                    $stmt->execute();
                                                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                    foreach ($results as $cle) {
                                                                        $ordersNum +=1;
                                                                        if ($cle['order_status'] == 1) {
                                                                            $on_hold += 1;
                                                                        }
                                                                        if ($cle['order_status'] == 2) {
                                                                            $failed += 1;
                                                                        }
                                                                        if ($cle['order_status'] == 3) {
                                                                            $refunded += 1;
                                                                        }
                                                                        if ($cle['order_status'] == 4) {
                                                                            $processing += 1;
                                                                        }
                                                                    }
                                                                } catch (PDOException $e) {
                                                                    echo "Error: " . $e->getMessage();
                                                                }
                                                            ?>
                                                            <p>Orders</p>
                                                            <h4><?php echo $ordersNum; ?></h4>
                                                        </div>
                                                        <div class="wid-stats-icon">
                                                            <span>
                                                                <i class="far fa-calendar-check"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-col-2">
                                                <div class="wid-stats-card">
                                                    <div class="wid-stats-card-content">
                                                        <div class="wid-stats-body">
                                                            <p>Revenue</p>
                                                            <h4>$<?php echo number_format($costTotal); ?></h4>
                                                        </div>
                                                        <div class="wid-stats-icon">
                                                            <span>
                                                                <i class="fas fa-hand-holding-usd"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-col-2">
                                                <div class="wid-stats-card">
                                                    <div class="wid-stats-card-content">
                                                        <div class="wid-stats-body">
                                                            <p>Products</p>
                                                            <h4><?php echo $result['prodsTotal'] ?></h4>
                                                        </div>
                                                        <div class="wid-stats-icon">
                                                            <span>
                                                                <i class="fas fa-tag"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chart-card">
                                            <div class="chart-body">
                                                <div class="chart-infos">
                                                    <div class="chart-infos-cols">
                                                        <div class="text-center">
                                                            <h5><?php echo number_format($processing); ?></h5>
                                                            <p>Processing</p>
                                                        </div>
                                                    </div>
                                                    <div class="chart-infos-cols">
                                                        <div class="text-center">
                                                            <h5><?php echo number_format($on_hold); ?></h5>
                                                            <p>On Hold</p>
                                                        </div>
                                                    </div>
                                                    <div class="chart-infos-cols">
                                                        <div class="text-center">
                                                            <h5><?php echo number_format($refunded); ?></h5>
                                                            <p>Refunded</p>
                                                        </div>
                                                    </div>
                                                    <div class="chart-infos-cols">
                                                        <div class="text-center">
                                                            <h5><?php echo number_format($failed); ?></h5>
                                                            <p>Failed</p>
                                                        </div>
                                                    </div>
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
                                                                label: "Monthly Sales Analytics For <?php echo date('Y'); ?> ($)",
                                                                pointRadius: 4,
                                                                pointBackgroundColor: 'rgba(255,255,255,1)',
                                                                pointBorderWidth: 2,
                                                                fill: true,
                                                                backgroundColor: gradientFill_1,
                                                                borderColor: '#3167eb',
                                                                borderWidth: 2,
                                                                data: [<?php
                                                                    for($i=1; $i<13; $i++) {
                                                                        $monthlyEarn = 0;
                                                                        $stmt = $db->prepare("SELECT *, SUM(quantity) AS qty FROM orders_items LEFT JOIN (SELECT id, name, slug, owner_id, price FROM products) AS products on orders_items.product_id = products.id LEFT JOIN (SELECT order_id AS OrderID, order_date, order_status FROM placed_orders) AS placed_orders ON orders_items.order_id = placed_orders.OrderID WHERE owner_id=:userID AND MONTH(order_date)=:orderMonth AND YEAR(order_date)=:orderYear AND order_status = 4 GROUP BY product_id");
                                                                        try {
                                                                            $stmt->execute(['userID'=>$_SESSION['id'], 'orderMonth'=>$i, 'orderYear'=>date('Y')]);
                                                                            foreach($stmt as $vals) {
                                                                                if (isset($vals['product_id']) && !empty($vals['product_id'])) {
                                                                                    $monthlyEarn += $vals['qty'] * $vals['price'];
                                                                                } else {
                                                                                    $monthlyEarn += 0;
                                                                                }
                                                                                
                                                                            }
                                                                            echo $monthlyEarn;
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
                                                                        labelString: 'Monthly Earnings'
                                                                    },
                                                                    ticks: {
                                                                        display: true,
                                                                        beginAtZero: true,
                                                                        min: 0,
                                                                        max: <?php
                                                                                    $costTotal = 0;
                                                                                    $stmt = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id=products.id LEFT JOIN placed_orders ON orders_items.order_id = placed_orders.order_id WHERE owner_id=:userID AND YEAR(order_date)=:yearlyCost AND order_status = 4");
                                                                                    try {
                                                                                        $stmt->execute(['userID'=>$_SESSION['id'], 'yearlyCost'=>date('Y')]);
                                                                                        foreach($stmt as $key) {
                                                                                            $costTotal+=$key['price']*$key['quantity'];
                                                                                        }
                                                                                        echo $costTotal+500;
                                                                                    } catch (PDOException $e) {
                                                                                        echo "Error: " . $e->getMessage();
                                                                                    }
                                                                                ?>,

                                                                        // forces step size to be in units
                                                                        stepSize: <?php
                                                                                            switch ($costTotal) {
                                                                                                case ($costTotal < 10):
                                                                                                    echo "1";
                                                                                                    break;
                                                                                                case ($costTotal < 100):
                                                                                                    echo "10";
                                                                                                    break;
                                                                                                case ($costTotal < 1000):
                                                                                                    echo "100";
                                                                                                    break;
                                                                                                case ($costTotal < 10000):
                                                                                                    echo "1000";
                                                                                                    break;
                                                                                                case ($costTotal < 100000):
                                                                                                    echo "10000";
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
                                <div class="row">
                                    <div class="col-secondary-01">
                                        <div class="col-secondary-card">
                                            <div class="col-secondary-card-content">
                                                <div class="card-title">Social Source</div>
                                                <div class="card-body">
                                                    <div class="avatar-icon">
                                                        <span>
                                                            <i class="fab fa-facebook"></i>
                                                        </span>
                                                    </div>
                                                    <h5>
                                                        <a href="#">
                                                            Facebook - <span>125 sales</span>
                                                        </a>
                                                    </h5>
                                                    <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus tincidunt.</p>
                                                    <a href="#">
                                                        Learn more <i class="ti-arrow-circle-right"></i>
                                                    </a>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="card-footer-row">
                                                        <div class="col-45">
                                                            <div class="social-source">
                                                                <div class="avatar-icon">
                                                                    <span>
                                                                        <i class="fab fa-telegram-plane"></i>
                                                                    </span>
                                                                </div>
                                                                <h5>Telegram</h5>
                                                                <p>117 sales</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-45">
                                                            <div class="social-source">
                                                                <div class="avatar-icon">
                                                                    <span>
                                                                        <i class="fab fa-twitter"></i>
                                                                    </span>
                                                                </div>
                                                                <h5>Twitter</h5>
                                                                <p>105 sales</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-45">
                                                            <div class="social-source">
                                                                <div class="avatar-icon">
                                                                    <span>
                                                                        <i class="fab fa-instagram"></i>
                                                                    </span>
                                                                </div>
                                                                <h5>Instagram</h5>
                                                                <p>98 sales</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-secondary-01">
                                        <div class="col-secondary-card">
                                            <div class="col-secondary-card-content">
                                                <div class="card-title">Overall Ratings</div>
                                                <div class="card-body">
                                                    <div class="user-ratings">
                                                        <div class="total-ratings">
                                                            <?php
                                                                $ratings_number = 0;
                                                                $overall_rating = 0;
                                                                $width_overall = 0;
                                                                $rating_1 = 0;
                                                                $rating_2 = 0;
                                                                $rating_3 = 0;
                                                                $rating_4 = 0;
                                                                $rating_5 = 0;
                                                                $stmt = $db->prepare("SELECT *, COUNT(*) AS Somme FROM review LEFT JOIN (SELECT id AS prodIdent, owner_id FROM products) AS products ON review.product_id = products.prodIdent WHERE owner_id = 19 GROUP BY rating ORDER BY rating");
                                                                try {
                                                                    $stmt->execute(['userIdentificateur'=>$_SESSION['id']]);
                                                                    foreach($stmt as $key) {
                                                                        $ratings_number += $key['Somme'];
                                                                        switch ($key['rating']) {
                                                                            case 1:
                                                                                $rating_1 += $key['Somme'];
                                                                                break;

                                                                            case 2:
                                                                                $rating_2 += $key['Somme'];
                                                                                break;

                                                                            case 3:
                                                                                $rating_3 += $key['Somme'];
                                                                                break;

                                                                            case 4:
                                                                                $rating_4 += $key['Somme'];
                                                                                break;

                                                                            case 5:
                                                                                $rating_5 += $key['Somme'];
                                                                                break;
                                                                            
                                                                            default:
                                                                                break;
                                                                        }
                                                                    }
                                                                    $overall_rating = ((($rating_1*1)+($rating_2*2)+($rating_3*3)+($rating_4*4)+($rating_5*5))/$ratings_number);

                                                                    $width_overall = number_format((float)(($overall_rating * 92)/4.5), 2, '.', '');
                                                                    
                                                                } catch (PDOException $e) {
                                                                    echo "Error: " . $e->getMessage();
                                                                }
                                                            ?>
                                                            <h2><?php echo number_format((float)$overall_rating, 2, '.', ''); ?></h2>
                                                            <ul class="rating-stars">
                                                                <li style="width:<?php echo $width_overall; ?>%" class="stars-active">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="rating-list-container">
                                                            <?php
                                                                $stmt = $db->prepare("SELECT *, COUNT(*) AS Somme FROM review LEFT JOIN (SELECT id AS prodIdent, owner_id FROM products) AS products ON review.product_id = products.prodIdent WHERE owner_id = 19 GROUP BY rating ORDER BY rating DESC");
                                                                try {
                                                                    $stmt->execute(['userIdentificateur'=>$_SESSION['id']]);
                                                                    foreach($stmt as $val) {
                                                                    
                                                            ?>
                                                            <div class="rating-list">
                                                                <div class="rating-level"><?php echo $val['rating']; ?>.0</div>
                                                                <ul class="rating-stars">
                                                                    <li style="width:<?php echo (($val['rating']*100)/5); ?>%" class="stars-active">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    </li>
                                                                </ul>
                                                                <div class="total">
                                                                    <?php echo $val['Somme']; ?> <span class="percentage"><?php echo number_format((float)(($val['Somme']/$ratings_number)*100), 2, '.', ''); ?>%</span>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                    }
                                                                } catch (PDOException $e) {
                                                                    echo "Error: " . $e->getMessage();
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-secondary-01">
                                        <div class="col-secondary-card">
                                            <div class="col-secondary-card-content">
                                                <div class="card-title">Top Cities Selling Products</div>
                                                <div class="card-body">
                                                    <?php
                                                        $top_selling_city = '';
                                                        $top_selling_city_nbSells = 0;
                                                        $total_orders = 0;
                                                        $stmt = $db->prepare("SELECT *, COUNT(DISTINCT order_id, order_email, order_name, order_status) AS stateOrders FROM placed_orders LEFT JOIN (SELECT DISTINCT order_id AS orderID, product_id FROM orders_items) AS orders_items ON placed_orders.order_id = orders_items.orderID LEFT JOIN (SELECT id, owner_id FROM products) AS products ON orders_items.product_id = products.id LEFT JOIN (SELECT email, state FROM users) AS users ON placed_orders.order_email = users.email WHERE owner_id=:sellerID AND order_status = 4 GROUP BY state ORDER BY stateOrders DESC LIMIT 3");
                                                        try {
                                                            $stmt->execute(['sellerID'=>$_SESSION['id']]);
                                                            foreach($stmt as $k) {
                                                                if ($k['stateOrders'] > $top_selling_city_nbSells) {
                                                                    $top_selling_city_nbSells = $k['stateOrders'];
                                                                    $top_selling_city = $k['state'];
                                                                }
                                                                $total_orders += $k['stateOrders'];
                                                            }
                                                            
                                                        } catch (PDOException $e) {
                                                            echo "Error: " . $e->getMessage();
                                                        }
                                                    ?>
                                                    <div class="text-center top-selling-city">
                                                        <div>
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <span class="shadow"></span>
                                                        </div>
                                                        <h3><?php echo $top_selling_city_nbSells; ?></h3>
                                                        <p><?php echo $top_selling_city; ?></p>
                                                    </div>
                                                    <div class="tsc-table">
                                                        <table class="tsc-table-centered">
                                                            <tbody>
                                                                <?php
                                                                    $cpt = 1;
                                                                    $bg_type = '';
                                                                    $state_percentage = 0;
                                                                    $stmt = $db->prepare("SELECT *, COUNT(DISTINCT order_id, order_email, order_name, order_status) AS stateOrders FROM placed_orders LEFT JOIN (SELECT DISTINCT order_id AS orderID, product_id FROM orders_items) AS orders_items ON placed_orders.order_id = orders_items.orderID LEFT JOIN (SELECT id, owner_id FROM products) AS products ON orders_items.product_id = products.id LEFT JOIN (SELECT email, state FROM users) AS users ON placed_orders.order_email = users.email WHERE owner_id=:sellerID AND order_status = 4 GROUP BY state ORDER BY stateOrders DESC LIMIT 3");
                                                                    try {
                                                                        $stmt->execute(['sellerID'=>$_SESSION['id']]);
                                                                        foreach($stmt as $key) {
                                                                            if ($cpt == 1) {
                                                                                $bg_type = 'primary';
                                                                            } elseif($cpt == 2) {
                                                                                $bg_type = 'secondary';
                                                                            } else {
                                                                                $bg_type = 'tertiary';
                                                                            }
                                                                            $cpt +=1;

                                                                            $state_percentage = $key['stateOrders'];
                                                                            
                                                                ?>
                                                                <tr>
                                                                    <td style="width: 30%;">
                                                                        <p class="city"><?php echo $key['state']; ?></p>
                                                                    </td>
                                                                    <td style="width: 25%;">
                                                                        <h5 class="city-sales"><?php echo $key['stateOrders']; ?></h5>
                                                                    </td>
                                                                    <td>
                                                                        <div class="bg-transparent progress">
                                                                            <div class="progress-bar bg-<?php echo $bg_type; ?>" role="progressbar" aria-valuenow="<?php echo number_format((float)(($state_percentage/$total_orders)*100), 2, '.', ''); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float)(($state_percentage/$total_orders)*100), 2, '.', ''); ?>%"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                        }
                                                                    } catch (PDOException $e) {
                                                                        echo "Error: " . $e->getMessage();
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-table-03">
                                        <div class="col-table-03-card">
                                            <div class="col-table-03-card-content">
                                                <div class="card-title">Latest Transaction</div>
                                                <div class="latest-transaction-container">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Order ID</th>
                                                                <th>Billing Name</th>
                                                                <th>Date</th>
                                                                <th>Total</th>
                                                                <th>Payment Status</th>
                                                                <th>Payment Method</th>
                                                                <th>View Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                                if(isset($_SESSION['id'])) {
                                                                    try {
                                                                        $stmt = $db->prepare("SELECT * FROM placed_orders LEFT JOIN (SELECT DISTINCT order_id AS OrderID, product_id, quantity FROM orders_items GROUP BY order_id) AS orders_items ON orders_items.OrderID=placed_orders.order_id LEFT JOIN (SELECT *, users.id AS client_id FROM users) AS clients ON placed_orders.order_email=clients.email LEFT JOIN (SELECT *, products.id AS prod_id FROM products) AS prods ON orders_items.product_id=prods.prod_id WHERE owner_id=:user_id ORDER BY order_id DESC LIMIT 4");
                                                                        $stmt->execute(['user_id'=>$_SESSION['id']]);
                                                                        foreach($stmt as $row) {
                                                                            $costTotal = 0;

                                                            ?>
                                                            <tr class="main-row">
                                                                <td>
                                                                    <a class="lt_order_id" href="#"> #<?php echo $row['order_id'];?> </a>
                                                                </td>
                                                                <td style="font-weight: 600;"><?php echo ucwords($row['firstname'].' '.$row['lastname']); ?></td>
                                                                <td style="text-decoration: dotted underline;" title="<?php echo $row['order_date'];?>"><?php echo date_format(date_create($row['order_date']),"d F, Y");?></td>
                                                                    <?php
                                                                    $sql = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id=products.id WHERE order_id=:orderIdent AND owner_id=:userID");
                                                                    $sql->execute(['orderIdent'=>$row['order_id'], 'userID'=>$_SESSION['id']]);
                                                                    foreach($sql as $key) {
                                                                        $costTotal+=$key['price']*$key['quantity'];
                                                                    }
                                                                ?>
                                                                <td>$<?php echo $costTotal; ?></td>
                                                                <td>
                                                                    <?php
                                                                        switch ($row['order_status']) {
                                                                            case 1:
                                                                                echo '<span class="badge-hold badge">On Hold</span>';
                                                                                break;
                                                                            case 2:
                                                                                echo '<span class="badge-failed badge">Payment Failed</span>';
                                                                                break;
                                                                            case 3:
                                                                                echo '<span class="badge-refund badge">Refunded</span>';
                                                                                break;
                                                                            case 4:
                                                                                echo '<span class="badge-success badge">Paid</span>';
                                                                                break;
                                                                            default:
                                                                                break;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <i class="fas fa-money-check-alt"></i> <?php echo ucwords($row['payment_method']); ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" onclick="location.href='edit.php?post_type=order'">View Details</button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                    
                                                                }
                                                            } catch(PDOException $e){
                                                                echo "Error: " . $e->getMessage();
                                                            }
                                                        }

                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php 

    include 'post-seller-panel.php';

?>