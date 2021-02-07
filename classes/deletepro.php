<?php
session_start();
                             
                                include_once "orders.php";
                                $order=new orders();
                                $q= $order->Delete();
                               
                                header("Location:../cart.php");
                            
                        ?>