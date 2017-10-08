<?php
$CI =& get_instance();
$CI->load->model('MenuModel');
?>
<!--<body class="theme-red mode-material">
    <nav class="top-menu">
    <div class="menu">
        <div class="menu-user-block">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="avatar" href="javascript:void(0);">
                        <img src="assets/common/img/temp/avatars/1.jpg" alt="Alternative text to the image">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header">Home</div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> System Dashboard</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> User Boards</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> Issue Navigator (35 New)</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-exit"></i> Logout</a>
                </ul>
            </div>
        </div>        
        <div class="menu-info-block">
            <div class="left">
                <div class="header-buttons">  
                <?php
                // var_dump($parent);
                $parent = $CI->MenuModel->GetParent();
                foreach($parent->result() as $p){
                    $child = $CI->MenuModel->GetChild($p->id);
                    echo '<div class="dropdown">';
                    if($child->num_rows() == 0 ){
                        echo '<a href="javascript: void(0);">
                            <i class="dropdown-inline-button-icon '.$p->icon.'"></i>
                            <span>'.ucfirst($p->menu).'</span>                            
                        </a>';
                    }
                    else{
                        echo '<a href="javascript: void(0);" class="dropdown-toggle dropdown-inline-button" data-toggle="dropdown" aria-expanded="false">
                                <i class="dropdown-inline-button-icon '.$p->icon.'"></i>
                                <span class="hidden-lg-down">'.ucfirst($p->menu).'</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="" role="menu">';
                        foreach($child->result() as $c){
                            echo '<a class="dropdown-item" href="'.site_url($c->url).'">'.ucwords($c->menu).'</a>';                                              
                        }
                    echo "</ul>";
                    }
                    echo "</div>";                    
                }
                ?>
                                                   
                </div>
            </div>            
        </div>
    </div>
</nav>-->


<body class="theme-default">
<?php
if(isset($notiftipe)){
?>
<script>
<?php
if($notiftipe=="success")
echo "swal({title: \"Success!\",text: \"".$notifmsg."\",type: \"success\"})";
else
echo "swal({title: \"Error!\",text: \"".$notifmsg."\",type: \"error\"})";
?>
</script>
<?php } ?>
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="index.html" class="logo">
            <img src="<?=base_url()?>assets/common/img/logo.png" alt="Clean UI Admin Template" />
            <img class="logo-inverse" src="<?=base_url()?>assets/common/img/logo-inverse.png" alt="Clean UI Admin Template" />
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">
        <ul class="left-menu-list left-menu-list-root list-unstyled">
            <?php
            $parent = $CI->MenuModel->GetParent();
                foreach($parent->result() as $p){
                    $child = $CI->MenuModel->GetChild($p->id);
                    if($child->num_rows() == 0 ){
                        echo '<li class="left-menu-list-active">
                                <a class="left-menu-link" href="index.php">
                                    <span class="menu-top-hidden">'.ucfirst($p->menu).'</span>
                                </a>
                            </li>';                        
                    }
                    else{
                        echo '<li class="left-menu-list-submenu">
                                <a class="left-menu-link" href="javascript: void(0);">
                                    '.ucfirst($p->menu).'
                                </a>
                                <ul class="left-menu-list list-unstyled">';                       
                        foreach($child->result() as $c){
                            echo '<li>
                                    <a class="left-menu-link" href="'.site_url($c->url).'">
                                        '.ucwords($c->menu).'
                                    </a>
                                </li>';                                            
                        }
                        echo "</ul></li>";
                    }                
                }
                ?>            
        </ul>
    </div>
</nav>
<nav class="top-menu">
    <div class="menu-icon-container hidden-md-up">
        <div class="animate-menu-button left-menu-toggle">
            <div><!-- --></div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-info-block">           
            <div class="right example-buy-btn">
                <a href="<?=base_url()?>logout" class="btn btn-success-outline btn-rounded">
                    Log Out
                </a>
            </div>
        </div>
    </div>
</nav>

