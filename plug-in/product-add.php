<?php
session_start();

$prod = $_POST['product_name'];
$quan = $_POST['quantity'];
$weight = $_POST['weight'];

                
                try {
                    include('connection.php');

                    $sql = "INSERT INTO products (`product_name`, `quantity`, `weight`)
                            VALUES (?, ?, ?)";

                    $stmt = $conn->prepare($sql);

                    $stmt->bindParam(1, $prod, PDO::PARAM_STR);
                    $stmt->bindParam(2, $quan, PDO::PARAM_STR);
                    $stmt->bindParam(3, $weight, PDO::PARAM_STR);

                    $stmt->execute();

                    // You can set a success message here if needed
                    $_SESSION['response'] = [
                        'success' => true,
                        'message' => $prod . ' successfully added to the system.'
                    ];
                } catch (PDOException $e) {
                    // Handle any database errors here
                    $_SESSION['response'] = [
                        'success' => false,
                        'message' => $e->getMessage()
                    ];
                }

                // Redirect back to the product_add.php page
                header('location: ../product_add.php');
                exit; // Make sure to exit after the header redirect
          
?>
