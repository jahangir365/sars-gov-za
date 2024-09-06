 <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->            
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                <?php if ($_SESSION["loggedInUserRole"]=="admin"){ ?>
                 <li>
                    <a <?php echo $menuItem=='dashboard' ? 'class="active"' : ''?> href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard </span>
                    </a>
                </li>
               
                  <li>
                    <a class="dcjq-parent <?php echo ($menuItem=='sales'||$menuItem=='sales_custom') ? 'active' : ''?>" href="#">
                        <i class="fa fa-users"></i>
                        <span>Sales</span>
                    </a>
                    <ul style="display: block;" class="sub">  
                        <li class="<?php echo ($menuItem=='sales') ? 'active' : ''?>">
                            <a href="sales_list.php">
                                <i class="fa fa-users"></i>
                                <span>View Sales</span>
                            </a>
                        </li>
                        <li class="<?php echo ($menuItem=='sales_custom') ? 'active' : ''?>">
                            <a href="sales_list_custom.php">
                                <i class="fa fa-users"></i>
                                <span>Custom Sales</span>
                            </a>
                        </li>
                        
                    </ul>
                </li> 
                    
                    <li>
                        <a <?php echo $menuItem=='orders' ? 'class="active"' : ''?> href="orders_list.php">
                            <i class="fa fa-money"></i>
                            <span>Orders</span>
                        </a>
                    </li>  
                    <li>
                        <a <?php echo $menuItem=='employee' ? 'class="active"' : ''?> href="employee_list.php">
                            <i class="fa fa-users"></i>
                            <span>Employees</span>
                        </a>
                    </li>  
                    <li>
                        <a <?php echo $menuItem=='credit' ? 'class="active"' : ''?> href="credit_list.php">
                            <i class="fa fa-money"></i>
                            <span>View Credits</span>
                        </a>
                    </li>  
                 
                    
                  <li>
                        <a <?php echo $menuItem=='expense' ? 'class="active"' : ''?> href="expense_list.php">
                            <i class="fa fa-money"></i>
                            <span>Expenses</span>
                        </a>
                    </li>  
                 
                
                
                <li>
                    <a class="dcjq-parent <?php echo ($menuItem=='golden_customers'||$menuItem=='customers') ? 'active' : ''?>" href="#">
                        <i class="fa fa-users"></i>
                        <span>Customers</span>
                    </a>
                    <ul style="display: block;" class="sub">  
                        <li class="<?php echo ($menuItem=='customers') ? 'active' : ''?>">
                            <a href="customers_list.php">
                                <i class="fa fa-users"></i>
                                <span>View Customers</span>
                            </a>
                        </li>
                        <li class="<?php echo ($menuItem=='golden_customers') ? 'active' : ''?>">
                            <a href="gcustomers_list.php">
                                <i class="fa fa-level-up"></i>
                                <span>Golden Customers</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
              
       
                    <li>
                    <a class="dcjq-parent <?php echo ($menuItem=='yearly'||$menuItem=='monthly'||$menuItem=='custom') ? 'active' : ''?>" href="#">
                        <i class="fa fa-bar-chart"></i>
                        <span>Reports</span>
                    </a>
                    <ul style="display: block;" class="sub">  
                        <li class="<?php echo ($menuItem=='monthly') ? 'active' : ''?>">
                            <a href="monthly_reports.php">
                                <i class="fa fa-bar-chart"></i>
                                <span>Monthly Reports</span>
                            </a>
                        </li>
                        <li class="<?php echo ($menuItem=='yearly') ? 'active' : ''?>">
                            <a href="yearly_reports.php">
                                <i class="fa fa-bar-chart"></i>
                                <span>Yearly Reports</span>
                            </a>
                        </li>
                        <li class="<?php echo ($menuItem=='custom') ? 'active' : ''?>">
                            <a href="custom_reports.php">
                                <i class="fa fa-bar-chart"></i>
                                <span>Custom Report</span>
                            </a>
                        </li>
                    </ul>
                </li>
                  
                    
                    
                    
                    <li>
                        <a <?php echo $menuItem=='target' ? 'class="active"' : ''?> href="target_list.php">
                            <i class="fa fa-tasks"></i>
                            <span>Targets</span>
                        </a>
                    </li>
                    
                     <li>
                    <a <?php echo $menuItem=='city' ? 'class="active"' : ''?> href="city_list.php">
                        <i class="fa fa-building"></i>
                        <span>City </span>
                    </a>
                </li>
                  <li>
                    <a <?php echo $menuItem=='items' ? 'class="active"' : ''?> href="items_list.php">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        <span>Items</span>
                    </a>
                </li>
                
                <li>
                    <a <?php echo $menuItem=='users' ? 'class="active"' : ''?> href="users_list.php">
                        <i class="fa fa-user"></i>
                        <span>Users </span>
                    </a>
                
                </li>
                    <li>
                        <a <?php echo $menuItem=='Log_Out' ? 'class="active"' : ''?> href="actions.php?j=2">
                            <i class="fa fa-sign-out"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                    
                <?php }?>
            </ul></div>        
    <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->